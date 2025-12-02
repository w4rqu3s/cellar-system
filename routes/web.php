<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\BebidasController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware(['auth', 'verified']);

Route::get('/dashboard-adega', [DashboardController::class, 'index'])->name('dashboard.index')
    ->middleware(['auth', 'verified']);
Route::get('/dashboard-adega/report', [DashboardController::class, 'report'])->name('dashboard.report')
    ->middleware(['auth', 'verified']);

Route::patch('/bebidas/{id}/mover-para-adega', [BebidasController::class, 'moverParaAdega'])->name('bebidas.moverParaAdega')
    ->middleware(['auth', 'verified']);

Route::get('/bebidas/lista/{lista}', [BebidasController::class, 'index'])->name('bebidas.index')
    ->middleware(['auth', 'verified']);
Route::resource('/bebidas', BebidasController::class)->except(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('/tipos', TiposController::class)
    ->middleware(['auth', 'verified']);
Route::resource('/usuarios', UsersController::class)
    ->middleware(['auth', 'verified']);
Route::delete('/usuarios/{id}/ban', [UsersController::class, 'ban'])->name('usuarios.ban')
    ->middleware(['auth', 'verified']);

// Breeze

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

