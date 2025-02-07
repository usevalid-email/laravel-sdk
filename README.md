# usevalid.email Laravel SDK

[![PHP Composer](https://github.com/usevalid-email/laravel-sdk/actions/workflows/php.yml/badge.svg)](https://github.com/usevalid-email/laravel-sdk/actions/workflows/php.yml)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/usevalid-email/laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/usevalid-email/laravel-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/usevalid-email/laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/usevalid-email/laravel-sdk)
[![License](https://img.shields.io/packagist/l/usevalid-email/laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/usevalid-email/laravel-sdk)

Validate Your Emails with Confidence

## Installation

You can install the package via composer:

```bash
composer require usevalid-email/laravel-sdk
```

## Usage

### Initialization

```php
use UseValidEmail\LaravelSdk\LaravelSdk;

$token = 'your-access-token';
$sdk = new LaravelSdk($token);
```

### Validate Email

```php
use Illuminate\Support\Facades\Validator;

$validator = Validator::make(['email' => 'test@example.com'], [
    'email' => 'valid_email',
]);

if ($validator->fails()) {
    echo "Invalid email.";
} else {
    echo "Valid email.";
}
```
### Controller Example
> Here is an example of how to use the valid_email validator in a Laravel controller:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailValidationController extends Controller
{
    public function validateEmail(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|valid_email',
        ]);

        return back()->with('success', 'Valid email.');
    }
}
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [All Contributors](https://github.com/usevalid-email/laravel-sdk/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
