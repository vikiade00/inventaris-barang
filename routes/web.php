<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/', [SessionController::class, 'index'])->middleware('isTamu');
Route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');

Route::resource('/dashboard', DashboardController::class)->middleware('isLogin');
Route::resource('/barang', BarangController::class)->middleware('isLogin');
Route::delete('barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::resource('/peminjaman', PeminjamanController::class)->middleware('isLogin');
Route::resource('/pengembalian', PengembalianController::class)->middleware('isLogin');

Route::get('/peminjam/register',[PeminjamController::class, 'create'])->middleware('isTamu');
Route::post('/peminjam/store',[PeminjamController::class, 'store'])->middleware('isTamu');
Route::resource('/peminjam', PeminjamController::class)->middleware('isLogin');

Route::get('/print/barang', [CetakController::class, 'cetakBarang']);

