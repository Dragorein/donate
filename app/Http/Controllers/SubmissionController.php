<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;


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
        $data = DB::table('t_submissions')
            ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
            ->select($sql)
            ->distinct()
            ->paginate(6);
            
        return $data;
    }

    public function show_campaign_detail($id)
    {        
        $sql_submission = array(
            DB::raw('t_submissions.submisi_id'),
            DB::raw('t_submissions.submisi_foto'),
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('t_submissions.submisi_cerita'),
            DB::raw('t_submissions.submisi_penerima'),
            DB::raw('m_user.user_name'),
            DB::raw('t_submissions.submisi_terkumpul'),
            DB::raw('t_submissions.submisi_target'),
            DB::raw('submisi_terkumpul/submisi_target*100 as kekurangan_donasi'),
            DB::raw('(DATEDIFF(submisi_expired_at, now())) as sisa_hari'),
        );
        $submission = DB::table('t_submissions')
            ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
            ->select($sql_submission)
            ->where('t_submissions.submisi_id',$id)
            ->get()->first();

        $sql_donations = array(
            DB::raw('donation_id'),
            DB::raw('donation_name'),
            DB::raw('donation_nominal'),
            DB::raw('donation_is_anonymous'),
        );
        $donations = DB::table('t_donations')
            ->select($sql_donations)
            ->where('t_donations.submisi_id',$id)
            ->orderByDesc('donation_id')
            ->get();

        return response(['submission' => $submission, 'donations' => $donations]);
    }

    public function store(Request $request)
    {
        // var_dump($request->file('image'));
        $t_submissions = new Submission();
        $t_submissions -> user_id = 1;
        $t_submissions -> submisi_judul = $request -> judul;
        $t_submissions -> submisi_cerita = $request -> cerita;
        $t_submissions -> submisi_phone = $request -> noHandphone;
        $t_submissions -> submisi_tipe = $request -> tipe;
        $t_submissions -> submisi_hub_relasi = $request -> medsos;
        $t_submissions -> submisi_target = $request -> total;
        $t_submissions -> submisi_penerima = $request -> penerima;
        $t_submissions -> submisi_foto = $request->file('image')->getClientOriginalName();
        $t_submissions -> submisi_is_active = 1;
        $t_submissions -> submisi_expired_at = $request -> dedline;

        $t_submissions -> save();

        $request->file('image')->storeAs('donasi', $request->file('image')->getClientOriginalName());

        return $t_submissions;
    }
}
