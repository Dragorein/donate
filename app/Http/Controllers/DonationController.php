<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function Donations (Request $request){
        $request->validate([
            'submisi' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'amount' => 'required|numeric|min:10000',
        ]);

        DB::beginTransaction();

        $data = DB::table('t_donations')->insert([
            'submisi_id' => $request->submisi,
            'donation_name' => $request->name,
            'donation_mail' => $request->email,
            'donation_phone' => $request->phoneNumber,
            'donation_nominal' => $request->amount,
            'donation_is_anonymous' => "1",
        ]);

        if($data)
        {
            $data_submisi = DB::table('t_submissions')->where('submisi_id',$request->submisi)->get();
            $data_baru = $data_submisi[0]->submisi_terkumpul + $request->amount;
            $update = DB::table('t_submissions')->where('submisi_id',$request->submisi)->update([
                'submisi_terkumpul' => $data_baru
            ]);
            if($update){
                $sql = array(
                    DB::raw('t_donations.donation_id')
                );
                $data_donations = DB::table('t_donations')
                        ->select($sql)
                        ->orderByDesc('donation_id')
                        ->limit(1)
                        ->get();
                if($data_donations)
                {
                    $data_payment = DB::table('t_payment')->insert([
                        'donation_id' => $data_donations[0]->donation_id,
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
            DB::raw('t_donations.donation_id'),
            DB::raw('t_donations.donation_mail'),
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('t_submissions.submisi_penerima'),
            DB::raw('t_donations.donation_nominal'),
            DB::raw('t_payment.payment_type'),
            DB::raw('m_user.user_name'),
        );
        $data = DB::table('t_donations')
                ->join('t_payment', 't_payment.donation_id', '=', 't_donations.donation_id')
                ->join('t_submissions', 't_submissions.submisi_id', '=', 't_donations.submisi_id')
                ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
                ->select($sql)
                ->orderByDesc('donation_id')
                ->limit(1)
                ->get();
        return $data;
    }
}
