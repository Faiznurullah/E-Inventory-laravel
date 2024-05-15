<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
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


  
 
    
}
