<?php

namespace App\Http\Controllers;

use App\Magang;
use App\User;
use Auth;
use Get_field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MagangController extends Controller
{

    public function __construct(Magang $magang)
    {
        $this->middleware('auth');
        $this->magang = $magang;
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
                Session::put('magangFilter', $search);
            } else if( Session::get('magangFilter')) {
                $search = Session::get('magangFilter');
            }
            $data['dataMagang'] = $this->magang->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataMagang'] = $this->magang->getAll('paginate');
        return view('magang.index', $data);
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

        $role = Auth::user()->role;
        $tahun = date('Y');
        $judulKegiatan = 'aktivitas_lainnya';

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
        $magang = new Magang;
        $magang->nama_kegiatan = $request->nama_kegiatan;
        $magang->peran = $request->peran;
        $magang->penyelenggara = $request->penyelenggara;
        $magang->tgl_mulai = $request->tgl_mulai;
        $magang->tgl_selesai = $request->tgl_selesai;
        $magang->sertifikat = $certificate ? $certificateImgName : null;
        $magang->jenis_aktivitas = 5;
        $magang->user_id = Auth::user()->id;
        $magang->dlt = 0;
        $magang->created_at = date('Y-m-d H:i:s');
        $magang->save();

        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Magang  $magang
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['magang'] = Magang::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Magang  $magang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['magang'] = Magang::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Magang  $magang
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

        $role = Auth::user()->role;
        $tahun = date('Y');
        $judulKegiatan = 'aktivitas_lainnya';

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
        $magang = (new Magang())->getById($id);
        $magang->nama_kegiatan = $request->nama_kegiatan;
        $magang->peran = $request->peran;
        $magang->penyelenggara = $request->penyelenggara;
        $magang->tgl_mulai = $request->tgl_mulai;
        $magang->tgl_selesai = $request->tgl_selesai;
        if($certificate){
            $magang->sertifikat = $certificateImgName;
        }
        $magang->jenis_aktivitas = 5;
        $magang->dlt = 0;
        $magang->created_at = date('Y-m-d H:i:s');
        $magang->save();
        
        $data['sertifikat'] = $magang;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Magang  $magang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $magang = Magang::find($id);
            $magang->dlt = '1';
            $magang->save();

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
        $magangObj = new Magang();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addMagang'] = view('magang.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editMagang'] = view('magang.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showMagang'] = view('magang.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataMagang'])) {
                $data['dataMagang'] = $magangObj->getAll('paginate');
            }
            $response['replaceWith']['#magangTable'] = view('magang.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
