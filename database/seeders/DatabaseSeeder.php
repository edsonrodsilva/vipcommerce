<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Gender::factory(3)->create();
        \App\Models\TypePayment::factory(3)->create();
        \App\Models\Client::factory(50)->create();
        \App\Models\Order::factory(50)->create();
        \App\Models\Product::factory(50)->create();
        \App\Models\OrderDetail::factory(100)->create();
    }
}
