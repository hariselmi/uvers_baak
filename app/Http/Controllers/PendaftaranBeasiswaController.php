<?php

namespace App\Http\Controllers;

use App\PendaftaranBeasiswa;
use App\StatusPemrosesan;
use App\User;
use Auth;
use Get_field;
use \Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PendaftaranBeasiswaController extends Controller
{

    public function __construct(PendaftaranBeasiswa $lomba)
    {
        $this->middleware('auth');
        $this->lomba = $lomba;
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
                Session::put('pendaftaranFilter', $search);
            } else if( Session::get('pendaftaranFilter')) {
                $search = Session::get('pendaftaranFilter');
            }
            $data['dataPendaftaranBeasiswa'] = $this->lomba->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataPendaftaranBeasiswa'] = $this->lomba->getAll('paginate');
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        return view('pendaftaran.index', $data);
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
        // insert data into lomba table
        $input = $request->all();
        $this->validator($input)->validate();
        $lomba = new PendaftaranBeasiswa;
        $lomba->nama_paket = $request->nama_paket;
        $lomba->deskripsi = $request->deskripsi;
        $lomba->status_pendaftaran = $request->status_pendaftaran;
        $lomba->tgl_mulai_periode = $request->tgl_mulai_periode;
        $lomba->tgl_sampai_periode = $request->tgl_sampai_periode;
        $lomba->dlt = 0;
        $lomba->save();

        if ($request->has('syarat')) {
            # code...
            for ($i=0; $i < count($request->syarat); $i++) { 
                # code...
                $syarat = DB::table('syarat_beasiswa')->insert([
                    'syarat' => $request->syarat[$i],
                    'dlt' => 0,
                    'created_at' => date('Y-m-d H:i'),
                    'beasiswa_id' => $lomba->id
                ]);
            }
        }

        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PendaftaranBeasiswa  $lomba
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['pendaftaranBeasiswa'] = PendaftaranBeasiswa::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PendaftaranBeasiswa  $lomba
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['pendaftaranBeasiswa'] = PendaftaranBeasiswa::find($id);
        $data['syaratBeasiswa'] = DB::table('syarat_beasiswa')->where(['beasiswa_id'=> $id, 'dlt'=> 0])->get();
        $data['syaratBeasiswaCount'] = DB::table('syarat_beasiswa')->where(['beasiswa_id'=> $id, 'dlt'=> 0])->count();
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PendaftaranBeasiswa  $lomba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        DB::table('syarat_beasiswa')->where('beasiswa_id', $id)->delete();

        if ($request->has('syarat')) {
            # code...
            for ($i=0; $i < count($request->syarat); $i++) { 
                # code...
                $syarat = DB::table('syarat_beasiswa')->insert([
                    'id' => $request->id[$i],
                    'syarat' => $request->syarat[$i],
                    'dlt' => 0,
                    'created_at' => date('Y-m-d H:i'),
                    'updated_at' => date('Y-m-d H:i'),
                    'beasiswa_id' => $id
                ]);
            }
        }

        if($request->syaratBaru){
            if (count($request->syaratBaru) > 0) {
                # code...
                for ($i=0; $i < count($request->syaratBaru); $i++) { 
                    # code...
                    $syaratBaru = DB::table('syarat_beasiswa')->insert([
                        'syarat' => $request->syaratBaru[$i],
                        'dlt' => 0,
                        'created_at' => date('Y-m-d H:i'),
                        'updated_at' => date('Y-m-d H:i'),
                        'beasiswa_id' => $id
                    ]);
                }
            }
        }

        $input = $request->all();
        $this->validator($input)->validate();
        $lomba = (new PendaftaranBeasiswa())->getById($id);
        $lomba->nama_paket = $request->nama_paket;
        $lomba->deskripsi = $request->deskripsi;
        $lomba->status_pendaftaran = $request->status_pendaftaran;
        $lomba->tgl_mulai_periode = $request->tgl_mulai_periode;
        $lomba->tgl_sampai_periode = $request->tgl_sampai_periode;
        $lomba->dlt = 0;
        $lomba->created_at = date('Y-m-d H:i:s');
        $lomba->save();
        
        $data['pendaftaranBeasiswa'] = $lomba;
        $data['syaratBeasiswa'] = DB::table('syarat_beasiswa')->where(['beasiswa_id'=> $id, 'dlt'=> 0])->get();
        $data['syaratBeasiswaCount'] = DB::table('syarat_beasiswa')->where(['beasiswa_id'=> $id, 'dlt'=> 0])->count();
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PendaftaranBeasiswa  $lomba
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $lomba = PendaftaranBeasiswa::find($id);
            $lomba->dlt = '1';
            $lomba->save();

            return $this->sendCommonResponse([], 'Berhasil menghapus data', 'delete');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->sendCommonResponse([], ['danger'=>__('Integrity constraint violation: You Cannot delete a parent row')]);
        }
    }


    public function daftar($id)
    {
        //
        $data['pendaftaranBeasiswa'] = PendaftaranBeasiswa::find($id);
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        $data['syaratBeasiswa'] = DB::table('syarat_beasiswa')->where(['beasiswa_id'=> $id, 'dlt'=> 0])->get();
        $data['syaratBeasiswaCount'] = DB::table('syarat_beasiswa')->where(['beasiswa_id'=> $id, 'dlt'=> 0])->count();
        return $this->sendCommonResponse($data, null, 'daftar');
    }
    public function storedaftar(Request $request, $id)
    {
        //

        $checkIsExist = DB::table('pendaftaran_beasiswa')
        ->where([['dlt', 0], ['mahasiswa_id', Auth::user()->mahasiswa_id], ['status', 1]])->count();

        $checkIsExpired = DB::table('beasiswa')
        ->where([['dlt', 0], ['id', $id], ['status_pendaftaran', 2]])->count();
        
        if ($checkIsExpired>0) {
            # code...
            return $this->sendCommonResponse([], ['danger'=>__('Pendaftaran beasiswa ini sudah ditutup')]); 
        }

        if ($checkIsExist>0) {
            # code...
            return $this->sendCommonResponse([], ['danger'=>__('Anda sudah pernah mendaftar dan pendaftaran sedang diproses')]); 
        }

        $role = Auth::user()->role;
        $tahun = date('Y');


        if ($role == 'mahasiswa') {
            # code...
            $nim = Get_field::get_data(Auth::user()->mahasiswa_id, 'mahasiswa', 'nim');
            // $file = 
        }else{
            $nim = 'admin';
        }



        $input = $request->all();
        // $this->validatorDaftar($input)->validate();

        $pendaftaran = new StatusPemrosesan();

        $pendaftaran->beasiswa_id = $id;
        $pendaftaran->mahasiswa_id = Auth::user()->mahasiswa_id;
        $pendaftaran->no_identitas = $request->no_identitas;
        $pendaftaran->no_rekening = $request->no_rekening;
        $pendaftaran->pemilik_rekening = $request->pemilik_rekening;
        $pendaftaran->dlt = 0;
        $pendaftaran->save();

        // $data = array();
        // $data['beasiswa_id'] = $id;
        // $data['mahasiswa_id'] = $request->mahasiswa_id;
        // $data['no_identitas'] = $request->no_identitas;
        // $data['no_rekening'] = $request->no_rekening;
        // $data['pemilik_rekening'] = $request->pemilik_rekening;
        // $data['dlt'] = 0;
        // $beasiswa = DB::table('pendaftaran_beasiswa')->insert($data);
        DB::table('file_syarat_beasiswa')->where('pendaftaran_id', $pendaftaran->id)->delete();

        for ($i=0; $i < count($request->syaratId); $i++) { 
            # code...
            if ($request->file('fileSyarat'.$request->syaratId[$i])) {
                # code...
                $fileSyarat = $request->file('fileSyarat'.$request->syaratId[$i]);
                $nameGenerate = hexdec(uniqid());
                $imgExtension = strtolower($fileSyarat->getClientOriginalExtension());
                $imgOriName = strtolower($fileSyarat->getClientOriginalName());
                $fileSyaratImgName = $tahun.'_'.$nim.'_syarat_beasiswa_'.$nameGenerate.'.'.$imgExtension;
                $uploadLocation = public_path().'/document/syarat_beasiswa';
                $lastImage = $uploadLocation.$fileSyaratImgName;
                $fileSyarat->move($uploadLocation,$fileSyaratImgName);

                $fileInsert = array();
                $fileInsert['file_syarat'] = $fileSyaratImgName;
                $fileInsert['pendaftaran_id'] = $pendaftaran->id;
                $fileInsert['syarat_id'] = $request->syaratId[$i];
                $fileInsert['dlt'] = 0;
                $beasiswa = DB::table('file_syarat_beasiswa')->insert($fileInsert);
            }


        }

        
        $data['pendaftaranBeasiswa'] = PendaftaranBeasiswa::find($id);
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        return $this->sendCommonResponse($data=[], 'Berhasil mendaftar, silahkan cek status pendaftaran', 'index');
    }

    protected function validatorDaftar(Array $data)
    {
        return Validator::make($data, [
            'mahasiswa_id'=>'required',
            'no_identitas'=>'required',
            'no_rekening'=>'required',
            'pemilik_rekening'=>'required',
            'ktm'=>'required',
            'transkip_nilai'=>'required',
        ]);
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'nama_paket'=>'required',
            'deskripsi'=>'required',
            'status_pendaftaran'=>'required',
            'tgl_mulai_periode'=>'required',
            'tgl_sampai_periode'=>'required',
        ]);
    }

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $lombaObj = new PendaftaranBeasiswa();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addPendaftaranBeasiswa'] = view('pendaftaran.formadd', $data)->render();
        } else if ($option == 'daftar') {
            $response['replaceWith']['#daftarPendaftaranBeasiswa'] = view('pendaftaran.daftar', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editPendaftaranBeasiswa'] = view('pendaftaran.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showPendaftaranBeasiswa'] = view('pendaftaran.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataPendaftaranBeasiswa'])) {
                $data['dataPendaftaranBeasiswa'] = $lombaObj->getAll('paginate');
            }
            $response['replaceWith']['#pendaftaranTable'] = view('pendaftaran.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
