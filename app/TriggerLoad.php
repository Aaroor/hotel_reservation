<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TriggerLoad extends Model
{
    protected $table ='trigger_load';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'trigger_id',
        'change_type',
        'user_id',
        'change_id',
        'change_name',
        'change_date_one',
        'change_date_two',
        'change_time',
        'change_status',
        'add_date'
    ];
}
