<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Gender;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_created_successfully()
    {

        $productData = [
            "code" => "12345678",
            "name" => "Macbook Air",
            "color" => "Grey",
            "size"  => 50,
            "price" => 8500
        ];

        $this->json('POST', 'api/products', $productData, ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Product created",
                "error" => false,
                "statusCode" => 201,
                "results" => [
                    "code" => "12345678",
                    "name" => "Macbook Air",
                    "color" => "Grey",
                    "size"  => 50,
                    "price" => 8500
                ],
            ]);
    }

    public function test_products_listed_successfully()
    {

        Product::factory()->create([
            "code" => "12345678",
            "name" => "Macbook Air",
            "color" => "Grey",
            "size"  => 50,
            "price" => 8500
        ]);

        Product::factory()->create([
            "code" => "12345678",
            "name" => "Macbook Air",
            "color" => "Grey",
            "size"  => 50,
            "price" => 8500
        ]);

        $this->json('GET', 'api/products', ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "All products",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "data" => [
                        [
                            "id" => 1,
                            "code" => "12345678",
                            "name" => "Macbook Air",
                            "color" => "Grey",
                            "size"  => 50,
                            "price" => 8500
                        ],
                        [
                            "id" => 2,
                            "code" => "12345678",
                            "name" => "Macbook Air",
                            "color" => "Grey",
                            "size"  => 50,
                            "price" => 8500
                        ]
                    ]
                ]
            ]);
    }

    public function test_retrieve_product_successfully()
    {
        Gender::factory(1)->create();

        $product = Product::factory()->create([
            "code" => "12345678",
            "name" => "Macbook Air",
            "color" => "Grey",
            "size"  => 50,
            "price" => 8500
        ]);

        $this->json('GET', 'api/products/' . $product->id, [], ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Product retrieve",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "code" => "12345678",
                    "name" => "Macbook Air",
                    "color" => "Grey",
                    "size"  => 50,
                    "price" => 8500
                ]
            ]);
    }

    public function test_product_updated_successfully()
    {

        Gender::factory(1)->create();

        $product = Product::factory()->create([
            "code" => "12345678",
            "name" => "Macbook Air",
            "color" => "Grey",
            "size"  => 50,
            "price" => 8500
        ]);

        $payload = [
            "code" => "12345678",
            "name" => "Macbook Air 8GB",
            "color" => "Grey",
            "size"  => 50,
            "price" => 9500
        ];

        $this->json('PUT', 'api/products/' . $product->id, $payload, ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Product updated",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "code" => "12345678",
                    "name" => "Macbook Air 8GB",
                    "color" => "Grey",
                    "size"  => 50,
                    "price" => 9500
                ]
            ]);
    }

    public function test_delete_product()
    {

        Gender::factory(1)->create();

        $product = Product::factory()->create([
            "code" => "12345678",
            "name" => "Macbook Air",
            "color" => "Grey",
            "size"  => 50,
            "price" => 8500
        ]);

        $this->json('DELETE', 'api/products/' . $product->id, [], ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Product deleted",
                "error" => false,
                "statusCode" => 200
            ]);
    }
}
