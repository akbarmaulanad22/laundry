<?php

use App\Http\Controllers\CucianController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:Owner|Admin|Kasir'])->group(function () {
    
    Route::middleware(['role:Owner'])->group(function () {
        
        Route::get('karyawan/create', [UserController::class, 'create'])->name('karyawan.create');
        Route::post('karyawan', [UserController::class, 'store'])->name('karyawan.store');
        Route::put('karyawan/{user}', [UserController::class, 'update'])->name('karyawan.update');
        Route::delete('karyawan/{user}', [UserController::class, 'destroy'])->name('karyawan.destroy');

        // meilhat dan membuat laporan
        
    });

    Route::middleware(['role:Admin'])->group(function () {
        Route::put('cucian/{cucian}/status', [CucianController::class, 'status'])->name('cucian.status');
        Route::put('transaksi/{transaksi}/update', [TransaksiController::class, 'update'])->name('transaksi.update');
        
    });
    
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    
    Route::get('karyawan', [UserController::class, 'index'])->name('karyawan.index');
    
    Route::resource('cucian', CucianController::class)->except(['show', 'destroy']);
    
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    
    Route::post('transaksi/{transaksi}/show', [TransaksiController::class, 'show'])->name('transaksi.show');

});
