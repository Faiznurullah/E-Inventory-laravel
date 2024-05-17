<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "data_barang";

    protected $primaryKey = "id";

    protected $fillable = [
    	'name',
        'jenis_barang',
        'foto',
        'kondisi',
        'tersedia',
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

    public function getDataByCode($code){
        return $this->where('kode_barang', $code)->first();
    }

    public function updateData($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    public function updateDataByCode($id, $data)
    {
        return $this->where('kode_barang', $id)->update($data);
    }

    public function deleteById($id)
    {
        return $this->where('id', $id)->delete();
    }

    public static function getWithCategory()
    {
        return self::with('getCategory')->get();
    }

    public function getGoodCondition(){
        return $this->where('kondisi', 'baik')->get();
    }

    public function getBadCondition(){
        return $this->where('kondisi', 'rusak')->get();
    }

    public function getDataReady(){
        return $this->where('tersedia', 'ya')->get();
    }

}
