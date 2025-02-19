<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\LineWebhookController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// Route::get('/', [IndexController::class, 'index']);
Route::post('webhook', [LineWebhookController::class, 'handle'])->withoutMiddleware(VerifyCsrfToken::class);
