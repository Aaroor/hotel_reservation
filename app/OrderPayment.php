<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    protected $table ='order_payment';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'order_pay_id',
        'order_id',
        'booking_id',
        'invoice_id',
        'quantity',
        'amount',
        'is_remove',
        'add_date',
        'update_date'
    ];
}
