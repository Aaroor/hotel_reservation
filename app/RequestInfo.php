<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestInfo extends Model
{
    protected $table ='request_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'request_id',
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
        'num_of_adult',
        'num_of_children',
        'first_name',
        'last_name',
        'address',
        'zip_code',
        'city',
        'phone',
        'email',
        'room_type',
        'is_remove',
        'add_date'


    ];
}
