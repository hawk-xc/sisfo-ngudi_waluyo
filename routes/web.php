<?php

use App\Http\Controllers\Admin\GiziController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\PosyanduController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

Route::group([
    'prefix' => 'posyandu',
    'middleware' => ['auth']
], function () {
    Route::get('/', [PosyanduController::class, 'index'])->name('posyandu.index');
    Route::resource('/kegiatan', KegiatanController::class)->names([
        'index' => 'kegiatan.index',
        'create' => 'kegiatan.create',
        'store' => 'kegiatan.store',
        'edit' => 'kegiatan.edit',
        'update' => 'kegiatan.update',
        'destroy' => 'kegiatan.destroy',
    ]);
    Route::resource('/gizi', GiziController::class)->names([
        'index' => 'gizi.index',
        'create' => 'gizi.create',
        'store' => 'gizi.store',
        'edit' => 'gizi.edit',
        'update' => 'gizi.update',
        'destroy' => 'gizi.destroy',
    ]);
});

require __DIR__ . '/auth.php';
