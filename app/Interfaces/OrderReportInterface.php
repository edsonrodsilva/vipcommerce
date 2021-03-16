<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderReportInterface
{
    /**
     * Send | order | email
     * @param   \Illuminate\Http\Request  $request
     * @method  POST  api/{id}/report For generate pdf order
     * @access  public
     */
    public function orderReportPdf(Request $request);
}
