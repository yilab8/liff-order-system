<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;

Route::apiResource('menus', MenuController::class);
Route::apiResource('orders', OrderController::class);
