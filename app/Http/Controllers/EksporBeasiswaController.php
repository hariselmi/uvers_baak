<?php

namespace App\Http\Controllers;

use App\Ekspor;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EksporBeasiswaController extends Controller
{

    public function __construct(Ekspor $ekspor)
    {
        $this->middleware('auth');
        $this->ekspor = $ekspor;
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
                Session::put('ekspor_filter', $search);
            } else if( Session::get('ekspor_filter')) {
                $search = Session::get('ekspor_filter');
            }
            $data['ekspors'] = $this->ekspor->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }

        $userRole   = Auth::user()->role;
        $userId     = Auth::user()->id;

        if ($userRole != 'admin') {
            # code...
            $data['auditor'] = User::where('id', $userId)->pluck('name', 'id');
            $data['users'] = User::where('role', 'ekspor')->pluck('name', 'id');
        } else {
            # code...
            $data['auditor'] = User::where('role', 'ekspor')->pluck('name', 'id');
            $data['users'] = User::where('role', 'ekspor')->pluck('name', 'id');
        }
        
        $data['ekspors'] = $this->ekspor->getAll('paginate');
        return view('ekspor.index', $data);
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
        $ekspors = new Ekspor;
        $ekspors->saveEkspor($input);
        
        $userRole   = Auth::user()->role;
        $userId     = Auth::user()->id;

        if ($userRole == 'ekspor') {
            # code...
            $data['auditor'] = User::where('id', $userId)->pluck('name', 'id');
            $data['users'] = DB::table('users')->where('role', 'ekspor')->pluck('name', 'id');
        } else {
            # code...
            $data['auditor'] = User::where('role', 'ekspor')->pluck('name', 'id');
            $data['users'] = DB::table('users')->where('role', 'ekspor')->pluck('name', 'id');
        }
        return $this->sendCommonResponse($data, 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekspor  $ekspor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['ekspor'] = Ekspor::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekspor  $ekspor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['ekspor'] = Ekspor::find($id);



        $data['auditor'] = User::where('role', 'ekspor')->pluck('name', 'id');


        $data['users'] = User::where('role', 'ekspor')
                ->where('id', '!=', $data['ekspor']->auditor_id)
                ->whereNotIn('id', DB::table('ekspors')->select('users_id')->where('dlt','0')->where('users_id','!=',$data['ekspor']->users_id)) 
                ->pluck('name', 'id');

        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekspor  $ekspor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        //
        $input = $request->all();
        $this->validator($input)->validate();
        $ekspors = (new Ekspor())->getById($id);
        
        $ekspors->saveEkspor($input);
        $data['ekspor'] = $ekspors;
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekspor  $ekspor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $ekspor = Ekspor::find($id);
            $ekspor->dlt = '1';
            $ekspor->save();

            return $this->sendCommonResponse([], 'Berhasil menghapus data', 'delete');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->sendCommonResponse([], ['danger'=>__('Integrity constraint violation: You Cannot delete a parent row')]);
        }
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'auditor_id'=>'required',
            'users_id'=>'required',
        ]);
    }

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $eksporObj = new Ekspor();
        $response = $this->processNotification($notify);
        
        $userRole   = Auth::user()->role;
        $userId     = Auth::user()->id;

        
        if ($option == 'add') {
            $response['replaceWith']['#addEkspor'] = view('ekspor.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editEkspor'] = view('ekspor.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showEkspor'] = view('ekspor.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['ekspors'])) {
                $data['ekspors'] = $eksporObj->getAll('paginate');
            }
            $response['replaceWith']['#eksporTable'] = view('ekspor.table', $data)->render();
        }
        return $this->sendResponse($response);
    }

    public function getEkspor($id){


        $ekspors = DB::select("SELECT users.id, users.name FROM ekspors 
            JOIN users ON users.id = ekspors.users_id
            WHERE ekspors.auditor_id = '$id'
            AND ekspors.dlt = '0'");

        return $ekspors;
    }

    public function getEkspors($id){

        $ekspors = DB::select("SELECT id, name from users WHERE id != '$id' AND id NOT IN (SELECT users_id FROM ekspors WHERE dlt = '0' and auditor_id='$id')  AND role = 'ekspor'");


        return $ekspors;

    }
}
