<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;


class SubmisiController extends Controller
{
    // mengambil semua data
    public function all()
    {
        $data = DB::table('t_donatur')
                ->join('t_payment', 't_payment.donatur_id', '=', 't_donatur.donatur_id')
                ->join('t_submisi', 't_submisi.submisi_id', '=', 't_donatur.submisi_id')
                ->get();
        return $data;
    }

    public function totaldonasi(){
        $data[] = DB::table('t_donatur')
            ->join('t_payment', 't_payment.donatur_id', '=', 't_donatur.donatur_id')
            ->join('t_submisi', 't_submisi.submisi_id', '=', 't_donatur.submisi_id')
            ->join('m_user', 'm_user.submisi_id', '=', 't_submisi.submisi_id')
            ->select(DB::raw('SUM(donatur_nominal) as total_sales'))
            ->get();
        return $data;
    }
}
