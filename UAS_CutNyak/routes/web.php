<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\TransaksiController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Pelanggan
Route::get('/pelanggan/', [PelangganController::class, 'index'])->middleware('auth');
Route::get('/pelanggan/form/',[PelangganController::class,'create'])->middleware('auth');
Route::post('/pelanggan/store/', [PelangganController::class, 'store'])->middleware('auth');
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->middleware('auth');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->middleware('auth');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->middleware('auth');

// Route Teknisi
Route::get('/teknisi/', [TeknisiController::class, 'index'])->middleware('auth');
Route::get('/teknisi/form/',[TeknisiController::class,'create'])->middleware('auth');
Route::post('/teknisi/store/', [TeknisiController::class, 'store'])->middleware('auth');
Route::get('/teknisi/edit/{id}', [TeknisiController::class, 'edit'])->middleware('auth');
Route::put('/teknisi/{id}', [TeknisiController::class, 'update'])->middleware('auth');
Route::delete('/teknisi/{id}', [TeknisiController::class, 'destroy'])->middleware('auth');

// Route Riwayat
Route::get('/riwayat/', [RiwayatController::class, 'index'])->middleware('auth');
Route::get('/riwayat/form/',[RiwayatController::class,'create'])->middleware('auth');
Route::post('/riwayat/store/', [RiwayatController::class, 'store'])->middleware('auth');
Route::get('/riwayat/edit/{id}', [RiwayatController::class, 'edit'])->middleware('auth');
Route::put('/riwayat/{id}', [RiwayatController::class, 'update'])->middleware('auth');
Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->middleware('auth');

// Route transaksi
Route::get('/transaksi/', [TransaksiController::class, 'index'])->middleware('auth');
Route::get('/transaksi/form/',[TransaksiController::class,'create'])->middleware('auth');
Route::post('/transaksi/store/', [TransaksiController::class, 'store'])->middleware('auth');
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->middleware('auth');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->middleware('auth');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->middleware('auth');


