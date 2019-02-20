<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    protected $table ='order_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'order_id',
        'meals_id',
        'booking_id',
        'invoice_id',
        'order_date',
        'order_time',
        'quantity',
        'is_remove',
        'user_id',
        'edit_lock',
        'remove_lock',
        'check_out_status',
        'add_date',
        'update_date'
    ];
}
