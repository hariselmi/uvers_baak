<?php

namespace App\Http\Controllers;

use App\Skpi;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SkpiExport;

class SkpiController extends Controller
{

    public function __construct(Skpi $skpi)
    {
        $this->middleware('auth');
        $this->skpi = $skpi;
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
                Session::put('skpiFilter', $search);
            } else if( Session::get('skpiFilter')) {
                $search = Session::get('skpiFilter');
            }
            $data['dataSkpi'] = $this->skpi->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['golonganSkpi'] = DB::table('golongan_skpi')->pluck('name', 'id');
        $data['statusAktivitas'] = DB::table('status_aktivitas')->pluck('name', 'id');
        $data['dataSkpi'] = $this->skpi->getAll('paginate');
        $data['namaKegiatan'] = DB::table('aktivitas')
        ->select(DB::raw('nama_kegiatan as nama'), DB::raw("CONCAT(nama_kegiatan, ' (Penyelenggara : ',penyelenggara,' | Tgl : ',tgl_mulai,' s.d ',tgl_selesai ,')') as nama_kegiatan"), 'dlt')
        ->where('dlt',0)
        ->distinct()
        ->pluck('nama_kegiatan', 'nama');

        return view('skpi.index', $data);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Skpi  $skpi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['skpi'] = Skpi::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skpi  $skpi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['skpi'] = Skpi::find($id);
        $data['golonganSkpi'] = DB::table('golongan_skpi')->pluck('name', 'id');
        $data['statusAktivitas'] = DB::table('status_aktivitas')->pluck('name', 'id');
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skpi  $skpi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 

        $certificate = $request->file('sertifikat');
        $award = $request->file('foto_penghargaan');
        $letter = $request->file('surat_lomba');


        if ($certificate) {
            //insert certificate
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($certificate->getClientOriginalExtension());
            $certificateImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/certificate';
            $lastImage = $uploadLocation.$certificateImgName;
            $certificate->move($uploadLocation,$certificateImgName);
        }

        if ($award) {
            //insert award
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($award->getClientOriginalExtension());
            $awardImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/award';
            $lastImage = $uploadLocation.$awardImgName;
            $award->move($uploadLocation,$awardImgName);
        }

        if ($letter) {
            //insert letter
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($letter->getClientOriginalExtension());
            $letterImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/letter';
            $lastImage = $uploadLocation.$letterImgName;
            $letter->move($uploadLocation,$letterImgName);
        }

        $input = $request->all();
        $this->validator($input)->validate();
        $skpi = (new Skpi())->getById($id);
        $skpi->nama_kegiatan = $request->nama_kegiatan;
        $skpi->peran = $request->peran;
        $skpi->penyelenggara = $request->penyelenggara;
        $skpi->tgl_mulai = $request->tgl_mulai;
        $skpi->tgl_selesai = $request->tgl_selesai;
        if ($certificate) {
            $skpi->sertifikat = $certificateImgName;
        }

        if ($award) {
            $skpi->foto_penghargaan = $awardImgName;
        }

        if ($letter) {
            $skpi->surat_lomba = $letterImgName;
        }
        $skpi->kategori = $request->kategori;
        $skpi->jenis = $request->jenis;
        $skpi->jml_peserta = $request->jml_peserta;
        $skpi->capaian = $request->capaian;
        $skpi->laman_penyelenggara = $request->laman_penyelenggara;
        $skpi->keterangan = $request->keterangan;
        $skpi->status = $request->status;
        $skpi->golongan_skpi_id = $request->golongan_skpi_id;
        $skpi->dlt = 0;
        $skpi->created_at = date('Y-m-d H:i:s');
        $skpi->save();
        
