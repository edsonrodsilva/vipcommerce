<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function typePayment()
    {
        return $this->belongsTo(TypePayment::class, 'type_payment_id', 'id');
    }

    public function itens()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
