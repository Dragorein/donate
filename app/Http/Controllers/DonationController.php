<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function Donations (Request $request){
        DB::beginTransaction();

        $data = DB::table('t_donatur')->insert([
            'donatur_name' => $request->name,
            'submisi_id' => $request->submisi,
            'donatur_mail' => $request->email,
            'donatur_phone' => $request->noHandphone ,
            'donatur_nominal' => $request->donasi,
            'donatur_is_anonymous' => "1",
        ]);

        if($data)
        {
            $data_submisi = DB::table('t_submisi')->where('submisi_id',$request->submisi)->get();
            $data_baru = $data_submisi[0]->submisi_terkumpul + $request->donasi;
            $update = DB::table('t_submisi')->where('submisi_id',$request->submisi)->update([
                'submisi_terkumpul' => $data_baru
            ]);
            if($update){
                $sql = array(
                    DB::raw('t_donatur.donatur_id')
                );
                $data_donatur = DB::table('t_donatur')
                        ->select($sql)
                        ->orderByDesc('donatur_id')
                        ->limit(1)
                        ->get();
                if($data_donatur)
                {
                    $data_payment = DB::table('t_payment')->insert([
                        'donatur_id' => $data_donatur[0]->donatur_id,
                        'payment_type' => "BCA",
                        'payment_va_number' => "0000000000000",
                        'payment_is_lunas' => "1" ,
                    ]);
                    if($data_payment && $data && $update && $data_donatur){
                        DB::commit();
                        return true;
                    }else{
                        DB::rollBack();
                    }
                }
            }
        }
    }

    public function information_donation()
    {
        $sql = array(
            DB::raw('t_donatur.donatur_id'),
            DB::raw('t_donatur.donatur_mail'),
            DB::raw('t_submisi.submisi_judul'),
            DB::raw('t_submisi.submisi_penerima'),
            DB::raw('t_donatur.donatur_nominal'),
            DB::raw('t_payment.payment_type'),
            DB::raw('m_user.user_name'),
        );
        $data = DB::table('t_donatur')
                ->join('t_payment', 't_payment.donatur_id', '=', 't_donatur.donatur_id')
                ->join('t_submisi', 't_submisi.submisi_id', '=', 't_donatur.submisi_id')
                ->join('m_user', 't_submisi.user_id', '=', 'm_user.user_id')
                ->select($sql)
                ->orderByDesc('donatur_id')
                ->limit(1)
                ->get();
        return $data;
    }
}
