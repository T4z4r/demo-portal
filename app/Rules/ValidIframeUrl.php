<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidIframeUrl implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $parsed = parse_url($value);
        // Check if URL parsing failed or scheme is not HTTPS
        if (!$parsed || ($parsed['scheme'] ?? '') !== 'https') {
            $fail('The URL must be a valid HTTPS address.', null);
        }
    }
}
