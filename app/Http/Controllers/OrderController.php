<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Interfaces\OrderInterface;

class OrderController extends Controller
{
    protected $orderInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->orderInterface->getAllOrders();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $orderCreateRequest)
    {
        return $this->orderInterface->createOrder($orderCreateRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->orderInterface->getOrderById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $orderUpdateRequest, $id)
    {
        return $this->orderInterface->updateOrder($orderUpdateRequest, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->orderInterface->deleteOrder($id);
    }
}
