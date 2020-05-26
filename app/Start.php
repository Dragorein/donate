<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    protected $table = 't_submisi';

    protected $fillable = [
        'submisi_judul', 'submisi_cerita', 'submisi_phone','submisi_tipe','submisi_hub_relasi', 'submisi_total', 'submisi_tujuan','submisi_expired_at'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
