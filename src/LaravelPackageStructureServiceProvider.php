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

        // Use When you need to load assets
        //        $this
        //            ->loadViews()
        //            ->loadMigrations()
        //            ->loadTranslations()
        //            ->loadRoutes()
        //            ->registerPublishes()
        //            ->registerCommands();

        $this
            ->registerPublishes()
            ->registerCommands();
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

    /**
     * @description method that register multiple publishes
     * @return $this
     */
    private function registerPublishes(): self
    {
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
        }

        return $this;
    }

    /**
     * @description method that register commands
     * @return $this
     */
    private function registerCommands(): self
    {
        if ($this->app->runningInConsole()) {
            // Registering package commands.
            $this->commands([]);
        }

        return $this;
    }

    /**
     * @description method that load views
     * @return $this
     */
    private function loadViews(): self
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-package-structure');

        return $this;
    }

    /**
     * @description method that load translation
     * @return $this
     */
    private function loadTranslations(): self
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'laravel-package-structure');

        return $this;
    }

    /**
     * @description method that load migration
     * @return $this
     */
    private function loadMigrations(): self
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        return $this;
    }

    /**
     * @description method that load routes
     * @return $this
     */
    private function loadRoutes(): self
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        return $this;
    }
}
