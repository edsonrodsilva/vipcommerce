<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use App\Models\TypePayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => uniqid('vip-'),
            'date' => $this->faker->dateTime(),
            'comment' => $this->faker->text(255),
            'client_id' => Client::all()->random()->id,
            'type_payment_id' => TypePayment::all()->random()->id,
            'total' => 0
        ];
    }
}
