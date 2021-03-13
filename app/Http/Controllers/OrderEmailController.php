<?php

namespace App\Http\Controllers;

use App\Interfaces\OrderEmailInterface;
use Illuminate\Http\Request;

class OrderEmailController extends Controller
{
    protected $orderEmailInterface;

    public function __construct(OrderEmailInterface $orderEmailInterface)
    {
        $this->orderEmailInterface = $orderEmailInterface;
    }

    /**
     * Send order to customer email
     *
     * @param  \Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function sendmail(Request $request)
    {
        return $this->orderEmailInterface->orderEmailSend($request);
    }
}
