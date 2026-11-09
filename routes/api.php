<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ModeloController;
use App\Models\Locacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('clientes',[ClientesController::class, 'index']);
Route::get('carros',[CarrosController::class, 'index']);
Route::get('locacoes',[LocacaoController::class, 'index']);

//marcas
Route::get('marcas', [MarcasController::class, 'index'])
    ->name('marcas_index');

Route::get('marcas_create',[MarcasController::class, 'create'])->name('marcas_create');
Route::post('marcas',[MarcasController::class, 'store'])->name('marcas_store');

Route::get('marcas/{id}', [MarcasController::class, 'show'])
    ->name('marcas_show');

Route::put('marcas/{id}',[MarcasController::class, 'update'])->name('marcas_update');
Route::delete('marcas/{id}', [MarcasController::class, 'destroy'])->name('marcas_delete');
// end marcas 


Route::get('modelo',[ModeloController::class, 'index']);

