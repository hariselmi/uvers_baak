<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PelatihanController extends Controller
{

    public function __construct(Pelatihan $pelatihan)
    {
        $this->middleware('auth');
        $this->pelatihan = $pelatihan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $search = [];
            if(!empty($request->filter)) {
                $search = $request->filter;
                Session::put('pelatihan_filter', $search);
            } else if( Session::get('pelatihan_filter')) {
                $search = Session::get('pelatihan_filter');
            }
            $data['dataPelatihan'] = $this->pelatihan->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataPelatihan'] = $this->pelatihan->getAll('paginate');
        return view('pelatihan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'nama_kegiatan'=>'required',
            'peran'=>'required',
            'penyelenggara'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'sertifikat' => 'file|mimes:png,jpg,jpeg,pdf|between:0,2048',
        ],[
            'sertifikat.mimes' => 'Extensi file sertifikat tidak didukung',
            'sertifikat.between' => 'Ukuran file sertifikat max 2MB',
        ]);
        $certificate = $request->file('sertifikat');

        //insert certificate

        if($certificate){
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($certificate->getClientOriginalExtension());
            $certificateImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/certificate';
            $lastImage = $uploadLocation.$certificateImgName;
            $certificate->move($uploadLocation,$certificateImgName);
        }

        // insert data into sertifikat table
        $input = $request->all();
        // $this->validator($input)->validate();
        $pelatihan = new Pelatihan;
        $pelatihan->nama_kegiatan = $request->nama_kegiatan;
        $pelatihan->peran = $request->peran;
        $pelatihan->penyelenggara = $request->penyelenggara;
        $pelatihan->tgl_mulai = $request->tgl_mulai;
        $pelatihan->tgl_selesai = $request->tgl_selesai;
        $pelatihan->sertifikat = $certificate ? $certificateImgName : null;
        $pelatihan->jenis_aktivitas = 4;
        $pelatihan->user_id = Auth::user()->id;
        $pelatihan->dlt = 0;
        $pelatihan->created_at = date('Y-m-d H:i:s');
        $pelatihan->save();

        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['pelatihan'] = Pelatihan::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['pelatihan'] = Pelatihan::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        $validateData = $request->validate([
            'nama_kegiatan'=>'required',
            'peran'=>'required',
            'penyelenggara'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'sertifikat' => 'file|mimes:png,jpg,jpeg,pdf|between:0,2048',
        ],[
            'sertifikat.mimes' => 'Extensi file sertifikat tidak didukung',
            'sertifikat.between' => 'Ukuran file sertifikat max 2MB',
        ]);

        $certificate = $request->file('sertifikat');

        if ($certificate) {
            //insert certificate
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($certificate->getClientOriginalExtension());
            $certificateImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/certificate';
            $lastImage = $uploadLocation.$certificateImgName;
            $certificate->move($uploadLocation,$certificateImgName);
        }

        $input = $request->all();
        // $this->validator($input)->validate();
        $pelatihan = (new Pelatihan())->getById($id);
        $pelatihan->nama_kegiatan = $request->nama_kegiatan;
        $pelatihan->peran = $request->peran;
        $pelatihan->penyelenggara = $request->penyelenggara;
        $pelatihan->tgl_mulai = $request->tgl_mulai;
        $pelatihan->tgl_selesai = $request->tgl_selesai;
        if($certificate){
            $pelatihan->sertifikat = $certificateImgName;
        }
        $pelatihan->jenis_aktivitas = 4;
        $pelatihan->dlt = 0;
        $pelatihan->created_at = date('Y-m-d H:i:s');
        $pelatihan->save();
        
        $data['sertifikat'] = $pelatihan;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $pelatihan = Pelatihan::find($id);
            $pelatihan->dlt = '1';
            $pelatihan->save();

            return $this->sendCommonResponse([], 'Berhasil menghapus data', 'delete');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->sendCommonResponse([], ['danger'=>__('Integrity constraint violation: You Cannot delete a parent row')]);
        }
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'nama_kegiatan'=>'required',
            'peran'=>'required',
            'penyelenggara'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
        ]);
    }

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $pelatihanObj = new Pelatihan();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addPelatihan'] = view('pelatihan.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editPelatihan'] = view('pelatihan.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showPelatihan'] = view('pelatihan.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataPelatihan'])) {
                $data['dataPelatihan'] = $pelatihanObj->getAll('paginate');
            }
            $response['replaceWith']['#pelatihanTable'] = view('pelatihan.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
