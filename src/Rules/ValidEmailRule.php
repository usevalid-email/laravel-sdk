<?php

namespace UseValidEmail\LaravelSdk\Rules;

use Illuminate\Contracts\Validation\Rule;
use UseValidEmail\Sdk\Sdk as EmailValidator;

class ValidEmailRule implements Rule
{
    public function __construct(protected string $accessToken) {}

    public function passes($attribute, $value)
    {
        return (new EmailValidator($this->accessToken))
            ->emailValidator->validate($value)->status === 'valid';
    }

    public function message()
    {
        return 'The :attribute must be a valid email address.';
    }
}
