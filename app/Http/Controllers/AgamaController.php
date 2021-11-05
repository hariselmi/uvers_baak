<?php

namespace App\Http\Controllers;

use App\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AgamaController extends Controller
{

    public function __construct(Agama $agama)
    {
        $this->middleware('auth');
        $this->agama = $agama;
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
                Session::put('agama_filter', $search);
            } else if( Session::get('agama_filter')) {
                $search = Session::get('agama_filter');
            }
            $data['agamaData'] = $this->agama->getAll('paginate', $search);
            return $this->sendCommonResponse($data, null, 'index');
        }

        $data['agamaData'] = $this->agama->getAll('paginate');
        return view('agama.index', $data);
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
        $agamas = new Agama;
        $agamas->saveAgama($input);
        
        return $this->sendCommonResponse($data=[], 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['agama'] = Agama::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['agama'] = Agama::find($id);
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $agama = (new Agama())->getById($id);
        $agama->name = $request->name;
        $agama->dlt = 0;
        $agama->save();

        $data['agama'] = $agama;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $agama = Agama::find($id);
            $agama->dlt = '1';
            $agama->save();

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
        $agamaObj = new Agama();
        $response = $this->processNotification($notify);
        
        if ($option == 'add') {
            $response['replaceWith']['#addAgama'] = view('agama.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editAgama'] = view('agama.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showAgama'] = view('agama.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['Dataagama'])) {
                $data['agamaData'] = $agamaObj->getAll('paginate');
            }
            $response['replaceWith']['#agamaTable'] = view('agama.table', $data)->render();
        }
        return $this->sendResponse($response);
    }
}
