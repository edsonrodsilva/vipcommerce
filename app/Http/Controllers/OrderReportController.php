<?php

namespace App\Http\Controllers;

use App\Interfaces\OrderReportInterface;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    protected $orderReportInterface;

    public function __construct(OrderReportInterface $orderReportInterface)
    {
        $this->orderReportInterface = $orderReportInterface;
    }

    /**
     * Send order to customer email
     *
     * @param  \Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        return $this->orderReportInterface->orderReportPdf($request);
    }
}
