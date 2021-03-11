<?php

namespace Database\Factories;

use App\Models\TypePayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypePaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypePayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->unique()->randomElement(['Dinheiro', 'Cartão', 'Depósito'])
        ];
    }
}
