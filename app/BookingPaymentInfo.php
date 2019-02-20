<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPaymentInfo extends Model
{
    protected $table ='booking_payment_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'payment_id',
        'invoice_id',
        'booking_id',
        'no_of_days',
        'total_amount',
        'is_remove',
        'add_date',
        'update_date'


    ];
}
