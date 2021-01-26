<?php

namespace TheTestCoder\LaravelPackageStructure;

use Illuminate\Support\ServiceProvider;

class LaravelPackageStructureServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-package-structure');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-package-structure');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/structure.php' => config_path('laravel-package-structure.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-package-structure'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/laravel-package-structure'),
            ], 'assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/laravel-package-structure'),
            ], 'lang');

            // Registering package commands.
            $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/structure.php', 'laravel-package-structure');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-package-structure', function () {
            return new LaravelPackageStructure;
        });
    }
}
