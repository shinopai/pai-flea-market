<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->lexify('item????'),
            'introduction' => $this->faker->text(300),
            'price' => $this->faker->numberBetween(300, 99999),
            'image' => '',
            'category_id' => $this->faker->numberBetween(1, 11),
            'status_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
