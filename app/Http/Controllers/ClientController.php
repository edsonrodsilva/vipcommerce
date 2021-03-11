<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Interfaces\ClientInterface;

class ClientController extends Controller
{
    protected $clientInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(ClientInterface $clientInterface)
    {
        $this->clientInterface = $clientInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->clientInterface->getAllClients();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCreateRequest $clientCreateRequest)
    {
        return $this->clientInterface->createClient($clientCreateRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->clientInterface->getClientById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateRequest $clientUpdateRequest, $id)
    {
        return $this->clientInterface->updateClient($clientUpdateRequest, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->clientInterface->deleteClient($id);
    }
}
