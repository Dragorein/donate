<?php

namespace App\Http\Controllers;

use App\User;
use App\Start;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        foreach($users as $key => $value)
        {
            if($users[$key]['user_is_admin'] == 1)
                $users[$key]['user_is_admin'] = 'admin';
            else
                $users[$key]['user_is_admin'] = 'user';

            if($users[$key]['user_is_active'] == 1)
                $users[$key]['user_is_admin'] = 'aktif';
            else
                $users[$key]['user_is_active'] = 'tidak aktif';

            $users[$key]['user_created_at'] = $users[$key]['created_at']->format('d-m-Y');
            $users[$key]['user_updated_at'] = $users[$key]['updated_at']->format('d-m-Y');
                
        }

        $campaigns = Start::all();
        $total_campaigns = null;

        foreach($campaigns as $key => $value) {
            $total_campaigns += $campaigns[$key]['submisi_total'];

            $campaigns[$key]['submisi_target'] = 'Rp '.number_format($campaigns[$key]['submisi_total'],0,'.',',');
            $campaigns[$key]['submisi_total'] = 'Rp '.number_format($campaigns[$key]['submisi_total'],0,'.',',');
            $campaigns[$key]['sisa_hari'] = $campaigns[$key]['created_at']->diff($campaigns[$key]['submisi_expired_at'])->days.' hari';
            
            $campaigns[$key]['submisi_created_at'] = $campaigns[$key]['created_at']->format('d-m-Y');
            $campaigns[$key]['submisi_updated_at'] = $campaigns[$key]['updated_at']->format('d-m-Y');
        }

        $total_campaigns = 'Rp '.number_format($total_campaigns,0,'.',',');

        return response(['users' => $users, 'campaigns' => $campaigns, 'totalCampaigns' => $total_campaigns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
