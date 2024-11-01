<?php

use Illuminate\Support\Facades\Route;
use Uadevteampackages\LaravelUserProxy\Http\Controllers\ProxyController;

Route::group(['middleware' => ['web', 'laravel-user-proxy']], function () {

        Route::redirect('/lup', '/laravel-user-proxy');

        Route::get('/laravel-user-proxy', [ProxyController::class, 'index']);

        Route::post('/laravel-user-proxy/search-for-user', [ProxyController::class, 'searchForUser']);

        Route::post('/laravel-user-proxy/enter-proxy-mode', [ProxyController::class, 'enterProxyMode']);

        Route::get('/laravel-user-proxy/exit-proxy-mode', [ProxyController::class, 'exitProxyMode']);



    }

);