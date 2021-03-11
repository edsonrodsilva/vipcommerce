<?php

namespace App\Repositories;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Interfaces\OrderInterface;
use App\Models\Order;
use App\Traits\ResponseApiTrait;
use Exception;

class OrderRepository implements OrderInterface
{
    //Use ResponseApiTrait Trai in this repository
    use ResponseApiTrait;

    public function getAllOrders()
    {
        try {
            $orders = Order::paginate(10);
            return $this->success('All Orders', $orders);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getOrderById($id)
    {
        try {
            $order = Order::find($id);

            //Check the order
            if (!$order) return $this->error("No order with ID $id", 204);

            return $this->success("Order detail", $order);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createOrder(OrderCreateRequest $orderCreateRequest)
    {
        try {
            $order = new Order();
            $order->name = $orderCreateRequest->namecomplete;
            $order->save();

            return $this->success("Order created", $order, 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function updateOrder(OrderUpdateRequest $orderUpdateRequest, $id)
    {
        try {
            $order = Order::find($id);

            //Check the order
            if (!$order) return $this->error("No order with ID $id", 204);

            $order->namecompleto = $orderUpdateRequest->namecompleto;
            $order->save();

            return $this->success("Order updated", $order, 201);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteOrder($id)
    {
        try {
            $order = Order::find($id);

            // Check the user
            if (!$order) return $this->error("No order with ID $id", 204);

            $order->delete();

            return $this->success('Order deleted', $order);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
