<?php

use App\Http\Controllers\BurgerController;
use App\Http\Controllers\OptionalController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'burger'], function (){
    Route::get('/pedir', [BurgerController::class, 'index'])->name('burger.index');
    Route::post('/pedir', [BurgerController::class, 'store'])->name('burger.store');
    Route::get('/pedidos', [BurgerController::class, 'show'])->name('burger.show');    
    Route::delete('/pedidos/{id}/{optional_id}/delete', [BurgerController::class, 'delete'])->name('burger.delete');
    Route::post('/pedidos/{id}/editar', [BurgerController::class, 'edit'])->name('burger.edit');
    Route::post('/pedidos/{id}/alterar-status', [BurgerController::class, 'editStatus'])->name('burger.edit.status');
});

Route::group(['prefix' => 'api'], function (){
    Route::get('/paes', [BurgerController::class, 'getBreadTypes'])->name('api.burger.paes');
    Route::get('/carnes', [BurgerController::class, 'getMeatTypes'])->name('api.burger.carnes');
    Route::get('/opcionais', [BurgerController::class, 'getOptionalTypes'])->name('api.burger.opcionais');
    Route::get('/status', [BurgerController::class, 'getStatusTypes'])->name('api.burger.status');
    Route::get('/rotas', [BurgerController::class, 'getRoutes'])->name('api.burger.routes');
});


