<?php

namespace App\Repositories;

use App\Interfaces\OrderEmailInterface;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Traits\ResponseApiTrait;
use Exception;
use Illuminate\Support\Facades\Mail;

class OrderEmailRepository implements OrderEmailInterface
{
    //Use ResponseApiTrait Trai in this repository
    use ResponseApiTrait;

    protected $sendEmailOrderService;

    public function orderEmailSend(Request $request)
    {
        try {
            $order = Order::findOrFail($request->id);

            // Check the order exists
            if (!$order) return $this->error("No order with ID $request->id", 204);

            // if the client has email registred, we do send info the order for he
            if ($order->client->email) {

                Mail::to($order->client->email)->send(new OrderShipped($order));

                return $this->success("Email sent success to client " . $order->client->email, [], 200);
            }

            $this->error("Order owner not have email registred", 204);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
