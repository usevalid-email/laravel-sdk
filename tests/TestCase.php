<?php

namespace UseValidEmail\LaravelSdk\Tests;

use Illuminate\Http\Client\Response as LaravelResponse;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }
}
