<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    use HasFactory;

    protected $table = "kerusakan";

    protected $primaryKey = "id";

    protected $fillable = [
    	'name',
        'jenis_barang',
        'kondisi',
        'kode_barang'
    ];

    public $timestamps = false;

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'jenis_barang', 'id');
    }

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
