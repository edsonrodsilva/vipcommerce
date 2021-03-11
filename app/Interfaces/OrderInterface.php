<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderInterface
{
    /**
     * Get all orders
     * @method  GET api/orders
     * @access  public
     */
    public function getAllOrders();

    /**
     * Get Order By ID
     * @param   integer     $id
     * @method  GET api/orders/{id}
     * @access  public
     */
    public function getOrderById($id);

    /**
     * Create | order
     * @param   \Illuminate\Http\Request  $request
     * @method  POST  api/orders For Create
     * @access  public
     */
    public function createOrder(Request $request);

    /**
     * Update order
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   integer   $id
     * @method  PUT  api/orders/{id} For Update
     * @access  public
     */
    public function updateOrder(Request $request, $id);

    /**
     * Delete order
     * @param   integer     $id
     * @method  DELETE  api/orders/{id}
     * @access  public
     */
    public function deleteOrder($id);
}
