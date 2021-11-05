<?php

namespace App\Http\Controllers;

use App\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{

    public function __construct(Prodi $prodi)
    {
        $this->middleware('auth');
        $this->prodi = $prodi;
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
                Session::put('prodi_filter', $search);
            } else if( Session::get('prodi_filter')) {
                $search = Session::get('prodi_filter');
            }
            $data['prodiData'] = $this->prodi->getAll('paginate', $search);
            return $this->sendCommonResponse($data, null, 'index');
        }

        $data['prodiData'] = $this->prodi->getAll('paginate');
        return view('prodi.index', $data);
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
        $prodis = new Prodi;
        $prodis->saveProdi($input);
        
        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['prodi'] = Prodi::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['prodi'] = Prodi::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $prodi = (new Prodi())->getById($id);
        $prodi->name = $request->name;
        $prodi->dlt = 0;
        $prodi->save();

        $data['prodi'] = $prodi;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $prodi = Prodi::find($id);
            $prodi->dlt = '1';
            $prodi->save();

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
        $prodiObj = new Prodi();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addProdi'] = view('prodi.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editProdi'] = view('prodi.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showProdi'] = view('prodi.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['Dataprodi'])) {
                $data['prodiData'] = $prodiObj->getAll('paginate');
            }
            $response['replaceWith']['#prodiTable'] = view('prodi.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
