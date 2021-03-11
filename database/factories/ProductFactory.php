<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->name(),
            'color' => $this->faker->randomElement(['Red', 'Blue', 'Pink', 'Orange', 'White', 'Black']),
            'size' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100)
        ];
    }
}
