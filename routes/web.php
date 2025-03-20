<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PosyanduController;
use App\Http\Controllers\LansiaController;
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
    'middleware' => ['auth', 'role:admin'],
], function () {
    Route::get('/', [PosyanduController::class, 'index'])->name('posyandu.index');
});
Route::group([
    'prefix' => 'lansia',
    'middleware' => ['auth']
], function () {
    Route::get('/', [LansiaController::class, 'index'])->name('lansia.index');
    Route::get('/tambah-lansia', [LansiaController::class, 'create'])->name('lansia.create');
    Route::post('/insert-lansia', [LansiaController::class, 'store'])->name('lansia.store');
    Route::get('/show-lansia/{lansia}', [LansiaController::class, 'show'])->name('lansia.show');
    Route::get('/edit-lansia/{id}/edit', [LansiaController::class, 'edit'])->name('lansia.edit');
    Route::put('/edit-lansia/{id}', [LansiaController::class, 'update'])->name('lansia.update');
    Route::delete('/delete-lansia/{id}', [LansiaController::class, 'destroy'])->name('lansia.destroy');
});

require __DIR__ . '/auth.php';
