<?php

namespace App\Http\Controllers;

use App\PendaftaranBeasiswa;
use App\User;
use Auth;
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
                Session::put('lomba_filter', $search);
            } else if( Session::get('lomba_filter')) {
                $search = Session::get('lomba_filter');
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
        return $this->sendCommonResponse($data, null, 'daftar');
    }
    public function storedaftar(Request $request, $id)
    {
        //

        $input = $request->all();
        $this->validatorDaftar($input)->validate();
        // $lomba = (new PendaftaranBeasiswa())->getById($id);
        // $lomba->nama_paket = $request->nama_paket;
        // $lomba->deskripsi = $request->deskripsi;
        // $lomba->status_pendaftaran = $request->status_pendaftaran;
        // $lomba->tgl_mulai_periode = $request->tgl_mulai_periode;
        // $lomba->tgl_sampai_periode = $request->tgl_sampai_periode;
        // $lomba->dlt = 0;
        // $lomba->created_at = date('Y-m-d H:i:s');
        // $lomba->save();

        $data = array();
        $data['beasiswa_id'] = $id;
        $data['mahasiswa_id'] = $request->mahasiswa_id;
        $data['no_identitas'] = $request->no_identitas;
        $data['no_rekening'] = $request->no_rekening;
        $data['pemilik_rekening'] = $request->pemilik_rekening;
        $data['dlt'] = 0;
        $beasiswa = DB::table('pendaftaran_beasiswa')->insert($data);
        
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
