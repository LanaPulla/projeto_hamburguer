<?php

use App\Http\Controllers\BurgerController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'burger'], function (){
    Route::get('/pedir', [BurgerController::class, 'index'])->name('burger.index');
    // Route::get('/pedidos', [BurgerController::class, 'index'])->name('burger.index');
});

