<?php

namespace App\Interfaces;

use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;

interface ClientInterface
{
    /**
     * Get all clients
     * @method  GET api/clients
     * @access  public
     */
    public function getAllClients();

    /**
     * Get Client By ID
     * @param   integer     $id
     * @method  GET api/clients/{id}
     * @access  public
     */
    public function getClientById($id);

    /**
     * Create | client
     * @param   \App\Http\Requests\ClientCreateRequest  $request
     * @method  POST  api/clients For Create
     * @access  public
     */
    public function createClient(ClientCreateRequest $request);

    /**
     * Update client
     *
     * @param   \App\Http\Requests\ClientUpdateRequest  $request
     * @param   integer   $id
     * @method  PUT  api/clients/{id} For Update
     * @access  public
     */
    public function updateClient(ClientUpdateRequest $request, $id);

    /**
     * Delete client
     * @param   integer     $id
     * @method  DELETE  api/clients/{id}
     * @access  public
     */
    public function deleteClient($id);
}
