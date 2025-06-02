<?php

use App\Http\Controllers\BurgerController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'burger'], function (){
    Route::get('/pedir', [BurgerController::class, 'index'])->name('burger.index');
    Route::post('/pedir', [BurgerController::class, 'store'])->name('burger.store');
    Route::get('/pedidos', [BurgerController::class, 'show'])->name('burger.show');
});

Route::group(['prefix' => 'api'], function (){
    Route::get('/paes', [BurgerController::class, 'getBreadTypes'])->name('api.burger.paes');
    Route::get('/carnes', [BurgerController::class, 'getMeatTypes'])->name('api.burger.carnes');
    Route::get('/opcionais', [BurgerController::class, 'getOptionalTypes'])->name('api.burger.opcionais');

});


