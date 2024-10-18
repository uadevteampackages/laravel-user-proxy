<?php

use Illuminate\Support\Facades\Route;
use Uadevteampackages\LaravelUserProxy\Http\Controllers\ProxyController;
use Uadevteampackages\LaravelUserProxy\Http\Controllers\FullProxyController;
use Uadevteampackages\LaravelUserProxy\Http\Controllers\QuickProxyController;

Route::group(['middleware' => ['web', 'ms-auth']], function () {
   
    Route::get('/laravel-user-proxy', [ProxyController::class, 'index']);

    Route::get('/laravel-user-proxy/console-full-proxy', [FullProxyController::class, 'consoleFullProxy']);

    Route::get('/laravel-user-proxy/console-quick-proxy', [QuickProxyController::class, 'consoleQuickProxy']);

    Route::post('/laravel-user-proxy/search-for-user', [FullProxyController::class, 'searchForUser']);

    Route::post('/laravel-user-proxy/enter-full-proxy-mode', [FullProxyController::class, 'enterFullProxyMode']);

    Route::get('/laravel-user-proxy/exit-full-proxy-mode', [FullProxyController::class, 'exitFullProxyMode']);

    Route::post('/laravel-user-proxy/enter-quick-proxy-mode', [QuickProxyController::class, 'enterQuickProxyMode']);

    Route::get('/laravel-user-proxy/exit-quick-proxy-mode', [QuickProxyController::class, 'exitQuickProxyMode']);

});

