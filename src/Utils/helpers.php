<?php

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

Validator::extend('valid_email',
    /**
     * @throws GuzzleException
     */
    function ($attribute, $value, $parameters, $validator) {
        try {
            $validation = validateEmail($value);

            return $validation->status === 'valid' && $validation->disposable === false;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    });