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

Route::post('/returnverification', [LoanController::class, 'return'])->name('return');
Route::post('/loanverification/{id}', [LoanController::class, 'loan'])->name('loan');
Route::post('/returnverification/{id}', [LoanController::class, 'returnbyid'])->name('returnbyid');
Route::resource('loan', LoanController::class);

Route::get('/item', [ItemController::class, 'index'])->name('index');
Route::get('/item/{id}', [ItemController::class, 'show'])->name('show');

Route::group(['middleware' => ['verified', 'checkRole:admin']], function(){
 

// Tambah Jenis Barang dan Data Jenis Barang
Route::get('/downloadcategorypdf', [CategoryController::class, 'download'])->name('download');
Route::resource('category', CategoryController::class);

// Tambah data barang dan data barang
Route::get('/downloaditempdf', [ItemController::class, 'download'])->name('download');
Route::resource('item', ItemController::class);

 
// Kerusakan Barang
Route::resource('fault', FaultController::class);
Route::get('/downloadfaultpdf', [FaultController::class, 'download'])->name('download');

// Coba Chart
Route::get('/chart', [OtherController::class, 'chart'])->name('chart');

// manajemen Akun
Route::resource('account', AccountController::class);
Route::get('/downloaduserspdf', [AccountController::class, 'download'])->name('download');


});

