<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\ResponseApiTrait;
use Exception;

class CreateOrderService
{
    use ResponseApiTrait;

    public function execute($request)
    {
        try {
            $order = new Order();
            $order->code = $request->code;
            $order->date = date('Y-m-d H:i:s');
            $order->comment = $request->comment;
            $order->client_id = $request->client_id;
            $order->type_payment_id = $request->type_payment_id;

            if ($order->save()) {
                if ($request->products) {
                    foreach ($request->products as $product) {
                        $orderDetail = new OrderDetail();
                        $orderDetail->order_id = $order->id;
                        $orderDetail->product_id = $product->id;
                        $orderDetail->amount = $product->amount;
                        $orderDetail->price = $product->price;
                        $orderDetail->save();
                    }
                }
            }
            return $this->success("Order created", $order, 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}