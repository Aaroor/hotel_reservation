<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table ='payment_history';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'history_id',
        'invoice_id',
        'payment_type',
        'out_amount',
        'paid_amount',
        'balance_amount',
        'card_type',
        'card_number',
        'is_remove',
        'add_date',
        'update_date',
        'pay_lock'
    ];
}
