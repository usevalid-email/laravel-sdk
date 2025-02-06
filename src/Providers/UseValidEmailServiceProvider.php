<?php

namespace UseValidEmail\LaravelSdk\Providers;

use Illuminate\Support\ServiceProvider;

class UseValidEmailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../../config/usevalid-email.php" => config_path("usevalid-email.php"),
        ], "config");

        // Register the validation rule
        valid_email_rule();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/usevalid-email.php", "usevalid-email");
    }
}
