<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Transacciones\GananciasController;
use App\Http\Controllers\Api\Transacciones\IngresosController;
use App\Http\Controllers\Api\Transacciones\EgresosController;

Route::controller(GananciasController::class)->group(function () {
    Route::get('/ganancias/{mes}/{ano}', 'listar')->name('egresos.show');
});

Route::controller(IngresosController::class)->group(function () {
    Route::get('/ingresos', 'index')->name('ingresos.index');
    Route::post('/ingreso', 'store')->name('ingresos.store');
    Route::get('/ingreso/{id}', 'show')->name('ingresos.show');
    Route::put('/ingreso/{id}', 'update')->name('ingresos.update');
    Route::delete('/ingreso/{id}', 'destroy')->name('ingresos.destroy');
});

Route::controller(EgresosController::class)->group(function () {
    Route::get('/egresos', 'index')->name('egresos.index');
    Route::post('/egreso', 'store')->name('egresos.store');
    Route::get('/egreso/{id}', 'show')->name('egresos.show');
    Route::put('/egreso/{id}', 'update')->name('egresos.update');
    Route::delete('/egreso/{id}', 'destroy')->name('egresos.destroy');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
