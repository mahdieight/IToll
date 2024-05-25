<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckingWhetherMobileNumberIsIranian implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^98?9[0-9]{9}$/', $value)) {
            $fail('auth.validations.the_entered_mobile_phone_is_invalid')->translate();
        }
    }
}
