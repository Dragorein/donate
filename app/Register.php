<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'm_user';

    protected $fillable = [
        'user_name','user_mail','user_phone','user_password'
    ];

    protected $hidden = [
        'user_password'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['user_password'] = bcrypt($password);
    }
}
