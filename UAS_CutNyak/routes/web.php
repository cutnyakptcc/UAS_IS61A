<?php

use App\Http\Controllers\PelangganController;
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
Route::get('/pelanggan/form/', [PelangganController::class, 'create'])->middleware('auth');
Route::post('/pelanggan/store/', [PelangganController::class, 'store'])->middleware('auth');
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->middleware('auth');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->middleware('auth');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->middleware('auth');
