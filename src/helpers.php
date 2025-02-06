<?php

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use UseValidEmail\LaravelSdk\LaravelSdk;

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
            if (class_exists('Illuminate\Support\Facades\Log')) {
                Log::error($e->getMessage());
            }
            throw $e;
        }
    }
}

if (! function_exists('valid_email_rule')) {
    function valid_email_rule()
    {
        Validator::extend(
            'valid_email',
            /**
             * @throws GuzzleException
             */
            function ($attribute, $value, $parameters, $validator) {
                try {
                    $validation = validateEmail($value);

                    return $validation->status === 'valid' && $validation->disposable === false;
                } catch (Exception $e) {
                    if (class_exists('Illuminate\Support\Facades\Log')) {
                        Log::error($e->getMessage());
                    }

                    return false;
                }
            }
        );
    }
}
