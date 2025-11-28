<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BebidasController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UsersController;


Route::get('/home', function() {
    return view('templates.app');
})->name('home');
    
Route::get('/', function() {
    return redirect()->route('home');
});

Route::patch('/bebidas/{id}/mover-para-adega', [BebidasController::class, 'moverParaAdega'])
    ->name('bebidas.moverParaAdega');

Route::get('/bebidas/lista/{lista}', [BebidasController::class, 'index'])->name('bebidas.index');
Route::resource('/bebidas', BebidasController::class)->except(['index']);

Route::resource('/tipos', TiposController::class);
Route::resource('/usuarios', UsersController::class);
