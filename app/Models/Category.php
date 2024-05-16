<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "jenis_barang";

    protected $primaryKey = "id";

    protected $fillable = [
    	'name'
    ];

    public $timestamps = false;


    public function getAllData()
    {
        return $this->latest()->get();
    }

    public function create($data){
        return $this->create($data);
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function updateData($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return $this->where('id', $id)->delete();
    }

}
