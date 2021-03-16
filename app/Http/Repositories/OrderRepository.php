<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\OrderInterface;
use App\Models\Order;
use App\Services\Order\CreateOrderService;
use App\Traits\ResponseApiTrait;
use Exception;

class OrderRepository implements OrderInterface
{
    //Use ResponseApiTrait Trai in this repository
    use ResponseApiTrait;

    public function __construct(CreateOrderService $createOrderService)
    {
        $this->createOrderService = $createOrderService;
    }


    public function getAllOrders()
    {
        try {
            $orders = Order::paginate(10);

            return $this->success('All Orders', $orders, 200);
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

            return $this->success("Order detail", $order, 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createOrder(Request $request)
    {
        return $this->createOrderService->execute($request);
    }

    public function updateOrder(Request $request, $id)
    {
        try {
            $order = Order::find($id);

            //Check the order
            if (!$order) return $this->error("No order with ID $id", 204);

            $order->namecompleto = $request->namecompleto;
            $order->save();

            return $this->success("Order updated", $order, 200);
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

            return $this->success('Order deleted', $order, 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
