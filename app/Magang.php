<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Magang extends Model
{
    use HasFactory;

    protected $table = 'aktivitas';

    public function getAll($option=null, $search=null) {

        $userRole   = Auth::user()->role;
        $userId     = Auth::user()->id;

        if ($userRole != 'admin') {
            # code...
            $results = $this->select('*')->where(['dlt'=>'0', 'jenis_aktivitas'=>'5', 'user_id'=>$userId])->orderBy('created_at');
        }else{
            $results = $this->select('*')->where(['dlt'=>'0', 'jenis_aktivitas'=>'5'])->orderBy('created_at');
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
