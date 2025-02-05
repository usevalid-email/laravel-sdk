<?php

namespace UseValidEmail\LaravelSdk\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/bootstrap.php';
        require_once __DIR__ . '/../src/helpers.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
