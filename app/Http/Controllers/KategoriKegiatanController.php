<?php

namespace App\Http\Controllers;

use App\KategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KategoriKegiatanController extends Controller
{

    public function __construct(KategoriKegiatan $kategoriKegiatan)
    {
        $this->middleware('auth');
        $this->kategorikegiatan = $kategoriKegiatan;
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
                Session::put('kategorikegiatan_filter', $search);
            } else if( Session::get('kategorikegiatan_filter')) {
                $search = Session::get('kategorikegiatan_filter');
            }
            $data['kategoriKegiatanData'] = $this->kategorikegiatan->getAll('paginate', $search);
            return $this->sendCommonResponse($data, null, 'index');
        }

        $data['kategoriKegiatanData'] = $this->kategorikegiatan->getAll('paginate');
        return view('kategorikegiatan.index', $data);
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
        $input = $request->all();
        $this->validator($input)->validate();
        $kategoriKegiatans = new KategoriKegiatan;
        $kategoriKegiatans->saveKategoriKegiatan($input);
        
        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['kategoriKegiatan'] = KategoriKegiatan::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['kategoriKegiatan'] = KategoriKegiatan::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kategoriKegiatan = (new KategoriKegiatan())->getById($id);
        $kategoriKegiatan->name = $request->name;
        $kategoriKegiatan->dlt = 0;
        $kategoriKegiatan->save();

        $data['kategoriKegiatan'] = $kategoriKegiatan;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $kategoriKegiatan = KategoriKegiatan::find($id);
            $kategoriKegiatan->dlt = '1';
            $kategoriKegiatan->save();

            return $this->sendCommonResponse([], 'Berhasil menghapus data', 'delete');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->sendCommonResponse([], ['danger'=>__('Integrity constraint violation: You Cannot delete a parent row')]);
        }
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'name'=>'required'
        ]);
    }

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $kategoriKegiatanObj = new KategoriKegiatan();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addKategoriKegiatan'] = view('kategorikegiatan.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editKategoriKegiatan'] = view('kategorikegiatan.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showKategoriKegiatan'] = view('kategorikegiatan.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['DatakategoriKegiatan'])) {
                $data['kategoriKegiatanData'] = $kategoriKegiatanObj->getAll('paginate');
            }
            $response['replaceWith']['#kategorikegiatanTable'] = view('kategorikegiatan.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
