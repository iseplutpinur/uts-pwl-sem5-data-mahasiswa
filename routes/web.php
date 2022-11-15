<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;


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
// rute default mahasiswa
Route::get('/', [MahasiswaController::class, 'index'])->name('home');

Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/prodi', ProdiController::class);
Route::resource('/fakultas', FakultasController::class);
