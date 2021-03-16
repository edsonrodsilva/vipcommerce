<?php

namespace Database\Factories;

use App\Models\Client;
use Faker\Provider\pt_BR\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Add provider Person
        //This required for generate cpf faker
        $this->faker->addProvider(new Person($this->faker));

        return [
            'code' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->name,
            'cpf' => $this->faker->cpf(false),
            'email'  => $this->faker->safeEmail(),
            'gender_id' => $this->faker->randomElement([1, 2])
        ];
    }
}
