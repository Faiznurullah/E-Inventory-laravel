<?php


use App\Http\Controllers;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaultController;

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




Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified', 'checkRole:admin']], function(){

Route::get('/dashboard', [OtherController::class, 'index'])->name('index');
Route::get('/logout', [OtherController::class, 'logout'])->name('logout');

// Tambah Jenis Barang dan Data Jenis Barang
Route::get('/tambahjenisbarang', [CategoryController::class, 'tambah'])->name('tambah');
Route::post('/insertjenisbarang', [CategoryController::class, 'insert'])->name('insert');
Route::get('/datajenisbarang', [CategoryController::class, 'data'])->name('data');
Route::get('/editjenisbarang/{id}', [CategoryController::class, 'edit'])->name('edit');
Route::post('/updatejenisbarang/{id}', [CategoryController::class, 'update'])->name('update');
Route::get('/hapusjenisbarang/{id}', [CategoryController::class, 'hapus'])->name('hapus');
Route::get('/downloadpdfjenisbarang', [CategoryController::class, 'downloadpdf'])->name('downloadpdf');

// Tambah data barang dan data barang
Route::get('/tambahdatabarang', [ItemController::class, 'add'])->name('add');
Route::post('/insertdatabarang', [ItemController::class, 'insert'])->name('insert');
Route::get('/databarang', [ItemController::class, 'data'])->name('data');
Route::get('/detaildatabarang/{id}', [ItemController::class, 'detail'])->name('detail');
Route::get('/hapusdatabarang/{id}', [ItemController::class, 'hapus'])->name('hapus');
Route::get('/editdatabarang/{id}', [ItemController::class, 'edit'])->name('edit');
Route::post('/updatedatabarang/{id}', [ItemController::class, 'update'])->name('update');
Route::get('/downloadpdfdatabarang', [ItemController::class, 'downloadpdfbarang'])->name('downloadpdfbarang');

// Peminjaman barang
Route::get('/peminjamanbarang', [LoanController::class, 'add'])->name('add');
Route::post('/insertpeminjaman', [LoanController::class, 'insert'])->name('insert');
Route::get('/datapeminjaman', [LoanController::class, 'data'])->name('data');
Route::post('/verifikasipeminjaman/{id}', [LoanController::class, 'verifikasipeminjaman'])->name('verifikasipeminjaman');
Route::get('/pengembalianbarang', [LoanController::class, 'kembali'])->name('kembali');
Route::post('/verifikasikembali', [LoanController::class, 'verifikasikembali'])->name('verifikasikembali');
Route::post('/verifikasipengembalian/{id}', [LoanController::class, 'verifikasipengembalian'])->name('verifikasipengembalian');

// Kerusakan Barang
Route::get('/barangrusak', [FaultController::class, 'tambah'])->name('tambah');
Route::post('/insertbarangrusak', [FaultController::class, 'insert'])->name('insert');
Route::get('/databarangrusak', [FaultController::class, 'data'])->name('data');
Route::get('/downloadpdfbarangrusak', [FaultController::class, 'downloadpdf'])->name('downloadpdf');

// Coba Chart
Route::get('/chart', [OtherController::class, 'chart'])->name('chart');

// manajemen Akun
Route::get('/tambahakun', [AccountController::class, 'tambah'])->name('tambahakun');
Route::post('/insertakun', [AccountController::class, 'insert'])->name('insertakun');
Route::get('/dataakun', [AccountController::class, 'data'])->name('dataakun');
Route::get('/editpengguna/{id}', [AccountController::class, 'edit'])->name('editpengguna');
Route::post('/updatepengguna/{id}', [AccountController::class, 'update'])->name('update');
Route::get('/hapuspengguna/{id}', [AccountController::class, 'hapus'])->name('hapus');
Route::get('/downloadpdfpengguna', [AccountController::class, 'downloadpdf'])->name('downloadpdf');


});


Route::group(['middleware' => ['verified', 'checkRole:admin,user']], function(){

Route::get('/dashboard', [OtherController::class, 'index'])->name('index');
Route::get('/logout', [OtherController::class, 'logout'])->name('logout');


Route::get('/databarang', [ItemController::class, 'data'])->name('data');
Route::get('/detaildatabarang/{id}', [ItemController::class, 'detail'])->name('detail');

// Peminjaman barang
Route::get('/peminjamanbarang', [LoanController::class, 'add'])->name('add');
Route::post('/insertpeminjaman', [LoanController::class, 'insert'])->name('insert');
Route::get('/datapeminjaman', [LoanController::class, 'data'])->name('data');
Route::post('/verifikasipeminjaman/{id}', [LoanController::class, 'verifikasipeminjaman'])->name('verifikasipeminjaman');
Route::get('/pengembalianbarang', [LoanController::class, 'kembali'])->name('kembali');
Route::post('/verifikasikembali', [LoanController::class, 'verifikasikembali'])->name('verifikasikembali');
Route::post('/verifikasipengembalian/{id}', [LoanController::class, 'verifikasipengembalian'])->name('verifikasipengembalian');


});
