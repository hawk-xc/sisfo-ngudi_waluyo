<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PemeriksaanController;
use App\Http\Controllers\Admin\GiziController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\PenanggungJawabController;
use App\Http\Controllers\LansiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('landingpage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth'],
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => 'role:pj|kader|admin'], function () {
        Route::resource('/pemeriksaan', PemeriksaanController::class)->names([
            'index' => 'pemeriksaan.index',
            'show' => 'pemeriksaan.show',
            'create' => 'pemeriksaan.create',
            'store' => 'pemeriksaan.store',
            'edit' => 'pemeriksaan.edit',
            'update' => 'pemeriksaan.update'
        ]);

        Route::post('/attact-gizi', [PemeriksaanController::class, 'attach_gizi'])->name('pemeriksaan.attach_gizi');
        Route::delete('/remove-gizi', [PemeriksaanController::class, 'remove_gizi'])->name('pemeriksaan.remove_gizi');
    });

    Route::resource('/kegiatan', KegiatanController::class)->names([
        'index' => 'kegiatan.index',
        'create' => 'kegiatan.create',
        'store' => 'kegiatan.store',
        'edit' => 'kegiatan.edit',
        'update' => 'kegiatan.update',
        'destroy' => 'kegiatan.destroy',
    ])->middleware('role:pj|kader|admin');

    Route::group(['middleware' => 'role:kader|admin'], function () {
        Route::resource('/gizi', GiziController::class)->names([
            'index' => 'gizi.index',
            'create' => 'gizi.create',
            'store' => 'gizi.store',
            'edit' => 'gizi.edit',
            'update' => 'gizi.update',
            'destroy' => 'gizi.destroy',
        ]);
        Route::get('/select2', [GiziController::class, 'select2'])->name('gizi.select2');
    });

    Route::group([
        'prefix' => 'lansia',
        'middleware' => 'role:pj|kader|admin'
    ], function () {
        Route::get('/', [LansiaController::class, 'index'])->name('lansia.index');
        Route::get('/tambah-lansia', [LansiaController::class, 'create'])->name('lansia.create');
        Route::post('/insert-lansia', [LansiaController::class, 'store'])->name('lansia.store');
        Route::get('/show-lansia/{lansia}', [LansiaController::class, 'show'])->name('lansia.show');
        Route::get('/edit-lansia/{id}/edit', [LansiaController::class, 'edit'])->name('lansia.edit');
        Route::put('/edit-lansia/{id}', [LansiaController::class, 'update'])->name('lansia.update');
        Route::delete('/delete-lansia/{id}', [LansiaController::class, 'destroy'])->name('lansia.destroy');
        Route::get('/select2', [LansiaController::class, 'select2'])->name('lansia.select2');
    });

    Route::resource('/pj', PenanggungJawabController::class)->names([
        'index' => 'pj.index',
        'create' => 'pj.create',
        'store' => 'pj.store',
        'edit' => 'pj.edit',
        'update' => 'pj.update',
        'destroy' => 'pj.destroy',
    ])->middleware('role:kader|admin');
});


require __DIR__ . '/auth.php';