        $data['skpi'] = $skpi;
        $data['golonganSkpi'] = DB::table('golongan_skpi')->pluck('name', 'id');
        $data['statusAktivitas'] = DB::table('status_aktivitas')->pluck('name', 'id');
        $data['namaKegiatan'] = DB::table('aktivitas')
        ->select(DB::raw('nama_kegiatan as nama'), DB::raw("CONCAT(nama_kegiatan, ' (Penyelenggara : ',penyelenggara,' | Tgl : ',tgl_mulai,' s.d ',tgl_selesai ,')') as nama_kegiatan"), 'dlt')
        ->where('dlt',0)
        ->distinct()
        ->pluck('nama_kegiatan', 'nama');
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validasi(Request $request)
    {
        //
        // dd($request->all());
        $input = $request->all();
        $this->validatorSkpi($input)->validate();
        // $skpi = (new Skpi())->getById($request->nama_kegiatan);
        $namaKegiatan = $request->nama_kegiatan;
        $penyelenggara = $request->penyelenggara;
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;
        $statusAwal = $request->status_awal;
        $statusAkhir = $request->status_akhir;

        $dataSkpi = DB::table('aktivitas')
        ->where([['dlt',0], ['nama_kegiatan',$namaKegiatan], ['penyelenggara',$penyelenggara], ['tgl_mulai',$tgl_mulai], ['tgl_selesai',$tgl_selesai], ['status',$statusAwal]])
        ->update([
            'status'=>$statusAkhir
        ]);

        
        $data['skpi'] = $dataSkpi;
        $data['golonganSkpi'] = DB::table('golongan_skpi')->pluck('name', 'id');
        $data['statusAktivitas'] = DB::table('status_aktivitas')->pluck('name', 'id');
        $data['namaKegiatan'] = DB::table('aktivitas')
        ->select(DB::raw('nama_kegiatan as nama'), DB::raw("CONCAT(nama_kegiatan, ' (Penyelenggara : ',penyelenggara,' | Tgl : ',tgl_mulai,' s.d ',tgl_selesai ,')') as nama_kegiatan"), 'dlt')
        ->where('dlt',0)
        ->distinct()
        ->pluck('nama_kegiatan', 'nama');
        return $this->sendCommonResponse($data, 'Berhasil memvalidasi data', 'validasi');
    }

    protected function validatorSkpi(Array $data)
    {
        return Validator::make($data, [
            'nama_kegiatan'=>'required',
            'penyelenggara'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'status_awal'=>'required',
            'status_akhir'=>'required'
        ]);
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'nama_kegiatan'=>'required',
            'peran'=>'required',
            'penyelenggara'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required'
        ]);
    }

    public function excel()
	{
		return Excel::download(new SkpiExport, 'skpi.xlsx');
	}

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $skpiObj = new Skpi();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addSkpi'] = view('skpi.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            // dd($data['skpi']->jenis_aktivitas);

            if($data['skpi']->jenis_aktivitas == 1){

                $response['replaceWith']['#editSkpi'] = view('skpi.formedit', $data)->render();
            }else if($data['skpi']->jenis_aktivitas == 2){
                $response['replaceWith']['#editSkpi'] = view('skpi.formedit2', $data)->render();
            }else{
                $response['replaceWith']['#editSkpi'] = view('skpi.formedit1', $data)->render();
            }


        } else if ($option == 'show') {



            if($data['skpi']->jenis_aktivitas == 1){

                $response['replaceWith']['#showSkpi'] = view('skpi.profile', $data)->render();
            }else if($data['skpi']->jenis_aktivitas == 2){
                $response['replaceWith']['#showSkpi'] = view('skpi.profile2', $data)->render();
            }else{
                $response['replaceWith']['#showSkpi'] = view('skpi.profile1', $data)->render();
            }



        } else if ($option == 'validasi') {
            $response['replaceWith']['#validasiSkpi'] = view('skpi.validasi', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'validasi', 'delete', 'import'])) {
            if (empty($data['dataSkpi'])) {
                $data['dataSkpi'] = $skpiObj->getAll('paginate');
            }
            $response['replaceWith']['#skpiTable'] = view('skpi.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
