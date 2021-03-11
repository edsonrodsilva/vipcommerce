<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $product = Product::inRandomOrder()->first();

        return [
            'order_id' => Product::inRandomOrder()->first()->id,
            'product_id' => $product->id,
            'amount' => $this->faker->numberBetween(1, 1000),
            'price' => $product->price
        ];
    }
}
