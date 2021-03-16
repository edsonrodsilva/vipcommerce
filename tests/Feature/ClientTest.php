<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Gender;
use Tests\TestCase;

class ClientTest extends TestCase
{
    public function test_client_created_successfully()
    {

        Gender::factory(1)->create();

        $clientData = [
            "code" => "12345678",
            "name" => "Edson Rodrigues",
            "cpf" => "15791411022",
            "email"  => "edsonrodsilva@gmail.com",
            "gender_id" => 1
        ];

        $this->json('POST', 'api/clients', $clientData, ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Client created successfully",
                "error" => false,
                "statusCode" => 201,
                "results" => [
                    "code" => "12345678",
                    "name" => "Edson Rodrigues",
                    "cpf" => "15791411022",
                    "email"  => "edsonrodsilva@gmail.com",
                    "gender_id" => 1
                ],
            ]);
    }

    public function test_clients_listed_successfully()
    {

        Gender::factory(2)->create();

        Client::factory()->create([
            "code" => "12345678",
            "name" => "Edson Rodrigues",
            "cpf" => "15791411022",
            "email"  => "edsonrodsilva@gmail.com",
            "gender_id" => 1
        ]);

        Client::factory()->create([
            "code" => "87654321",
            "name" => "Susan Mart",
            "cpf" => "46538570089",
            "email"  => "susanmart@yahoo.com.com",
            "gender_id" => 2
        ]);

        $this->json('GET', 'api/clients', ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "All clients Successfully",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "data" => [
                        [
                            "id" => 1,
                            "code" => "12345678",
                            "name" => "Edson Rodrigues",
                            "cpf" => "15791411022",
                            "email"  => "edsonrodsilva@gmail.com",
                            "gender_id" => 1
                        ],
                        [
                            "id" => 2,
                            "code" => "87654321",
                            "name" => "Susan Mart",
                            "cpf" => "46538570089",
                            "email"  => "susanmart@yahoo.com.com",
                            "gender_id" => 2
                        ]
                    ]
                ]
            ]);
    }

    public function test_retrieve_client_successfully()
    {
        Gender::factory(1)->create();

        $client = Client::factory()->create([
            "code" => "12345678",
            "name" => "Edson Rodrigues",
            "cpf" => "15791411022",
            "email"  => "edsonrodsilva@gmail.com",
            "gender_id" => 1
        ]);

        $this->json('GET', 'api/clients/' . $client->id, [], ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Client retrieve successfully",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "code" => "12345678",
                    "name" => "Edson Rodrigues",
                    "cpf" => "15791411022",
                    "email"  => "edsonrodsilva@gmail.com",
                    "gender_id" => 1
                ]
            ]);
    }

    public function test_client_updated_successfully()
    {

        Gender::factory(1)->create();

        $client = Client::factory()->create([
            "code" => "12345678",
            "name" => "Edson Rodrigues",
            "cpf" => "15791411022",
            "email"  => "edsonrodsilva@gmail.com",
            "gender_id" => 1
        ]);

        $payload = [
            "code" => "12345678",
            "name" => "Edson Rodrigues da Silva",
            "cpf" => "15791411022",
            "email"  => "edsonrodsilva@gmail.com",
            "gender_id" => 1
        ];

        $this->json('PATCH', 'api/client/' . $client->id, $payload, ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Client deleted successfully",
                "error" => false,
                "statusCode" => 200,
                "results" => [
                    "code" => "12345678",
                    "name" => "Edson Rodrigues da Silva",
                    "cpf" => "15791411022",
                    "email"  => "edsonrodsilva@gmail.com",
                    "gender_id" => 1
                ]
            ]);
    }

    public function test_delete_client()
    {

        Gender::factory(1)->create();

        $client = Client::factory()->create([
            "code" => "12345678",
            "name" => "Edson Rodrigues",
            "cpf" => "15791411022",
            "email"  => "edsonrodsilva@gmail.com",
            "gender_id" => 1
        ]);

        $this->json('DELETE', 'api/client/' . $client->id, [], ['Accept' => 'application/json'])
            ->assertJson([
                "message" => "Client deleted successfully",
                "error" => false,
                "statusCode" => 200
            ]);
    }
}
