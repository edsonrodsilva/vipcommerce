<?php

namespace App\Interfaces;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;

interface OrderInterface
{
    /**
     * Get all clients
     * @method  GET api/clients
     * @access  public
     */
    public function getAllOrders();

    /**
     * Get Order By ID
     * @param   integer     $id
     * @method  GET api/clients/{id}
     * @access  public
     */
    public function getOrderById($id);

    /**
     * Create | client
     * @param   \App\Http\Requests\OrderCreateRequest  $request
     * @method  POST  api/clients For Create
     * @access  public
     */
    public function createOrder(OrderCreateRequest $request);

    /**
     * Update client
     *
     * @param   \App\Http\Requests\OrderUpdateRequest  $request
     * @param   integer   $id
     * @method  PUT  api/clients/{id} For Update
     * @access  public
     */
    public function updateOrder(OrderUpdateRequest $request, $id);

    /**
     * Delete client
     * @param   integer     $id
     * @method  DELETE  api/clients/{id}
     * @access  public
     */
    public function deleteOrder($id);
}
