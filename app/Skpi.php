<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Skpi extends Model
{
    use HasFactory;

    protected $table = 'aktivitas';

    public function getAll($option=null, $search=null) {
        $results = $this->select('aktivitas.*', 'users.mahasiswa_id')
        ->leftJoin('users', 'aktivitas.user_id', 'users.id')
        ->where(['aktivitas.dlt'=>'0'])
        ->orderBy('aktivitas.created_at')
        ->orderBy('aktivitas.jenis_aktivitas');


        $per_page = !empty($search['per_page']) ? $search['per_page'] : 10;
        if(!empty($search)) {
            if(!empty($search['search'])) {
                $results = $results->where([['nama_kegiatan', 'LIKE', '%'.$search['search'].'%'], ['dlt','0']]);
            }
        }
        if($option=='paginate') {
            return $results->paginate($per_page);
        } else if ($option == 'select') {
            return $results->pluck('nama_kegiatan', 'id');
        } else {
            return $results->get();
        }
    }

    public function getById($id) {
        return $this->findOrFail($id);
    }

}
