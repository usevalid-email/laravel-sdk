<?php

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;
use Illuminate\Log\LogManager;

$container = new Container();
Facade::setFacadeApplication($container);

$container->singleton('log', function () {
    return new LogManager(new Container());
});

Log::swap($container->make('log'));