<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\User;
use Auth;
use \Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{

    public function __construct(Mahasiswa $mahasiswa)
    {
        $this->middleware('auth');
        $this->mahasiswa = $mahasiswa;
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
                Session::put('mahasiswa_filter', $search);
            } else if( Session::get('mahasiswa_filter')) {
                $search = Session::get('mahasiswa_filter');
            }
            $data['dataMahasiswa'] = $this->mahasiswa->getAll('paginate', $search);

            return $this->sendCommonResponse($data, null, 'index');
        }
        
        $data['dataMahasiswa'] = $this->mahasiswa->getAll('paginate');
        $data['agama'] = DB::table('agama')->where('dlt', 0)->pluck('name', 'id');
        $data['prodi'] = DB::table('prodi')->where('dlt', 0)->pluck('name', 'id');
        return view('mahasiswa.index', $data);
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
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->telp = $request->telp;
        $mahasiswa->email = $request->email;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->dlt = 0;
        $mahasiswa->created_at = date('Y-m-d H:i:s');
        $mahasiswa->save();

        $user = new User;
        $user->mahasiswa_id = $mahasiswa->id;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->username = $request->nim;
        $user->role = 'mahasiswa';
        $user->password = Hash::make($request->nim);
        $user->save();
        $this->assignRoles($user, 'mahasiswa');

        $data['agama'] = DB::table('agama')->where('dlt', 0)->pluck('name', 'id');
        $data['prodi'] = DB::table('prodi')->where('dlt', 0)->pluck('name', 'id');
        return $this->sendCommonResponse($data, 'Berhasil menyimpan data', 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data['mahasiswa'] = Mahasiswa::find($id);
        return $this->sendCommonResponse($data, null, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['mahasiswa'] = Mahasiswa::find($id);
        $data['agama'] = DB::table('agama')->where('dlt', 0)->pluck('name', 'id');
        $data['prodi'] = DB::table('prodi')->where('dlt', 0)->pluck('name', 'id');
        return $this->sendCommonResponse($data, null, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        $input = $request->all();
        $this->validator($input)->validate();
        $mahasiswa = (new Mahasiswa())->getById($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->telp = $request->telp;
        $mahasiswa->email = $request->email;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->dlt = 0;
        $mahasiswa->created_at = date('Y-m-d H:i:s');
        $mahasiswa->save();

        DB::table('users')->where('mahasiswa_id', '=',$id)->update([
            'username'=> $request->nim,
            'email'=> $request->email,
        ]);
        
        $data['mahasiswa'] = $mahasiswa;
        $data['agama'] = DB::table('agama')->where('dlt', 0)->pluck('name', 'id');
        $data['prodi'] = DB::table('prodi')->where('dlt', 0)->pluck('name', 'id');
        return $this->sendCommonResponse($data, 'Berhasil memperbarui data', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $mahasiswa = Mahasiswa::find($id);
            $mahasiswa->dlt = '1';
            $mahasiswa->save();

            return $this->sendCommonResponse([], 'Berhasil menghapus data', 'delete');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->sendCommonResponse([], ['danger'=>__('Integrity constraint violation: You Cannot delete a parent row')]);
        }
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'nim'=>'required',
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'telp'=>'required',
            'agama'=>'required',
            'jenis_kelamin'=>'required',
            'prodi'=>'required',
            'alamat'=>'required',
        ]);
    }

    private function sendCommonResponse($data=[], $notify = '', $option = null) 
    {
        $mahasiswaObj = new Mahasiswa();
        $response = $this->processNotification($notify);
        
        $userRole   = Auth::user()->role;
        $userId     = Auth::user()->id;

        
        if ($option == 'add') {
            $response['replaceWith']['#addMahasiswa'] = view('mahasiswa.formadd', $data)->render();
        } else if ($option == 'edit' || $option == 'update') {
            $response['replaceWith']['#editMahasiswa'] = view('mahasiswa.formedit', $data)->render();
        } else if ($option == 'show') {
            $response['replaceWith']['#showMahasiswa'] = view('mahasiswa.profile', $data)->render();
        }
        if ( in_array($option, ['index', 'add', 'update', 'delete', 'import'])) {
            if (empty($data['dataMahasiswa'])) {
                $data['dataMahasiswa'] = $mahasiswaObj->getAll('paginate');
            }
            $response['replaceWith']['#mahasiswaTable'] = view('mahasiswa.table', $data)->render();
        }
        return $this->sendResponse($response);
    }


    public function assignRoles($user, $role)
    {
        if ($user->id == 1) {
            Session::flash('message', 'You can not assign admin role');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        $all_past_roles = $user->getRoleNames();

        foreach ($all_past_roles as $value) {
            $user->removeRole($value);
        }
        $user->assignRole($role);
    }
}
