<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory;
    protected $table = 'kategori_kegiatan';

    public function getAll($option=null, $search=null) {
        $results = $this->where('dlt', '0')->latest();

        $per_page = !empty($search['per_page']) ? $search['per_page'] : 10;
        if(!empty($search)) {
            if(!empty($search['search'])) {
                $results = $results->where('title', 'LIKE', '%'.$search['search'].'%')
                ->orWhere('date', 'LIKE', '%'.$search['search'].'%');
            }
        }
        if($option=='paginate') {
            return $results->paginate($per_page);
        } else if ($option == 'select') {
            return $results->pluck('title', 'id');
        } else {
            return $results->get();
        }
    }


    public function saveKategoriKegiatan(Array $data)
    {
        $this->name = $data['name'];
        $this->dlt = 0;
        $this->save();
    }

    public function getById($id) {
        return $this->findOrFail($id);
    }
}
