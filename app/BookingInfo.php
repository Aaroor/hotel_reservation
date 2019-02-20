<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingInfo extends Model
{
    protected $table ='booking_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'booking_id',
        'invoice_id',
        'customer_id',
        'room_id',
        'from_date',
        'to_date',
        'from_time',
        'to_time',
        'status',
        'is_remove',
        'user_id',
        'no_of_children',
        'no_of_adults',
        'cancel_lock',
        'edit_lock',
        'check_out_status',
        'booking_type',
        'broker_name',
        'add_date',
        'update_date'


    ];
}
