<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Gender;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_order_created_successfully()
    {

        Gender::factory(1)->create();

        $orderData = [
            "code" => "12345678",
            "date" => date('2021-03-15 20:10:10'),
            "comment" => "Order 1",
            "client_id"  => 1,
            "type_payment" => 1,
            "total" => 0
        ];

        $this->json('POST', 'api/orders', $orderData, ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Order created",
                "error" => false,
                "statusCode" => 201,
                "results" => [
                    "code" => "12345678",
                    "date" => date('2021-03-15 20:10:10'),
                    "comment" => "Order 1",
                    "client_id"  => 1,
                    "type_payment" => 1,
                    "total" => 0
                ],
            ]);
    }

    public function test_orders_listed_successfully()
    {

        Gender::factory(2)->create();

        Order::factory()->create([
            "code" => "12345678",
            "date" => date('2021-03-14 20:10:10'),
            "comment" => "Order 1",
            "client_id"  => 1,
            "type_payment" => 1,
            "total" => 0
        ]);

        Order::factory()->create([
            "code" => "87654321",
            "date" => date('2021-03-15 20:10:10'),
            "comment" => "Order 1",
            "client_id"  => 2,
            "type_payment" => 2,
            "total" => 0
        ]);

        $this->json('GET', 'api/orders', ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "All orders",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "data" => [
                        [
                            "id" => 1,
                            "code" => "12345678",
                            "date" => date('2021-03-14 20:10:10'),
                            "comment" => "Order 1",
                            "client_id"  => 1,
                            "type_payment" => 1,
                            "total" => 0
                        ],
                        [
                            "id" => 2,
                            "code" => "87654321",
                            "date" => date('2021-03-15 20:10:10'),
                            "comment" => "Order 1",
                            "client_id"  => 2,
                            "type_payment" => 2,
                            "total" => 0
                        ]
                    ]
                ]
            ]);
    }

    public function test_retrieve_order_successfully()
    {
        Gender::factory(1)->create();

        $order = Order::factory()->create([
            "code" => "12345678",
            "date" => date('2021-03-14 20:10:10'),
            "comment" => "Order 1",
            "client_id"  => 1,
            "type_payment" => 1,
            "total" => 0
        ]);

        $this->json('GET', 'api/orders/' . $order->id, [], ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Order retrieve",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "code" => "12345678",
                    "date" => date('2021-03-14 20:10:10'),
                    "comment" => "Order 1",
                    "client_id"  => 1,
                    "type_payment" => 1,
                    "total" => 0
                ]
            ]);
    }

    public function test_order_updated_successfully()
    {

        Gender::factory(1)->create();

        $order = Order::factory()->create([
            "code" => "12345678",
            "date" => date('2021-03-14 20:10:10'),
            "comment" => "Order 1",
            "client_id"  => 1,
            "type_payment" => 1,
            "total" => 0
        ]);

        $payload = [
            "code" => "12345678",
            "date" => date('2021-03-14 20:10:10'),
            "comment" => "Order 1",
            "client_id"  => 1,
            "type_payment" => 1,
            "total" => 200.50
        ];

        $this->json('PUT', 'api/orders/' . $order->id, $payload, ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Order updated",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "code" => "12345678",
                    "date" => date('2021-03-14 20:10:10'),
                    "comment" => "Order 1",
                    "client_id"  => 1,
                    "type_payment" => 1,
                    "total" => 200.50
                ]
            ]);
    }

    public function test_delete_order()
    {

        Gender::factory(1)->create();

        $order = Order::factory()->create([
            "code" => "12345678",
            "date" => date('2021-03-14 20:10:10'),
            "comment" => "Order 1",
            "client_id"  => 1,
            "type_payment" => 1,
            "total" => 0
        ]);

        $this->json('DELETE', 'api/orders/' . $order->id, [], ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Order deleted",
                "error" => false,
                "statusCode" => 200
            ]);
    }
}
