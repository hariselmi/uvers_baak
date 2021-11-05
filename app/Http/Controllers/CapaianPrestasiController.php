<?php

namespace App\Http\Controllers;

use App\CapaianPrestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CapaianPrestasiController extends Controller
{

    public function __construct(CapaianPrestasi $capaianPrestasi)
    {
        $this->middleware('auth');
        $this->capaianprestasi = $capaianPrestasi;
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
                Session::put('capaianprestasi_filter', $search);
            } else if( Session::get('capaianprestasi_filter')) {
                $search = Session::get('capaianprestasi_filter');
            }
            $data['capaianPrestasiData'] = $this->capaianprestasi->getAll('paginate', $search);
            return $this->sendCommonResponse($data, null, 'index');
        }

        $data['capaianPrestasiData'] = $this->capaianprestasi->getAll('paginate');
        return view('capaianprestasi.index', $data);
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
        $capaianPrestasis = new CapaianPrestasi;
        $capaianPrestasis->saveCapaianPrestasi($input);
        
        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CapaianPrestasi  $capaianPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['capaianPrestasi'] = CapaianPrestasi::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CapaianPrestasi  $capaianPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['capaianPrestasi'] = CapaianPrestasi::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CapaianPrestasi  $capaianPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $capaianPrestasi = (new CapaianPrestasi())->getById($id);
        $capaianPrestasi->name = $request->name;
        $capaianPrestasi->dlt = 0;
        $capaianPrestasi->save();

        $data['capaianPrestasi'] = $capaianPrestasi;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CapaianPrestasi  $capaianPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $capaianPrestasi = CapaianPrestasi::find($id);
            $capaianPrestasi->dlt = '1';
            $capaianPrestasi->save();

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
        $capaianPrestasiObj = new CapaianPrestasi();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addCapaianPrestasi'] = view('capaianprestasi.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editCapaianPrestasi'] = view('capaianprestasi.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showCapaianPrestasi'] = view('capaianprestasi.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['DatacapaianPrestasi'])) {
                $data['capaianPrestasiData'] = $capaianPrestasiObj->getAll('paginate');
            }
            $response['replaceWith']['#capaianprestasiTable'] = view('capaianprestasi.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
