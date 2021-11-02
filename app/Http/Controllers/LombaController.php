<?php

namespace App\Http\Controllers;

use App\Lomba;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LombaController extends Controller
{

    public function __construct(Lomba $lomba)
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
            $data['dataLomba'] = $this->lomba->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataLomba'] = $this->lomba->getAll('paginate');
        return view('lomba.index', $data);
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
        $certificate = $request->file('sertifikat');
        $award = $request->file('foto_penghargaan');
        $letter = $request->file('surat_lomba');

        //insert certificate

        if($certificate){
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($certificate->getClientOriginalExtension());
            $certificateImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/certificate';
            $lastImage = $uploadLocation.$certificateImgName;
            $certificate->move($uploadLocation,$certificateImgName);
        }

        //insert award

        if($award){
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($award->getClientOriginalExtension());
            $awardImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/award';
            $lastImage = $uploadLocation.$awardImgName;
            $award->move($uploadLocation,$awardImgName);
        }

        //insert letter

        if($letter){
            $nameGenerate = hexdec(uniqid());
            $imgExtension = strtolower($letter->getClientOriginalExtension());
            $letterImgName = $nameGenerate.'.'.$imgExtension;
            $uploadLocation = public_path().'/document/letter';
            $lastImage = $uploadLocation.$letterImgName;
            $letter->move($uploadLocation,$letterImgName);
        }

        // insert data into lomba table
        $input = $request->all();
        $this->validator($input)->validate();
        $lomba = new Lomba;
        $lomba->nama_kegiatan = $request->nama_kegiatan;
        $lomba->peran = $request->peran;
        $lomba->penyelenggara = $request->penyelenggara;
        $lomba->tgl_mulai = $request->tgl_mulai;
        $lomba->tgl_selesai = $request->tgl_selesai;
        $lomba->kategori = $request->kategori;
        $lomba->jenis = $request->jenis;
        $lomba->jml_peserta = $request->jml_peserta;
        $lomba->capaian = $request->capaian;
        $lomba->sertifikat = $certificate ? $certificateImgName : null;
        $lomba->laman_penyelenggara = $request->laman_penyelenggara;
        $lomba->foto_penghargaan = $award ? $awardImgName : null;
        $lomba->surat_lomba = $letter ? $letterImgName : null;
        $lomba->keterangan = $request->keterangan;
        $lomba->jenis_aktivitas = 1;
        $lomba->user_id = Auth::user()->id;
        $lomba->dlt = 0;
        $lomba->created_at = date('Y-m-d H:i:s');
        $lomba->save();

        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['lomba'] = Lomba::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['lomba'] = Lomba::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lomba  $lomba
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
        $lomba = (new Lomba())->getById($id);
        $lomba->nama_kegiatan = $request->nama_kegiatan;
        $lomba->peran = $request->peran;
        $lomba->penyelenggara = $request->penyelenggara;
        $lomba->tgl_mulai = $request->tgl_mulai;
        $lomba->tgl_selesai = $request->tgl_selesai;
        if ($certificate) {
            $lomba->sertifikat = $certificateImgName;
        }

        if ($award) {
            $lomba->foto_penghargaan = $awardImgName;
        }

        if ($letter) {
            $lomba->surat_lomba = $letterImgName;
        }
        $lomba->kategori = $request->kategori;
        $lomba->jenis = $request->jenis;
        $lomba->jml_peserta = $request->jml_peserta;
        $lomba->capaian = $request->capaian;
        $lomba->laman_penyelenggara = $request->laman_penyelenggara;
        $lomba->keterangan = $request->keterangan;
        $lomba->jenis_aktivitas = 1;
        $lomba->dlt = 0;
        $lomba->created_at = date('Y-m-d H:i:s');
        $lomba->save();
        
        $data['lomba'] = $lomba;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $lomba = Lomba::find($id);
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
            // 'surat_lomba'=>'required',
            // 'keterangan'=>'required',
        ]);
    }

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $lombaObj = new Lomba();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addLomba'] = view('lomba.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editLomba'] = view('lomba.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showLomba'] = view('lomba.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataLomba'])) {
                $data['dataLomba'] = $lombaObj->getAll('paginate');
            }
            $response['replaceWith']['#lombaTable'] = view('lomba.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
