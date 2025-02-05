<?php

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;
use Illuminate\Log\LogManager;

$container = new Container();
Facade::setFacadeApplication($container);

$container->singleton('log', function () use ($container) {
    return new LogManager($container);
});

try {
    Log::swap($container->make('log'));
} catch (\Illuminate\Contracts\Container\BindingResolutionException $e) {
    // do nothing
}
