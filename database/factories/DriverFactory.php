<?php

namespace Database\Factories;

use App\Enums\Driver\VehicleTypeEnum;
use App\Enums\General\GenderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'national_code' => fake()->numerify('##########'),
            'mobile' => fake()->numerify('98#########'),
            'phone' => fake()->numerify('021####'),
            'gender' => fake()->randomElement(GenderEnum::values()),
            'vehicle_type' => fake()->randomElement(VehicleTypeEnum::values()),
            'token' => fake()->asciify('********************'),
        ];
    }
}
