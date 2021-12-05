<?php

namespace App\Http\Controllers;

use App\Sertifikat;
use App\User;
use Auth;
use Get_field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SertifikatController extends Controller
{

    public function __construct(Sertifikat $sertifikat)
    {
        $this->middleware('auth');
        $this->sertifikat = $sertifikat;
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
                Session::put('sertifikatFilter', $search);
            } else if( Session::get('sertifikatFilter')) {
                $search = Session::get('sertifikatFilter');
            }
            $data['dataSertifikat'] = $this->sertifikat->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataSertifikat'] = $this->sertifikat->getAll('paginate');
        return view('sertifikat.index', $data);
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
            'sertifikat' => 'file|mimes:png,jpg,jpeg,pdf|between:0,5000',
        ],[
            'sertifikat.mimes' => 'Extensi file sertifikat tidak didukung',
            'sertifikat.between' => 'Ukuran file sertifikat max 5MB',
        ]);

        $certificate = $request->file('sertifikat');

        $role = Auth::user()->role;
        $tahun = date('Y');
        $judulKegiatan = 'sertifikat_kompetensi';


        if ($role == 'mahasiswa') {
            # code...
            $nim = Get_field::get_data(Auth::user()->mahasiswa_id, 'mahasiswa', 'nim');
            // $file = 
        }else{
            $nim = 'admin';
        }

        //insert certificate

        if($certificate){
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($certificate->getClientOriginalExtension());
            $certificateImgName = $tahun.'_'.$nim.'_sertifikat_'.$judulKegiatan.'_'.$nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/certificate';
            $lastImage = $uploadLocation.$certificateImgName;
            $certificate->move($uploadLocation,$certificateImgName);
        }

        // insert data into sertifikat table
        $input = $request->all();
        // $this->validator($input)->validate();
        $sertifikat = new Sertifikat;
        $sertifikat->nama_kegiatan = $request->nama_kegiatan;
        $sertifikat->peran = $request->peran;
        $sertifikat->penyelenggara = $request->penyelenggara;
        $sertifikat->tgl_mulai = $request->tgl_mulai;
        $sertifikat->tgl_selesai = $request->tgl_selesai;
        $sertifikat->sertifikat = $certificate ? $certificateImgName : null;
        $sertifikat->jenis_aktivitas = 3;
        $sertifikat->user_id = Auth::user()->id;
        $sertifikat->dlt = 0;
        $sertifikat->site = url('/');
        $sertifikat->created_at = date('Y-m-d H:i:s');
        $sertifikat->save();

        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['sertifikat'] = Sertifikat::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['sertifikat'] = Sertifikat::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sertifikat  $sertifikat
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
            'sertifikat' => 'file|mimes:png,jpg,jpeg,pdf|between:0,5000',
        ],[
            'sertifikat.mimes' => 'Extensi file sertifikat tidak didukung',
            'sertifikat.between' => 'Ukuran file sertifikat max 5MB',
        ]);

        $certificate = $request->file('sertifikat');

        $role = Auth::user()->role;
        $tahun = date('Y');
        $judulKegiatan = 'sertifikat_kompetensi';


        if ($role == 'mahasiswa') {
            # code...
            $nim = Get_field::get_data(Auth::user()->mahasiswa_id, 'mahasiswa', 'nim');
            // $file = 
        }else{
            $nim = 'admin';
        }

        if ($certificate) {
            //insert certificate
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($certificate->getClientOriginalExtension());
            $certificateImgName = $tahun.'_'.$nim.'_sertifikat_'.$judulKegiatan.'_'.$nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/certificate';
            $lastImage = $uploadLocation.$certificateImgName;
            $certificate->move($uploadLocation,$certificateImgName);
        }

        $input = $request->all();
        // $this->validator($input)->validate();
        $sertifikat = (new Sertifikat())->getById($id);
        $sertifikat->nama_kegiatan = $request->nama_kegiatan;
        $sertifikat->peran = $request->peran;
        $sertifikat->penyelenggara = $request->penyelenggara;
        $sertifikat->tgl_mulai = $request->tgl_mulai;
        $sertifikat->tgl_selesai = $request->tgl_selesai;
        if($certificate){
            $sertifikat->sertifikat = $certificateImgName;
        }
        $sertifikat->jenis_aktivitas = 3;
        $sertifikat->dlt = 0;
        $sertifikat->site = url('/');
        $sertifikat->created_at = date('Y-m-d H:i:s');
        $sertifikat->save();
        
        $data['sertifikat'] = $sertifikat;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $sertifikat = Sertifikat::find($id);
            $sertifikat->dlt = '1';
            $sertifikat->save();

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
        $sertifikatObj = new Sertifikat();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addSertifikat'] = view('sertifikat.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editSertifikat'] = view('sertifikat.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showSertifikat'] = view('sertifikat.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataSertifikat'])) {
                $data['dataSertifikat'] = $sertifikatObj->getAll('paginate');
            }
            $response['replaceWith']['#sertifikatTable'] = view('sertifikat.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
