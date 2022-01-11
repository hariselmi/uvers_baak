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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BeasiswaExport;

class StatusPemrosesanController extends Controller
{

    public function __construct(StatusPemrosesan $pemrosesan)
    {
        $this->middleware('auth');
        $this->pemrosesan = $pemrosesan;
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
                Session::put('statusFilter', $search);
            } else if( Session::get('statusFilter')) {
                $search = Session::get('statusFilter');
            }
            $data['dataStatusPemrosesan'] = $this->pemrosesan->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataStatusPemrosesan'] = $this->pemrosesan->getAll('paginate');
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        $data['status_pemrosesan'] = DB::table('status_pemrosesan')->pluck('name', 'id');

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
        // insert data into pemrosesan table
        $input = $request->all();
        // $this->validator($input)->validate();
        $pemrosesan = new StatusPemrosesan;
        $pemrosesan->nama_paket = $request->nama_paket;
        $pemrosesan->deskripsi = $request->deskripsi;
        $pemrosesan->status_pendaftaran = $request->status_pendaftaran;
        $pemrosesan->tgl_mulai_periode = $request->tgl_mulai_periode;
        $pemrosesan->tgl_sampai_periode = $request->tgl_sampai_periode;
        $pemrosesan->dlt = 0;
        $pemrosesan->save();

        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusPemrosesan  $pemrosesan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['statusPemrosesan'] = StatusPemrosesan::find($id);
        $data['syarat'] = DB::table('pendaftaran_beasiswa')
        ->select('syarat_beasiswa.*')
        ->leftJoin('beasiswa', 'pendaftaran_beasiswa.beasiswa_id', 'beasiswa.id')
        ->leftJoin('syarat_beasiswa', 'beasiswa.id', 'syarat_beasiswa.beasiswa_id')
        ->where([['pendaftaran_beasiswa.id',$id], ['pendaftaran_beasiswa.dlt',0], ['syarat_beasiswa.dlt',0]])
        ->get();

        $data['file_syarat'] = DB::table('pendaftaran_beasiswa')
        ->select('file_syarat_beasiswa.*')
        ->leftJoin('file_syarat_beasiswa', 'pendaftaran_beasiswa.id', 'file_syarat_beasiswa.pendaftaran_id')
        ->where([['pendaftaran_beasiswa.id',$id], ['pendaftaran_beasiswa.dlt',0]])
        ->get();
        // dd($data['file_syarat']);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusPemrosesan  $pemrosesan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['statusPemrosesan'] = DB::table('pendaftaran_beasiswa')->where('id', $id)->first();
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        $data['status_pemrosesan'] = DB::table('status_pemrosesan')->pluck('name', 'id');
        $data['syarat'] = DB::table('pendaftaran_beasiswa')
        ->select('syarat_beasiswa.*')
        ->leftJoin('beasiswa', 'pendaftaran_beasiswa.beasiswa_id', 'beasiswa.id')
        ->leftJoin('syarat_beasiswa', 'beasiswa.id', 'syarat_beasiswa.beasiswa_id')
        ->where([['pendaftaran_beasiswa.id',$id], ['pendaftaran_beasiswa.dlt',0], ['syarat_beasiswa.dlt',0]])
        ->get();

        $data['file_syarat'] = DB::table('pendaftaran_beasiswa')
        ->select('file_syarat_beasiswa.*')
        ->leftJoin('file_syarat_beasiswa', 'pendaftaran_beasiswa.id', 'file_syarat_beasiswa.pendaftaran_id')
        ->where([['pendaftaran_beasiswa.id',$id], ['pendaftaran_beasiswa.dlt',0]])
        ->get();
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusPemrosesan  $pemrosesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $input = $request->all();
        // $this->validator($input)->validate();
        $pemrosesan = (new StatusPemrosesan())->getById($id);
        $pemrosesan->catatan = $request->catatan;
        $pemrosesan->status = $request->status;
        $pemrosesan->updated_at = date('Y-m-d H:i:s');
        $pemrosesan->save();
        
        $data['statusPemrosesan'] = $pemrosesan;
        $data['mahasiswa'] = DB::table('mahasiswa')->where('dlt', 0)->pluck('nama', 'id');
        $data['status_pemrosesan'] = DB::table('status_pemrosesan')->pluck('name', 'id');
        $data['syarat'] = DB::table('pendaftaran_beasiswa')
        ->select('syarat_beasiswa.*')
        ->leftJoin('beasiswa', 'pendaftaran_beasiswa.beasiswa_id', 'beasiswa.id')
        ->leftJoin('syarat_beasiswa', 'beasiswa.id', 'syarat_beasiswa.beasiswa_id')
        ->where([['pendaftaran_beasiswa.id',$id], ['pendaftaran_beasiswa.dlt',0], ['syarat_beasiswa.dlt',0]])
        ->get();

        $data['file_syarat'] = DB::table('pendaftaran_beasiswa')
        ->select('file_syarat_beasiswa.*')
        ->leftJoin('file_syarat_beasiswa', 'pendaftaran_beasiswa.id', 'file_syarat_beasiswa.pendaftaran_id')
        ->where([['pendaftaran_beasiswa.id',$id], ['pendaftaran_beasiswa.dlt',0]])
        ->get();
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusPemrosesan  $pemrosesan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $pemrosesan = StatusPemrosesan::find($id);
            $pemrosesan->dlt = '1';
            $pemrosesan->save();

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
        $pemrosesanObj = new StatusPemrosesan();
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
                $data['dataStatusPemrosesan'] = $pemrosesanObj->getAll('paginate');
            }
            $response['replaceWith']['#statusPemrosesanTable'] = view('statuspemrosesan.table', $data)->render();
        }
        return $this->sendResponse($response);
    }

    public function excel(Request $request, $id, $namaPaket)
	{
		return Excel::download(new BeasiswaExport($id), 'beasiswa_'.$namaPaket.'_'.date('H:i:s').'.xlsx');
	}
}
