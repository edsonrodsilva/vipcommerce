<?php

namespace App\Services\Order;

class CreateOrderService
{
    public function execute()
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
}
