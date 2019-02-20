<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealsInfo extends Model
{
    protected $table ='meals_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'meals_id',
        'meals_name',
        'meals_type',
        'available_start_time',
        'available_end_time',
        'style_of_food',
        'price_per_unit',
        'is_remove',
        'add_date',
        'update_date'
    ];
}
