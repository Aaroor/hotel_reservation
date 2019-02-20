<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    protected $table ='customer_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'cus_id',
        'cus_first_name',
        'cus_last_name',
        'cus_email',
        'cus_phone',
        'cus_nic_pass',
        'cus_address',
        'is_remove',
        'add_date',
        'update_date'


    ];
}
