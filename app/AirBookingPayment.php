<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirBookingPayment extends Model
{
    protected $table ='a_booking_payment';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'a_payment_id',
        'a_booking_id',
        'booking_id',
        'invoice_id',
        'amount',
        'is_remove',
        'add_date',
        'update_date'
    ];
}
