<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class NonLomba extends Model
{
    use HasFactory;

    protected $table = 'aktivitas';

    public function getAll($option=null, $search=null) {

        $userRole   = Auth::user()->role;
        $userId     = Auth::user()->id;

        if ($userRole != 'admin') {
            # code...

            $results = $this->select('aktivitas.*', 'users.mahasiswa_id')
            ->leftJoin('users', 'aktivitas.user_id', 'users.id')
            ->leftJoin('status_aktivitas', 'aktivitas.status', 'status_aktivitas.id')
            ->leftJoin('golongan_skpi', 'aktivitas.golongan_skpi_id', 'golongan_skpi.id')
            ->leftJoin('jenis_aktivitas', 'aktivitas.jenis_aktivitas', 'jenis_aktivitas.id')
            ->leftJoin('mahasiswa', 'users.mahasiswa_id', 'mahasiswa.id')
            ->where([['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
            ->orderBy('aktivitas.created_at')
            ->orderBy('aktivitas.jenis_aktivitas');
        }else{
            $results = $this->select('aktivitas.*', 'users.mahasiswa_id')
            ->leftJoin('users', 'aktivitas.user_id', 'users.id')
            ->leftJoin('status_aktivitas', 'aktivitas.status', 'status_aktivitas.id')
            ->leftJoin('golongan_skpi', 'aktivitas.golongan_skpi_id', 'golongan_skpi.id')
            ->leftJoin('jenis_aktivitas', 'aktivitas.jenis_aktivitas', 'jenis_aktivitas.id')
            ->leftJoin('mahasiswa', 'users.mahasiswa_id', 'mahasiswa.id')
            ->where([['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
            ->orderBy('aktivitas.created_at')
            ->orderBy('aktivitas.jenis_aktivitas');
        }


        $per_page = !empty($search['per_page']) ? $search['per_page'] : 10;
        if(!empty($search)) {
            if(!empty($search['search'])) {
                if ($userRole != 'admin') {
                    $results = $results->where([['nama_kegiatan', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
                    ->orWhere([['mahasiswa.nim', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
                    ->orWhere([['jenis_aktivitas.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
                    ->orWhere([['golongan_skpi.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
                    ->orWhere([['status_aktivitas.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
                    ->orWhere([['aktivitas.peran', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
                    ->orWhere([['aktivitas.penyelenggara', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]])
                    ->orWhere([['mahasiswa.nama', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2'], ['user_id',$userId]]);
                }else{
                    $results = $results->where([['nama_kegiatan', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
                    ->orWhere([['mahasiswa.nim', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
                    ->orWhere([['jenis_aktivitas.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
                    ->orWhere([['golongan_skpi.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
                    ->orWhere([['status_aktivitas.name', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
                    ->orWhere([['aktivitas.peran', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
                    ->orWhere([['aktivitas.penyelenggara', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']])
                    ->orWhere([['mahasiswa.nama', 'LIKE', '%'.$search['search'].'%'], ['aktivitas.dlt', '0'],[ 'jenis_aktivitas', '2']]);
                }
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
