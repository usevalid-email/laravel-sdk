<?php

namespace UseValidEmail\LaravelSdk\Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;

trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/bootstrap.php';
        require_once __DIR__.'/../src/helpers.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
