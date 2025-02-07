<?php

namespace UseValidEmail\LaravelSdk\Providers;

use Illuminate\Support\ServiceProvider;

class UseValidEmailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load helpers after app is initialized
        require_once __DIR__.'/../helpers.php';

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/usevalidemail.php' => config_path('usevalidemail.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/usevalidemail.php', 'usevalidemail');
    }
}
