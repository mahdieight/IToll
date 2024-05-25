<?php

namespace App\Http\Requests;

use App\Rules\CheckingLatitude;
use App\Rules\CheckingLongitude;
use App\Rules\CheckingWhetherMobileNumberIsIranian;
use App\Rules\DifferentFromOtherField;
use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'source_address' => [
                "required",
                "string",
                "min:" . (string)config("rules.general.address.min"),
                "max:" . (string)config("rules.general.address.max")
            ],
            'source_lat' => [
                "required",
                "numeric",
                new CheckingLatitude(),
                new DifferentFromOtherField('destination_lat')
            ],
            'source_long' => [
                "required",
                "numeric",
                new CheckingLongitude(),
                new DifferentFromOtherField('destination_long')
            ],
            'destination_address' => [
                "required",
                "string",
                "min:" . (string)config("rules.general.address.min"),
                "max:" . (string)config("rules.general.address.max")
            ],
            'destination_lat' => [
                "required",
                "numeric",
                new CheckingLatitude(),
                new DifferentFromOtherField('source_lat')
            ],
            'destination_long' => [
                "required",
                "numeric",
                new CheckingLongitude(),
                new DifferentFromOtherField('source_long')
            ],
            'sender_name' => [
                "required",
                "string",
                "min:" . (string)config("rules.general.name.min"),
                "max:" . (string)config("rules.general.name.max")
            ],
            'sender_mobile' => [
                "required",
                "numeric",
                new CheckingWhetherMobileNumberIsIranian(),
            ],
            'receiver_name' => [
                "required",
                "string",
                "min:" . (string)config("rules.general.name.min"),
                "max:" . (string)config("rules.general.name.max")
            ],
            'receiver_mobile' => [
                "required",
                "numeric",
                new CheckingWhetherMobileNumberIsIranian(),
            ],

        ];
    }
}
