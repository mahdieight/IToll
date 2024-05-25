<?php

namespace Database\Factories;

use App\Enums\Order\OrderStatusEnum;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'collection_id' => Collection::inRandomOrder()->first() ?: Collection::factory()->create(),
            'status' => fake()->randomElement(OrderStatusEnum::values()),
            'source_address' => fake()->address(),
            'source_lat' => fake()->latitude(),
            'source_long' => fake()->longitude(),
            'destination_address' => fake()->address(),
            'destination_lat' => fake()->latitude(),
            'destination_long' => fake()->longitude(),
            'sender_name' => fake()->name(),
            'sender_mobile' => fake()->numerify('98#########'),
            'receiver_name' => fake()->name(),
            'receiver_mobile' => fake()->numerify('98#########'),
        ];
    }
}
