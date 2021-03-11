<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\OrderInterface;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->orderInterface->createOrder($request);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->orderInterface->updateOrder($request, $id);
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
