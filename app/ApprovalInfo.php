<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovalInfo extends Model
{
    protected $table ='approval_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'app_id',
        'invoice_id',
        'data_id',
        'data_type',
        'type_desc',
        'app_reason',
        'user_id',
        'add_date',
        'is_remove'


    ];
}
