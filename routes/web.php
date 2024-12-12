<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Status;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login & logout user //
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// tombol masuk & struk // 
Route::get('/', [ParkirController::class, 'index'])->name('masuk');
Route::get('/masuk/{jenis}', [ParkirController::class, 'create']);
Route::get('/struk/{kode_parkir}', [ParkirController::class, 'struk']);


//middleware admin //
Route::middleware([Status::class])->group(function(){
    
    // kelola user
    Route::resource('/user', UserController::class)->except('destroy');
    Route::get('/user/{id}/hapus', [UserController::class, 'destroy']);

    //kelola tarif
    Route::resource('/tarif', TarifController::class)->except('destroy');
    Route::get('/tarif/{id}/hapus', [TarifController::class, 'destroy']);

});

// middleware auth //
Route::group(['middleware' => 'auth'], function(){
    
    //dashboard karyawan
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // daftar transaksi keluar (transaksi.index)
    Route::get('/keluar-parkir', [ParkirController::class, 'show']);
    Route::post('/keluar-parkir', [ParkirController::class, 'edit']);

    // mengarah ke transaksi detail
    Route::get('/keluar-parkir/{kode_parkir}', [ParkirController::class, 'edit']);

    // transaksi detail
    Route::post('/keluar-parkir/{kode_parkir}', [ParkirController::class, 'update']);

    // history & filter parkir
    Route::get('/riwayat-detail/{id}', [HistoryController::class, 'detail']);
    Route::get('/riwayat-parkir', [HistoryController::class, 'history']);
    Route::get('/riwayat-parkir/filter', [HistoryController::class, 'filter']);
    Route::post('/riwayat-parkir/filter', [HistoryController::class, 'sort']);

    // karcis keluar
    Route::get('/struk-keluar/{kode_parkir}', [ParkirController::class, 'keluar']);
});

