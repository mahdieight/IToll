<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckingLatitude implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[-]?((([0-8]?[0-9])\.(\d+))|90\.0+)$/', $value)) {
            $fail('general.validations.the_latitude_entered_is_invalid')->translate();
        }
    }
}
