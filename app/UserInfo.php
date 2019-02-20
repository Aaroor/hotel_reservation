<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table ='user_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'login_id',
        'telephone_no',
        'user_password',
        'user_role',
        'user_email',
        'theme_id',
        'is_remove',
        'add_date'


    ];
}
