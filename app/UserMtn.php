<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMtn extends Model
{
    protected $table ='user_mtn';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'mtn_id',
        'mtn_name',
        'mtn_ip',
        'log_date'


    ];
}
