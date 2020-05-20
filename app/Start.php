<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    protected $table = 't_submisi';

    protected $fillable = [
        'submisi_judul', 'submisi_cerita', 'submisi_phone', 'submisi_total', 'submisi_tujuan'
    ];
}
