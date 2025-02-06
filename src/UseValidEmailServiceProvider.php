<?php

namespace UseValidEmail\LaravelSdk;

use Illuminate\Support\ServiceProvider;

class UseValidEmailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../config/usevalid-email.php" => config_path("usevalid-email.php"),
        ], "config");
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/usevalid-email.php", "usevalid-email");
    }
}
