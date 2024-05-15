<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databarang extends Model
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

    public function jenisBarang()
    {
        return $this->belongsTo(Jenisbarang::class, 'jenis_barang', 'id');
    }

}
