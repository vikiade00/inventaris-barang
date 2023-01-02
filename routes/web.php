<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PeminjamanController;
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
Route::get('/', [LayoutController::class, 'index']);
Route::resource('/barang', BarangController::class);
Route::resource('/peminjaman', PeminjamanController::class);
Route::get('/autofill', [PeminjamanController::class, 'autofill'])->name('autofill');