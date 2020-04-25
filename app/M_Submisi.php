<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Submisi extends Model
{
    //Model untuk tabel t_submisi
    protected $table = 't_submisi';
    protected $fillable = ['submisi_id','submisi_judul','submisi_cerita','submisi_phone','submisi_phone','submisi_tipe','submisi_hub_relasi','submisi_link','submisi_tujuan','submisi_foto'];
}
