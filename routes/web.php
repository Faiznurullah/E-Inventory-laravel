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

Route::get('/dashboard', [OtherController::class, 'index'])->name('index');
Route::get('/logout', [OtherController::class, 'logout'])->name('logout');

Route::post('/returnverification', [LoanController::class, 'verifikasikembali'])->name('verifikasikembali');
Route::post('/loanverification/{id}', [LoanController::class, 'verifikasipeminjaman'])->name('verifikasipeminjaman');
Route::post('/returnverification/{id}', [LoanController::class, 'verifikasipengembalian'])->name('verifikasipengembalian');
Route::resource('loan', LoanController::class);

Route::get('/item', [ItemController::class, 'data'])->name('data');
Route::get('/item/{id}', [ItemController::class, 'detail'])->name('detail');

Route::group(['middleware' => ['verified', 'checkRole:admin']], function(){
 

// Tambah Jenis Barang dan Data Jenis Barang
Route::get('/downloadcategorypdf', [CategoryController::class, 'downloadpdf'])->name('downloadpdf');
Route::resource('category', CategoryController::class);

// Tambah data barang dan data barang
Route::get('/downloaditempdf', [ItemController::class, 'downloadpdfbarang'])->name('downloadpdfbarang');
Route::resource('item', ItemController::class);

 
// Kerusakan Barang
Route::resource('fault', FaultController::class);
Route::get('/downloadfaultpdf', [FaultController::class, 'downloadpdf'])->name('downloadpdf');

// Coba Chart
Route::get('/chart', [OtherController::class, 'chart'])->name('chart');

// manajemen Akun
Route::resource('account', AccountController::class);
Route::get('/downloaduserspdf', [AccountController::class, 'downloadpdf'])->name('downloadpdf');


});

