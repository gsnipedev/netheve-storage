<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemsFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Item::class;

    public function definition(): array {
        return [
            'name' => fake()->lastName(),
            'tag_id' => 1,
            'user_id' => 1,
            'stock' => fake()->numberBetween(10, 100)
        ];
    }
}
