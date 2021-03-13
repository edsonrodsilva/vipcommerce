<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderEmailInterface
{
    /**
     * Send | order | email
     * @param   \Illuminate\Http\Request  $request
     * @method  POST  api/{id}/sendmail For Send order email
     * @access  public
     */
    public function orderEmailSend(Request $request);
}
