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
        ->leftJoin('status_aktivitas', 'aktivitas.status', 'status_aktivitas.id')
        ->leftJoin('golongan_skpi', 'aktivitas.golongan_skpi_id', 'golongan_skpi.id')
        ->leftJoin('jenis_aktivitas', 'aktivitas.jenis_aktivitas', 'jenis_aktivitas.id')
        ->leftJoin('mahasiswa', 'users.mahasiswa_id', 'mahasiswa.id')
        ->where(['aktivitas.dlt'=>'0'])
        ->orderBy('aktivitas.created_at')
        ->orderBy('aktivitas.jenis_aktivitas');


        $per_page = !empty($search['per_page']) ? $search['per_page'] : 10;
        if(!empty($search)) {
            if(!empty($search['search'])) {
                $results = $results->where([['nama_kegiatan', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']])
                ->orWhere([['mahasiswa.nim', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']])
                ->orWhere([['jenis_aktivitas.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']])
                ->orWhere([['golongan_skpi.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']])
                ->orWhere([['status_aktivitas.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']])
                ->orWhere([['aktivitas.peran', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']])
                ->orWhere([['aktivitas.penyelenggara', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']])
                ->orWhere([['mahasiswa.nama', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt','0']]);
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
