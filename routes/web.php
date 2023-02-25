<?php

use App\Http\Controllers\CucianController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

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

    Route::get('pelanggan/json', [PelangganController::class, 'data'])->name('pelanggan.json');
    
    Route::get('karyawan/json', [UserController::class, 'data'])->name('karyawan.json');
    
    Route::get('karyawan', [UserController::class, 'index'])->name('karyawan.index');
    
    Route::resource('cucian', CucianController::class)->except(['show', 'destroy']);
    Route::get('cucian/json', [CucianController::class, 'data'])->name('cucian.json');
    
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/json', [TransaksiController::class, 'data'])->name('transaksi.json');
    
    Route::post('transaksi/{transaksi}/show', [TransaksiController::class, 'show'])->name('transaksi.show');

    Route::get('outlet', [OutletController::class, 'edit'])->name('outlet.edit');
    Route::patch('outlet/update', [OutletController::class, 'update'])->name('outlet.update');

});
