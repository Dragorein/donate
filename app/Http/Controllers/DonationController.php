<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function Donations (Request $request){
        DB::beginTransaction();

        $data = DB::table('t_donations')->insert([
            'donations_name' => $request->name,
            'submisi_id' => $request->submisi,
            'donations_mail' => $request->email,
            'donations_phone' => $request->noHandphone ,
            'donations_nominal' => $request->donasi,
            'donations_is_anonymous' => "1",
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
                    DB::raw('t_donations.donations_id')
                );
                $data_donations = DB::table('t_donations')
                        ->select($sql)
                        ->orderByDesc('donations_id')
                        ->limit(1)
                        ->get();
                if($data_donations)
                {
                    $data_payment = DB::table('t_payment')->insert([
                        'donations_id' => $data_donations[0]->donations_id,
                        'payment_type' => "BCA",
                        'payment_va_number' => "0000000000000",
                        'payment_is_lunas' => "1" ,
                    ]);
                    if($data_payment && $data && $update && $data_donations){
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
            DB::raw('t_donations.donations_id'),
            DB::raw('t_donations.donations_mail'),
            DB::raw('t_submisi.submisi_judul'),
            DB::raw('t_submisi.submisi_penerima'),
            DB::raw('t_donations.donations_nominal'),
            DB::raw('t_payment.payment_type'),
            DB::raw('m_user.user_name'),
        );
        $data = DB::table('t_donations')
                ->join('t_payment', 't_payment.donations_id', '=', 't_donations.donations_id')
                ->join('t_submisi', 't_submisi.submisi_id', '=', 't_donations.submisi_id')
                ->join('m_user', 't_submisi.user_id', '=', 'm_user.user_id')
                ->select($sql)
                ->orderByDesc('donations_id')
                ->limit(1)
                ->get();
        return $data;
    }
}
