<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirPortBookingInfo extends Model
{
    protected $table ='air_port_booking_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'a_booking_id',
        'booking_id',
        'invoice_id',
        'a_booking_type',
        'no_of_passengers',
        'a_booking_from',
        'a_booking_to',
        'a_booking_date',
        'a_booking_time',
        'a_amount',
        'is_remove',
        'user_id',
        'edit_lock',
        'remove_lock',
        'check_out_status',
        'add_date',
        'update_date'
    ];
}
