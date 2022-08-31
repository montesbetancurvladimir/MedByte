<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Empresa\EmpresaController;

//Rutas select triple.
//Route::get('/pruebas',          [App\Http\Controllers\PruebasController::class, 'index']);
//Route::post('/departamentos',          [App\Http\Controllers\PruebasController::class, 'departamentos']);
//Route::post('/municipios',          [App\Http\Controllers\PruebasController::class, 'municipios']);

Route::post('/Empresa/departamentos',          [App\Http\Controllers\Empresa\EmpresaController::class, 'departamentos']);
Route::post('/Empresa/municipios',          [App\Http\Controllers\Empresa\EmpresaController::class, 'municipios']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(EmpresaController::class)->group(function(){
    Route::resource('/Empresa',EmpresaController::class);
});

require __DIR__.'/auth.php';
