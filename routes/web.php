<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\User\UserController;

//Rutas select triple.
//Route::get('/pruebas',          [App\Http\Controllers\PruebasController::class, 'index']);
//Route::post('/departamentos',          [App\Http\Controllers\PruebasController::class, 'departamentos']);
//Route::post('/municipios',          [App\Http\Controllers\PruebasController::class, 'municipios']);

Route::post('/Empresa/departamentos',          [App\Http\Controllers\Empresa\EmpresaController::class, 'departamentos']);
Route::post('/Empresa/municipios',          [App\Http\Controllers\Empresa\EmpresaController::class, 'municipios']);


Route::get('/User/index', [UserController::class,'index'])->name('User.index');
Route::post('/User/create-equipo', [UserController::class,'store_equipos'])->name('User.store_equipos');
Route::get('/User/create-equipo', [UserController::class,'create_equipos'])->name('User.create_equipos');
Route::resource('/User',UserController::class);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    //return view('auth.usuarios');
    return redirect("User/index");
})->middleware(['auth'])->name('dashboard');

Route::controller(EmpresaController::class)->group(function(){
    Route::resource('/Empresa',EmpresaController::class);
});

require __DIR__.'/auth.php';
