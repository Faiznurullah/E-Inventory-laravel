<?php


use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelogController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DatabarangController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\JenisbarangController;
use App\Http\Controllers\KerusakanController;

Route::get('/', function () {
    return view('auth.register');
})->name('utama');

Route::get('/login', function () {
    return view('auth.login');
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirecToGoogle')->name('auth.google');
    Route::get('callback/google', 'handleGoogleCallback');
});

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirecToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handlefacebookCallback');
});



Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified', 'checkRole:admin']], function(){

Route::get('/dashboard', [RelogController::class, 'index'])->name('index');
Route::get('/logout', [RelogController::class, 'logout'])->name('logout');

// Tambah Jenis Barang dan Data Jenis Barang
Route::get('/tambahjenisbarang', [JenisbarangController::class, 'tambah'])->name('tambah');
Route::post('/insertjenisbarang', [JenisbarangController::class, 'insert'])->name('insert');
Route::get('/datajenisbarang', [JenisbarangController::class, 'data'])->name('data');
Route::get('/editjenisbarang/{id}', [JenisbarangController::class, 'edit'])->name('edit');
Route::post('/updatejenisbarang/{id}', [JenisbarangController::class, 'update'])->name('update');
Route::get('/hapusjenisbarang/{id}', [JenisbarangController::class, 'hapus'])->name('hapus');
Route::get('/downloadpdfjenisbarang', [JenisbarangController::class, 'downloadpdf'])->name('downloadpdf');

// Tambah data barang dan data barang
Route::get('/tambahdatabarang', [DatabarangController::class, 'tambah'])->name('tambah');
Route::post('/insertdatabarang', [DatabarangController::class, 'insert'])->name('insert');
Route::get('/databarang', [DatabarangController::class, 'data'])->name('data');
Route::get('/detaildatabarang/{id}', [DatabarangController::class, 'detail'])->name('detail');
Route::get('/hapusdatabarang/{id}', [DatabarangController::class, 'hapus'])->name('hapus');
Route::get('/editdatabarang/{id}', [DatabarangController::class, 'edit'])->name('edit');
Route::post('/updatedatabarang/{id}', [DatabarangController::class, 'update'])->name('update');
Route::get('/downloadpdfdatabarang', [DatabarangController::class, 'downloadpdfbarang'])->name('downloadpdfbarang');

// Peminjaman barang
Route::get('/peminjamanbarang', [PeminjamanController::class, 'tambah'])->name('tambah');
Route::post('/insertpeminjaman', [PeminjamanController::class, 'insert'])->name('insert');
Route::get('/datapeminjaman', [PeminjamanController::class, 'data'])->name('data');
Route::post('/verifikasipeminjaman/{id}', [PeminjamanController::class, 'verifikasipeminjaman'])->name('verifikasipeminjaman');
Route::get('/pengembalianbarang', [PeminjamanController::class, 'kembali'])->name('kembali');
Route::post('/verifikasikembali', [PeminjamanController::class, 'verifikasikembali'])->name('verifikasikembali');
Route::post('/verifikasipengembalian/{id}', [PeminjamanController::class, 'verifikasipengembalian'])->name('verifikasipengembalian');

// Kerusakan Barang
Route::get('/barangrusak', [KerusakanController::class, 'tambah'])->name('tambah');
Route::post('/insertbarangrusak', [KerusakanController::class, 'insert'])->name('insert');
Route::get('/databarangrusak', [KerusakanController::class, 'data'])->name('data');
Route::get('/downloadpdfbarangrusak', [KerusakanController::class, 'downloadpdf'])->name('downloadpdf');

// Coba Chart
Route::get('/chart', [RelogController::class, 'chart'])->name('chart');

});


Route::group(['middleware' => ['verified', 'checkRole:admin,user']], function(){

Route::get('/dashboard', [RelogController::class, 'index'])->name('index');
Route::get('/logout', [RelogController::class, 'logout'])->name('logout');


Route::get('/databarang', [DatabarangController::class, 'data'])->name('data');
Route::get('/detaildatabarang/{id}', [DatabarangController::class, 'detail'])->name('detail');

// Peminjaman barang
Route::get('/peminjamanbarang', [PeminjamanController::class, 'tambah'])->name('tambah');
Route::post('/insertpeminjaman', [PeminjamanController::class, 'insert'])->name('insert');
Route::get('/datapeminjaman', [PeminjamanController::class, 'data'])->name('data');
Route::post('/verifikasipeminjaman/{id}', [PeminjamanController::class, 'verifikasipeminjaman'])->name('verifikasipeminjaman');
Route::get('/pengembalianbarang', [PeminjamanController::class, 'kembali'])->name('kembali');
Route::post('/verifikasikembali', [PeminjamanController::class, 'verifikasikembali'])->name('verifikasikembali');
Route::post('/verifikasipengembalian/{id}', [PeminjamanController::class, 'verifikasipengembalian'])->name('verifikasipengembalian');


});
