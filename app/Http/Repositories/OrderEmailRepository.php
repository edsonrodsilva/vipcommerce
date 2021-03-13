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
        // try {
        $order = Order::findOrFail($request->id);

        // Check the user
        if (!$order) return $this->error("No order with ID $request->id", 204);

        if ($order->client->email) {

            Mail::to($order->client->email)->send(new OrderShipped($order));

            return $this->success('Email success send', $order);
        }

        $this->error("Order owner not have email", 204);
        // } catch (Exception $e) {
        //     return $this->error($e->getMessage(), $e->getCode());
        // }
    }
}
