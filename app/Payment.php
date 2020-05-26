<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 't_payment';

    protected $fillable = [
        'payment_id','donation_id','payment_type','payment_va_number','payment_is_lunas','created_at','updated_at'
    ];
}
