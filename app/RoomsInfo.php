<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomsInfo extends Model
{
    protected $table ='rooms_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'room_id',
        'room_number',
        'key_number',
        'floor_number',
        'room_type',
        'room_description',
        'room_price',
        'is_remove',
        'add_date',
        'update_date'
    ];
}
