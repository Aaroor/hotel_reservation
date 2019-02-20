<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table ='questions_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'question_id',
        'name',
        'email',
        'phone_no',
        'address',
        'message',
        'is_remove',
        'add_date'


    ];
}
