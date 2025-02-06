<?php

use GuzzleHttp\Exception\GuzzleException;
use UseValidEmail\LaravelSdk\LaravelSdk;
use UseValidEmail\Sdk\Dtos\ValidateEmailDto;
use UseValidEmail\Sdk\EmailValidator;
use UseValidEmail\Sdk\Exceptions\AccessTokenException;
use UseValidEmail\Sdk\Exceptions\ForbiddenException;
use UseValidEmail\Sdk\Exceptions\UnauthorizedException;
use UseValidEmail\Sdk\Responses\Validation\ValidationResponse;

beforeEach(function () {
    $this->sdk = Mockery::mock(LaravelSdk::class)->makePartial();
    $this->emailValidator = Mockery::mock(EmailValidator::class);

    $this->sdk->emailValidator = $this->emailValidator;

    $this->emailDto = new ValidateEmailDto('test@example.com');
});

it(
    'validates an email successfully',
    /**
     * @throws UnauthorizedException
     * @throws ForbiddenException
     * @throws GuzzleException
     */
    function () {
        $this->emailValidator->shouldReceive('validate')
            ->andReturn(new ValidationResponse(
                'Email is valid',
                'example.com',
                'test',
                $this->emailDto->email,
                false,
                'valid'
            ));
        $response = $this->sdk->emailValidator->validate($this->emailDto->email);

        expect($response)->toBeInstanceOf(ValidationResponse::class)
            ->and($response->email)->toBe($this->emailDto->email)
            ->and($response->status)->toBe('valid');
    }
);

it('throws an exception when access token is missing', function () {
    new LaravelSdk(null);
})->throws(AccessTokenException::class);
