<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BebidasController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UsersController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/bebidas', BebidasController::class);
Route::resource('/tipos', TiposController::class);
Route::resource('/usuarios', UsersController::class);
