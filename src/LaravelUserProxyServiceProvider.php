<?php

namespace Uadevteampackages\LaravelUserProxy;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Uadevteampackages\LaravelUserProxy\LaravelUserProxy;

class LaravelUserProxyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the package views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravel-user-proxy');

        $this->app['router']->aliasMiddleware('laravel-user-proxy', \Uadevteampackages\LaravelUserProxy\Http\Middleware\LaravelUserProxyMiddleware::class);

        // Load routes from your package
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

    }

    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('laravel-user-proxy', function () {
            return new LaravelUserProxy;
        });
    }
}
