<?php

namespace UseValidEmail\LaravelSdk\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use UseValidEmail\LaravelSdk\Providers\UseValidEmailServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            UseValidEmailServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Perform any environment setup
    }

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }
}
