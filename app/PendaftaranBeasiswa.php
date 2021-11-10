<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class PendaftaranBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswa';

    public function getAll($option=null, $search=null) {
        $results = $this->select('*')->where(['dlt'=>'0'])->orderBy('created_at');

        $per_page = !empty($search['per_page']) ? $search['per_page'] : 10;
        if(!empty($search)) {
            if(!empty($search['search'])) {
                $results = $results->where([['nama_paket', 'LIKE', '%'.$search['search'].'%'], ['dlt','0']])
                ->orWhere([['deskripsi', 'LIKE', '%'.$search['search'].'%'], ['dlt','0']]);
            }
        }
        if($option=='paginate') {
            return $results->paginate($per_page);
        } else if ($option == 'select') {
            return $results->pluck('nama_paket', 'id');
        } else {
            return $results->get();
        }
    }

    public function getById($id) {
        return $this->findOrFail($id);
    }

}
