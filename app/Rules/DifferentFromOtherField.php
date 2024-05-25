<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DifferentFromOtherField implements Rule
{

    public function __construct(protected string $otherFieldName)
    {
    }

    public function passes($attribute, $value)
    {
        return request()->input($attribute) !== request()->input($this->otherFieldName);
    }

    public function message()
    {
        return __('general.validations.values_​_two_columns_cannot_be_the_same', [
            'attribute' => ":attribute",
            'other_attribute' => $this->otherFieldName,
        ]);
    }
}
