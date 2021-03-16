<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\ResponseApiTrait;
use Exception;

class GenerateOrderPdfService
{
    use ResponseApiTrait;

    /**
     * Service store order
     */
    public function execute($request)
    {
        try {

            $order = Order::findOrFail($request->id);

            dd($order);

            return $this->success("Order created", $order, 201);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
