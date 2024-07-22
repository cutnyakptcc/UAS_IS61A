<?php

use App\Http\Controllers\KaryawanController;
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

// Data 
Route::get('/karyawan/', [KaryawanController::class, 'index'])->middleware('auth');
Route::get('/karyawan/form/', [KaryawanController::class, 'create'])->middleware('auth');
Route::post('/karyawan/store/', [KaryawanController::class, 'store'])->middleware('auth');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->middleware('auth');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->middleware('auth');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->middleware('auth');
