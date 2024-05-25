<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckingLongitude implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180\.0+)$/', $value)) {
            $fail('general.validations.the_longitude_entered_is_invalid')->translate();
        }
    }
}
