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

        //get product random
        $product = Product::inRandomOrder()->first();

        //get order random
        $order = Order::inRandomOrder()->first();

        $total = 0;
        foreach ($order->itens as $item) {
            $total += $item->amount * $item->price;
        }

        $order->total = $total;
        $order->save();

        return [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'amount' => $this->faker->numberBetween(1, 3),
            'price' => $product->price
        ];
    }
}
