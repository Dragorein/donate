<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function Donasi (Request $request){
        $data = DB::table('t_donatur')->insert([
            'donatur_name' => $request->name,
            'submisi_id' => $request->submisi,
            'donatur_mail' => $request->email,
            'donatur_nominal' => $request->donasi
        ]);

        if($data)
        {
            $data_submisi = DB::table('t_submisi')->where('submisi_id',$request->submisi)->get();
            $data_baru = $data_submisi[0]->submisi_terkumpul + $request->donasi;
            $update = DB::table('t_submisi')->where('submisi_id',$request->submisi)->update([
                'submisi_terkumpul' => $data_baru
            ]);
            if($update){
                return true;
            }
        }
    }
}
