<?php

namespace App\Http\Controllers;

use App\JenisKepesertaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class JenisKepesertaanController extends Controller
{

    public function __construct(JenisKepesertaan $jenisKepesertaan)
    {
        $this->middleware('auth');
        $this->jeniskepesertaan = $jenisKepesertaan;
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
                Session::put('jeniskepesertaan_filter', $search);
            } else if( Session::get('jeniskepesertaan_filter')) {
                $search = Session::get('jeniskepesertaan_filter');
            }
            $data['jenisKepesertaanData'] = $this->jeniskepesertaan->getAll('paginate', $search);
            return $this->sendCommonResponse($data, null, 'index');
        }

        $data['jenisKepesertaanData'] = $this->jeniskepesertaan->getAll('paginate');
        return view('jeniskepesertaan.index', $data);
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
        $jenisKepesertaans = new JenisKepesertaan;
        $jenisKepesertaans->saveJenisKepesertaan($input);
        
        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisKepesertaan  $jenisKepesertaan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['jenisKepesertaan'] = JenisKepesertaan::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisKepesertaan  $jenisKepesertaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['jenisKepesertaan'] = JenisKepesertaan::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisKepesertaan  $jenisKepesertaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jenisKepesertaan = (new JenisKepesertaan())->getById($id);
        $jenisKepesertaan->name = $request->name;
        $jenisKepesertaan->dlt = 0;
        $jenisKepesertaan->save();

        $data['jenisKepesertaan'] = $jenisKepesertaan;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisKepesertaan  $jenisKepesertaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $jenisKepesertaan = JenisKepesertaan::find($id);
            $jenisKepesertaan->dlt = '1';
            $jenisKepesertaan->save();

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
        $jenisKepesertaanObj = new JenisKepesertaan();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addJenisKepesertaan'] = view('jeniskepesertaan.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editJenisKepesertaan'] = view('jeniskepesertaan.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showJenisKepesertaan'] = view('jeniskepesertaan.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['DatajenisKepesertaan'])) {
                $data['jenisKepesertaanData'] = $jenisKepesertaanObj->getAll('paginate');
            }
            $response['replaceWith']['#jeniskepesertaanTable'] = view('jeniskepesertaan.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
