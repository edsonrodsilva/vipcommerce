<?php

namespace App\Repositories;

use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Interfaces\ClientInterface;
use App\Models\Client;
use App\Traits\ResponseApiTrait;
use Exception;

class ClientRepository implements ClientInterface
{
    //Use ResponseApiTrait Trai in this repository
    use ResponseApiTrait;

    public function getAllClients()
    {
        try {
            $clients = Client::paginate(10);
            return $this->success('All Clients', $clients);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getClientById($id)
    {
        try {
            $client = Client::find($id);

            //Check the client
            if (!$client) return $this->error("No client with ID $id", 204);

            return $this->success("Client detail", $client);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createClient(ClientCreateRequest $clientCreateRequest)
    {
        try {
            $client = new Client();
            $client->name = $clientCreateRequest->namecomplete;
            $client->save();

            return $this->success("Client created", $client, 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function updateClient(ClientUpdateRequest $clientUpdateRequest, $id)
    {
        try {
            $client = Client::find($id);

            //Check the client
            if (!$client) return $this->error("No client with ID $id", 204);

            $client->namecompleto = $clientUpdateRequest->namecompleto;
            $client->save();

            return $this->success("Client updated", $client, 201);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteClient($id)
    {
        try {
            $client = Client::find($id);

            // Check the user
            if (!$client) return $this->error("No client with ID $id", 204);

            $client->delete();

            return $this->success('Client deleted', $client);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
