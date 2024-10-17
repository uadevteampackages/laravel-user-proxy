<?php

namespace Mbjonesua\LaravelUserProxy;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Mbjonesua\LaravelUserProxy\LaravelUserProxy;

class LaravelUserProxyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the package views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravel-user-proxy');

        // Load routes from your package
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        Blade::component('laravel-user-proxy::components.laravel-user-proxy-bar', 'laravel-user-proxy-bar');

    }

    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('laravel-user-proxy', function () {
            return new LaravelUserProxy;
        });
    }
}
