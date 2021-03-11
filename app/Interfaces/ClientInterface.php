<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

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
     * @param   \Illuminate\Http\Request  $request
     * @method  POST  api/clients For Create
     * @access  public
     */
    public function createClient(Request $request);

    /**
     * Update client
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   integer   $id
     * @method  PUT  api/clients/{id} For Update
     * @access  public
     */
    public function updateClient(Request $request, $id);

    /**
     * Delete client
     * @param   integer     $id
     * @method  DELETE  api/clients/{id}
     * @access  public
     */
    public function deleteClient($id);
}
