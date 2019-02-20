<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOutPayment extends Model
{
    protected $table ='check_out_payment';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'payment_id',
        'invoice_id',
        'total_amount',
        'paid_amount',
        'status',
        'is_remove',
        'bill_lock',
        'check_out_status',
        'booking_type',
        'discount_amount',
        'add_date',
        'update_date'
    ];
}
