<?php

namespace TelegramCore\LaravelTelegramCore;

use Illuminate\Support\ServiceProvider;

class LaravelTelegramCoreServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'telegramcore');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'telegramcore');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laraveltelegramcore.php', 'laraveltelegramcore');

        // Register the service the package provides.
        $this->app->singleton('laraveltelegramcore', function ($app) {
            return new LaravelTelegramCore;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laraveltelegramcore'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laraveltelegramcore.php' => config_path('laraveltelegramcore.php'),
        ], 'laraveltelegramcore.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/telegramcore'),
        ], 'laraveltelegramcore.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/telegramcore'),
        ], 'laraveltelegramcore.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/telegramcore'),
        ], 'laraveltelegramcore.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
