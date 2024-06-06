<?php

use Illuminate\Support\Facades\Route;
use App\Models\BungaBucket;
use App\Http\Controllers\BungaBucketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;




Route::get('/', function () {
    $bungaBucket = BungaBucket::all(); // Ambil semua data bunga dari tabel bunga
    return view('Admin', ['bunga' => $bungaBucket]); // Kirim data bunga ke view welcome.blade.php
});

// Route::get('/dashboard', function () {
//     // $BungaTersedia = BungaBucket::all(); // Ambil semua data bunga dari tabel bunga
//     return view('dashboard'); // Kirim data bunga ke view welcome.blade.php
// });

Route::get('/bunga', [BungaBucketController::class, 'index'])->name('bunga.index');

Route::get('/create', [BungaBucketController::class, 'create'])->name('bunga.create');
Route::post('/store', [BungaBucketController::class, 'store'])->name('bunga.store');

Route::get('/bunga/{id}/edit', [BungaBucketController::class, 'edit'])->name('bunga.edit');
Route::put('/bunga/{id}', [BungaBucketController::class, 'update'])->name('bunga.update');

Route::delete('/bunga/{id}', [BungaBucketController::class, 'destroy'])->name('bunga.destroy');

Route::get('/transaksi', [TransaksiController::class, 'showTransaksi'])->name('transaksi.index');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/buy/{id}', [BungaBucketController::class, 'showTransactionForm']);
Route::post('/buy/{id}', [BungaBucketController::class, 'processTransaction'])->name('transaksi.buy');
Route::get('/transaksi', [BungaBucketController::class, 'indexTransaksi'])->name('transaksi.index');


Route::get('/admin', [BungaBucketController::class, 'index'])->name('bunga.index');
Route::post('/bunga', [BungaBucketController::class, 'store'])->name('bunga.store');
// Route::get('/dashboard', [BungaBucketController::class, 'index1'])->name('dashboard');
Route::get('/halamanTransaksi', [BungaBucketController::class, 'index1'])->name('transaksi');

// Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

