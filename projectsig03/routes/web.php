<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/gempa', function(){
    return view('gempa');
});


Route::get('/peta', [PetaController::class, 'index']);
