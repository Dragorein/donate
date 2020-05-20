<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;


class SubmisiController extends Controller
{
    // mengambil semua data
    public function all()
    {
        $sql = array(
            DB::raw('t_submisi.submisi_id'),
            DB::raw('t_submisi.submisi_foto'),
            DB::raw('t_submisi.submisi_judul'),
            DB::raw('m_user.user_name'),
            DB::raw('(select SUM(t_donatur.donatur_nominal) from t_donatur) as total_donasi'),
            DB::raw('(select ((submisi_total - SUM(t_donatur.donatur_nominal))/1000) from t_donatur INNER JOIN t_submisi ON t_submisi.submisi_id = t_donatur.submisi_id GROUP BY t_donatur.submisi_id) as kekurangan_donasi'),
            DB::raw('(SELECT DATEDIFF(submisi_expired_at, now()) from t_submisi) as day_left')
        );
        $data = DB::table('t_donatur')
                ->join('t_payment', 't_payment.donatur_id', '=', 't_donatur.donatur_id')
                ->join('t_submisi', 't_submisi.submisi_id', '=', 't_donatur.submisi_id')
                ->join('m_user', 't_submisi.user_id', '=', 'm_user.user_id')
                ->select($sql)
                ->get();
        return $data;
    }

    // public function totaldonasi(){
    //     $data[] = DB::table('t_donatur')
    //         ->join('t_payment', 't_payment.donatur_id', '=', 't_donatur.donatur_id')
    //         ->join('t_submisi', 't_submisi.submisi_id', '=', 't_donatur.submisi_id')
    //         ->join('m_user', 'm_user.submisi_id', '=', 't_submisi.submisi_id')
    //         ->select(DB::raw('SUM(donatur_nominal) as total_sales'))
    //         ->get();
    //     return $data;
    // }
}
