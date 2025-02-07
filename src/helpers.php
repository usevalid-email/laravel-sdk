<?php

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Validator;
use UseValidEmail\LaravelSdk\LaravelSdk;
use UseValidEmail\LaravelSdk\Rules\ValidEmailRule;

if (! function_exists('validateEmail')) {
    /**
     * @throws GuzzleException
     */
    function validateEmail(string $email)
    {
        try {
            $sdk = new LaravelSdk;

            return $sdk->emailValidator->validate($email);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

Validator::extend(
    'valid_email',
    /**
     * @throws GuzzleException
     */
    function ($attribute, $value, $parameters, $validator) {
        try {
            $validation = validateEmail($value);

            return $validation->status === 'valid';
        } catch (Exception $e) {
            return false;
        }
    }
);

if (! function_exists('valid_email_rule')) {
    function valid_email_rule()
    {
        return function () {
            return new ValidEmailRule(config('usevalidemail.access_token'));
        };
    }
}
