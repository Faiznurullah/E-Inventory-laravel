<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
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

    public function jenisBarang()
    {
        return $this->belongsTo(Jenisbarang::class, 'jenis_barang', 'id');
    }


}
