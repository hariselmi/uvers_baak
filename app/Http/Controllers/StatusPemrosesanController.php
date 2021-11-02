<?php

namespace App\Http\Controllers;

use App\StatusPemrosesan;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StatusPemrosesanController extends Controller
{

    public function __construct(StatusPemrosesan $lomba)
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
            $data['dataStatusPemrosesan'] = $this->lomba->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataStatusPemrosesan'] = $this->lomba->getAll('paginate');
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        return view('statuspemrosesan.index', $data);
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
        // $this->validator($input)->validate();
        $lomba = new StatusPemrosesan;
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
     * @param  \App\StatusPemrosesan  $lomba
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['statusPemrosesan'] = StatusPemrosesan::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusPemrosesan  $lomba
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['statusPemrosesan'] = DB::table('pendaftaran_beasiswa')->where('id', $id)->first();
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusPemrosesan  $lomba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $input = $request->all();
        $this->validator($input)->validate();
        $lomba = (new StatusPemrosesan())->getById($id);
        $lomba->nama_paket = $request->nama_paket;
        $lomba->deskripsi = $request->deskripsi;
        $lomba->status_pendaftaran = $request->status_pendaftaran;
        $lomba->tgl_mulai_periode = $request->tgl_mulai_periode;
        $lomba->tgl_sampai_periode = $request->tgl_sampai_periode;
        $lomba->dlt = 0;
        $lomba->created_at = date('Y-m-d H:i:s');
        $lomba->save();
        
        $data['statusPemrosesan'] = $lomba;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusPemrosesan  $lomba
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $lomba = StatusPemrosesan::find($id);
            $lomba->dlt = '1';
            $lomba->save();

            return $this->sendCommonResponse([], 'Berhasil menghapus data', 'delete');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->sendCommonResponse([], ['danger'=>__('Integrity constraint violation: You Cannot delete a parent row')]);
        }
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
        $lombaObj = new StatusPemrosesan();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addStatusPemrosesan'] = view('statuspemrosesan.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editStatusPemrosesan'] = view('statuspemrosesan.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showStatusPemrosesan'] = view('statuspemrosesan.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataStatusPemrosesan'])) {
                $data['dataStatusPemrosesan'] = $lombaObj->getAll('paginate');
            }
            $response['replaceWith']['#pendaftaranTable'] = view('statuspemrosesan.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
