<?php

use App\Http\Controllers\JenisBarangTableController;
use App\Http\Controllers\JenisCuciTableController;
use App\Http\Controllers\Kasir;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PemasukanTableController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {return view('pages.kasir');})->middleware('isLogin');
Route::get('/', [Kasir::class, 'index'])->name('home')->middleware('isLogin ');
Route::post('pesanan', [Kasir::class, 'store_pemasukan_detail'])->name('kasir.pesanan');
Route::post('nota', [Kasir::class, 'update'])->name('kasir.nota');

Route::controller(LayananController::class)->prefix('layanan')->group(function () {
    Route::get('', 'index')->name('layanan');
    Route::post('barang', 'storebarang')->name('layanan.barang');
    Route::post('cuci', 'storecuci')->name('layanan.cuci');
    Route::delete('barang/{id}', 'destroybarang')->name('layanan.delbarang');
    Route::delete('cuci/{id}', 'destroycuci')->name('layanan.delcuci');
});

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');


Route::get('logout', [UserController::class, 'logout'])->name('logout');
