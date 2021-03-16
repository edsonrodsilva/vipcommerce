<?php

namespace App\Repositories;

use App\Interfaces\OrderReportInterface;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Traits\ResponseApiTrait;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;

class OrderReportRepository implements OrderReportInterface
{
    //Use ResponseApiTrait Trai in this repository
    use ResponseApiTrait;

    public function orderReportPdf(Request $request)
    {
        try {
            $order = Order::findOrFail($request->id);

            // Check the order exists
            if (!$order) return $this->error("No order with ID $request->id", 204);

            $pdf = PDF::loadView('orders.report', $order);
            return $pdf->download("order_report_" . date('Y-m-d-H-i-d') . ".pdf");
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
