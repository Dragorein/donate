<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 't_donatur';

    protected $fillable = [
        'donatur_id','submisi_id','user_id','donatur_name','donatur_mail','donatur_phone','donatur_nominal','donatur_is_anonymous','created_at','updated_at'
    ];
}
