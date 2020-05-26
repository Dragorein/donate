<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Illuminate\Support\Facades\DB;


class SubmissionController extends Controller
{
    // mengambil semua data
    public function all()
    {
        $sql = array(
            DB::raw('t_submissions.submisi_terkumpul as total_donasi'),
            DB::raw('submisi_terkumpul/submisi_target*100 as kekurangan_donasi'),
            DB::raw('(DATEDIFF(submisi_expired_at, now())) as day_left'),
            DB::raw('t_submissions.submisi_id'),
            DB::raw('t_submissions.submisi_foto'),
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('m_user.user_name'),
        );
        $data = DB::table('t_donations')
                ->join('t_payment', 't_payment.donation_id', '=', 't_donations.donation_id')
                ->join('t_submissions', 't_submissions.submisi_id', '=', 't_donations.submisi_id')
                ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
                ->select($sql)
                ->distinct()
                ->get();
        return $data;
    }

    public function show_campaign_detail($id)
    {
        $sql = array(
            DB::raw('t_submissions.submisi_id'),
            DB::raw('t_submissions.submisi_foto'),
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('t_submissions.submisi_cerita'),
            DB::raw('t_submissions.submisi_penerima'),
            DB::raw('m_user.user_name'),
            DB::raw('t_submissions.submisi_terkumpul as jumlah_donations'),
            DB::raw('t_submissions.submisi_terkumpul as total_donasi'),
            DB::raw('submisi_terkumpul/submisi_target*100 as kekurangan_donasi'),
            DB::raw('(DATEDIFF(submisi_expired_at, now())) as day_left'),
        );
        $data = DB::table('t_donations')
                ->join('t_payment', 't_payment.donation_id', '=', 't_donations.donation_id')
                ->join('t_submissions', 't_submissions.submisi_id', '=', 't_donations.submisi_id')
                ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
                ->select($sql)
                ->where('t_submissions.submisi_id',$id)
                ->get();
        return $data;
    }

    public function show_campaign_detail_donations($id)
    {
        $sql = array(
            DB::raw('t_donations.donation_id'),
            DB::raw('t_donations.donation_mail'),
            DB::raw('t_donations.donation_nominal')
        );
        $data = DB::table('t_donations')
                ->join('t_payment', 't_payment.donation_id', '=', 't_donations.donation_id')
                ->join('t_submissions', 't_submissions.submisi_id', '=', 't_donations.submisi_id')
                ->select($sql)
                ->where('t_submissions.submisi_id',$id)
                ->get();
        return $data;
    }

    public function store(Request $request)
    {
        $t_submissions = new Submission();
        $t_submissions -> user_id = 1;
        $t_submissions -> submisi_judul = $request -> judul;
        $t_submissions -> submisi_cerita = $request -> cerita;
        $t_submissions -> submisi_phone = $request -> noHandphone;
        $t_submissions -> submisi_tipe = $request -> tipe;
        $t_submissions -> submisi_hub_relasi = $request -> medsos;
        $t_submissions -> submisi_target = $request -> total;
        $t_submissions -> submisi_penerima = $request -> penerima;
        $t_submissions -> submisi_is_active = 1;
        $t_submissions -> submisi_expired_at = $request -> dedline;

        $t_submissions -> save();

        return $t_submissions;
    }
}
