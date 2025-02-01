<?php

namespace UseValidEmail\LaravelSdk;

use UseValidEmail\Sdk\Exceptions\AccessTokenException;
use UseValidEmail\Sdk\Sdk;

class LaravelSdk extends Sdk
{
    /**
     * @throws AccessTokenException
     */
    public function __construct(
        ?string $accessToken = null,
        ?bool $logs = false,
        ?string $baseUri = self::DEFAULT_BASE_URI
    ) {
        parent::__construct($accessToken ?? self::getAccessToken(), $logs, $baseUri);
    }

    /**
     * @throws AccessTokenException
     */
    public static function make(?string $accessToken = null,
        ?string $baseUri = null): LaravelSdk
    {
        return new LaravelSdk($accessToken, $baseUri);
    }
}
