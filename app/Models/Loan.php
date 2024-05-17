<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = "peminjaman_barang";

    protected $primaryKey = "id";

    protected $fillable = [
        'peminjam',
        'name',
        'user_id',
        'kode_barang',
        'surat',
        'kondisi',
        'tersedia',
        'foto'
    ];


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

    public function getDataByUserId($id)
    {
        return $this->where('User_id', $id)->get();
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
