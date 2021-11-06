<?php

namespace App\Http\Controllers;

use App\NonLomba;
use App\User;
use Auth;
use Get_field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NonLombaController extends Controller
{

    public function __construct(NonLomba $NonLomba)
    {
        $this->middleware('auth');
        $this->nonlomba = $NonLomba;
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
                Session::put('nonlomba_filter', $search);
            } else if( Session::get('nonlomba_filter')) {
                $search = Session::get('nonlomba_filter');
            }
            $data['dataNonLomba'] = $this->nonlomba->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataNonLomba'] = $this->nonlomba->getAll('paginate');
        $data['kategoriKegiatan'] = DB::table('kategori_kegiatan')->where('dlt', 0)->pluck('name', 'id');
        $data['capaianPrestasi'] = DB::table('capaian_prestasi')->where('dlt', 0)->pluck('name', 'id');
        $data['jenisKepesertaan'] = DB::table('jenis_kepesertaan')->where('dlt', 0)->pluck('name', 'id');
        return view('nonlomba.index', $data);
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
            'foto_penghargaan' => 'file|mimes:png,jpg,jpeg,pdf|between:0,2048',
            'surat_nonlomba' => 'file|mimes:png,jpg,jpeg,pdf|between:0,2048',
        ],[
            'sertifikat.mimes' => 'Extensi file sertifikat tidak didukung',
            'sertifikat.between' => 'Ukuran file sertifikat max 2MB',
            'foto_penghargaan.mimes' => 'Extensi file foto upacara penyerahan penghargaan tidak didukung',
            'foto_penghargaan.between' => 'Ukuran file foto upacara penyerahan penghargaan max 2MB',
            'surat_nonlomba.mimes' => 'Extensi file surat tugas atau surat izin tidak didukung',
            'surat_nonlomba.between' => 'Ukuran file surat tugas atau surat izin max 2MB',
        ]);

        $certificate = $request->file('sertifikat');
        $award = $request->file('foto_penghargaan');
        $letter = $request->file('surat_nonlomba');

        $role = Auth::user()->role;
        $tahun = date('Y');
        $judulKegiatan = 'kegiatan_non_lomba';


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

        //insert award

        if($award){
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($award->getClientOriginalExtension());
            $awardImgName = $tahun.'_'.$nim.'_foto_penghargaan_'.$judulKegiatan.'_'.$nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/award';
            $lastImage = $uploadLocation.$awardImgName;
            $award->move($uploadLocation,$awardImgName);
        }

        //insert letter

        if($letter){
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($letter->getClientOriginalExtension());
            $letterImgName = $tahun.'_'.$nim.'_surat_tugas_'.$judulKegiatan.'_'.$nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/letter';
            $lastImage = $uploadLocation.$letterImgName;
            $letter->move($uploadLocation,$letterImgName);
        }

        // insert data into nonLomba table
        $input = $request->all();
        // $this->validator($input)->validate();
        $nonLomba = new NonLomba;
        $nonLomba->nama_kegiatan = $request->nama_kegiatan;
        $nonLomba->peran = $request->peran;
        $nonLomba->penyelenggara = $request->penyelenggara;
        $nonLomba->tgl_mulai = $request->tgl_mulai;
        $nonLomba->tgl_selesai = $request->tgl_selesai;
        $nonLomba->kategori = $request->kategori;
        $nonLomba->jenis = $request->jenis;
        $nonLomba->jml_peserta = $request->jml_peserta;
        $nonLomba->capaian = $request->capaian;
        $nonLomba->sertifikat = $certificate ? $certificateImgName : null;
        $nonLomba->laman_penyelenggara = $request->laman_penyelenggara;
        $nonLomba->foto_penghargaan = $award ? $awardImgName : null;
        $nonLomba->surat_lomba = $letter ? $letterImgName : null;
        $nonLomba->keterangan = $request->keterangan;
        $nonLomba->jenis_aktivitas = 2;
        $nonLomba->user_id = Auth::user()->id;
        $nonLomba->dlt = 0;
        $nonLomba->created_at = date('Y-m-d H:i:s');
        $nonLomba->save();

        $data['kategoriKegiatan'] = DB::table('kategori_kegiatan')->where('dlt', 0)->pluck('name', 'id');
        $data['capaianPrestasi'] = DB::table('capaian_prestasi')->where('dlt', 0)->pluck('name', 'id');
        $data['jenisKepesertaan'] = DB::table('jenis_kepesertaan')->where('dlt', 0)->pluck('name', 'id');
        return $this->sendCommonResponse($data, 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NonLomba  $NonLomba
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['nonlomba'] = NonLomba::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NonLomba  $NonLomba
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['nonlomba'] = NonLomba::find($id);
        $data['kategoriKegiatan'] = DB::table('kategori_kegiatan')->where('dlt', 0)->pluck('name', 'id');
        $data['capaianPrestasi'] = DB::table('capaian_prestasi')->where('dlt', 0)->pluck('name', 'id');
        $data['jenisKepesertaan'] = DB::table('jenis_kepesertaan')->where('dlt', 0)->pluck('name', 'id');
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NonLomba  $NonLomba
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
            'foto_penghargaan' => 'file|mimes:png,jpg,jpeg,pdf|between:0,2048',
            'surat_nonlomba' => 'file|mimes:png,jpg,jpeg,pdf|between:0,2048',
        ],[
            'sertifikat.mimes' => 'Extensi file sertifikat tidak didukung',
            'sertifikat.between' => 'Ukuran file sertifikat max 2MB',
            'foto_penghargaan.mimes' => 'Extensi file foto upacara penyerahan penghargaan tidak didukung',
            'foto_penghargaan.between' => 'Ukuran file foto upacara penyerahan penghargaan max 2MB',
            'surat_nonlomba.mimes' => 'Extensi file surat tugas atau surat izin tidak didukung',
            'surat_nonlomba.between' => 'Ukuran file surat tugas atau surat izin max 2MB',
        ]);

        $certificate = $request->file('sertifikat');
        $award = $request->file('foto_penghargaan');
        $letter = $request->file('surat_nonlomba');

        $role = Auth::user()->role;
        $tahun = date('Y');
        $judulKegiatan = 'kegiatan_non_lomba';


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

        if ($award) {
            //insert award
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($award->getClientOriginalExtension());
            $awardImgName = $tahun.'_'.$nim.'_foto_penghargaan_'.$judulKegiatan.'_'.$nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/award';
            $lastImage = $uploadLocation.$awardImgName;
            $award->move($uploadLocation,$awardImgName);
        }

        if ($letter) {
            //insert letter
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($letter->getClientOriginalExtension());
            $letterImgName = $tahun.'_'.$nim.'_surat_tugas_'.$judulKegiatan.'_'.$nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/letter';
            $lastImage = $uploadLocation.$letterImgName;
            $letter->move($uploadLocation,$letterImgName);
        }

        $input = $request->all();
        // $this->validator($input)->validate();
        $nonLomba = (new NonLomba())->getById($id);
        $nonLomba->nama_kegiatan = $request->nama_kegiatan;
        $nonLomba->peran = $request->peran;
        $nonLomba->penyelenggara = $request->penyelenggara;
        $nonLomba->tgl_mulai = $request->tgl_mulai;
        $nonLomba->tgl_selesai = $request->tgl_selesai;
        if ($certificate) {
            $nonLomba->sertifikat = $certificateImgName;
        }

        if ($award) {
            $nonLomba->foto_penghargaan = $awardImgName;
        }

        if ($letter) {
            $nonLomba->surat_lomba = $letterImgName;
        }
        $nonLomba->kategori = $request->kategori;
        $nonLomba->jenis = $request->jenis;
        $nonLomba->jml_peserta = $request->jml_peserta;
        $nonLomba->capaian = $request->capaian;
        $nonLomba->laman_penyelenggara = $request->laman_penyelenggara;
        $nonLomba->keterangan = $request->keterangan;
        $nonLomba->jenis_aktivitas = 2;
        $nonLomba->dlt = 0;
        $nonLomba->created_at = date('Y-m-d H:i:s');
        $nonLomba->save();
        
        $data['nonlomba'] = $nonLomba;
        $data['kategoriKegiatan'] = DB::table('kategori_kegiatan')->where('dlt', 0)->pluck('name', 'id');
        $data['capaianPrestasi'] = DB::table('capaian_prestasi')->where('dlt', 0)->pluck('name', 'id');
        $data['jenisKepesertaan'] = DB::table('jenis_kepesertaan')->where('dlt', 0)->pluck('name', 'id');
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NonLomba  $NonLomba
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $NonLomba = NonLomba::find($id);
            $NonLomba->dlt = '1';
            $NonLomba->save();

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
            // 'kategori'=>'required',
            // 'jenis'=>'required',
            // 'jml_peserta'=>'required',
            // 'capaian'=>'required',
            // 'sertifikat'=>'required',
            // 'laman_penyelenggara'=>'required',
            // 'foto_penghargaan'=>'required',
            // 'surat_nonlomba'=>'required',
            // 'keterangan'=>'required',
        ]);
    }

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $NonLombaObj = new NonLomba();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addNonLomba'] = view('nonlomba.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editNonLomba'] = view('nonlomba.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showNonLomba'] = view('nonlomba.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataNonLomba'])) {
                $data['dataNonLomba'] = $NonLombaObj->getAll('paginate');
            }
            $response['replaceWith']['#nonLombaTable'] = view('nonlomba.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
