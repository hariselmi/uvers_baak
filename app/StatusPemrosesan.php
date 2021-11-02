<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class StatusPemrosesan extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_beasiswa';

    public function getAll($option=null, $search=null) {
        $userRole   = Auth::user()->role;
        $userId     = Auth::user()->id;

        if ($userRole != 'admin') {
            # code...
        $results = $this->select('pendaftaran_beasiswa.id', 'pendaftaran_beasiswa.beasiswa_id', 'pendaftaran_beasiswa.mahasiswa_id', 'pendaftaran_beasiswa.status', 'mahasiswa.prodi')->leftJoin('mahasiswa', 'pendaftaran_beasiswa.mahasiswa_id', 'mahasiswa.id')->where(['pendaftaran_beasiswa.dlt'=>'0', 'mahasiswa.dlt'=>'0', 'pendaftaran_beasiswa.mahasiswa_id'=>Auth::user()->mahasiswa_id])->orderBy('pendaftaran_beasiswa.created_at');
        } else {
            # code...
        $results = $this->select('pendaftaran_beasiswa.id', 'pendaftaran_beasiswa.beasiswa_id', 'pendaftaran_beasiswa.mahasiswa_id', 'pendaftaran_beasiswa.status', 'mahasiswa.prodi')->leftJoin('mahasiswa', 'pendaftaran_beasiswa.mahasiswa_id', 'mahasiswa.id')->where(['pendaftaran_beasiswa.dlt'=>'0', 'mahasiswa.dlt'=>'0'])->orderBy('pendaftaran_beasiswa.created_at');
        }
        

        $per_page = !empty($search['per_page']) ? $search['per_page'] : 10;
        if(!empty($search)) {
            if(!empty($search['search'])) {
                $results = $results->where([['name', 'LIKE', '%'.$search['search'].'%'], ['dlt','0']]);
            }
        }
        if($option=='paginate') {
            return $results->paginate($per_page);
        } else if ($option == 'select') {
            return $results->pluck('name', 'id');
        } else {
            return $results->get();
        }
    }

    public function getById($id) {
        return $this->findOrFail($id);
    }

}
