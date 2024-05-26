<?php

namespace Database\Factories;

use App\Enums\Collection\CollectionStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'phone' => fake()->numerify('021####'),
            'address' => fake()->address(),
            'status' => fake()->randomElement(CollectionStatusEnum::values()),
            'webhook_url' => fake()->url(),
            'token' => fake()->asciify('********************'),
        ];
    }
}
