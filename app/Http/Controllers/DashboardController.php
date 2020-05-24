<?php

namespace App\Http\Controllers;

use App\Start;
use App\Donation;
use App\User;
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
        $campaigns = Start::with('user')->get();

        $total_campaigns = null;

        foreach($campaigns as $key => $value) {
            $total_campaigns += $campaigns[$key]['submisi_terkumpul'];

            $campaigns[$key]['submisi_target'] = $this->currency($campaigns[$key]['submisi_target']);
            $campaigns[$key]['submisi_terkumpul'] = $this->currency($campaigns[$key]['submisi_terkumpul']);

            $campaign_expire = new \DateTime($campaigns[$key]['submisi_expired_at']);
            $today = new \DateTime();
            $campaigns[$key]['sisa_hari'] = $today->diff($campaign_expire)->days.' hari';
            
            if($campaigns[$key]['submisi_is_active'] == 1)
                $campaigns[$key]['submisi_is_active'] = 'aktif';
            else
                $campaigns[$key]['submisi_is_active'] = 'tidak aktif';

            $campaigns[$key]['submisi_created_at'] = $campaigns[$key]['created_at']->format('d-m-Y');
            $campaigns[$key]['submisi_updated_at'] = $campaigns[$key]['updated_at']->format('d-m-Y');
        }

        $total_campaigns = $this->currency($total_campaigns);

        $donations = Donation::with('submission')->get();
        foreach($donations as $key => $value)
        {
            $donations[$key]['donatur_nominal'] = $this->currency($donations[$key]['donatur_nominal']);

            if($donations[$key]['donatur_is_anonymous'] == 1)
                $donations[$key]['donatur_is_anonymous'] = 'ya';
            else
                $donations[$key]['donatur_is_anonymous'] = 'tidak';

            if($donations[$key]['user_id'] == 0)
                $donations[$key]['user_id'] = 'tidak terdaftar';
            else
                $donations[$key]['user_id'] = 'terdaftar';

            $donations[$key]['donatur_created_at'] = $donations[$key]['created_at']->format('d-m-Y');
            $donations[$key]['donatur_updated_at'] = $donations[$key]['updated_at']->format('d-m-Y');
                
        }

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

        return response(['campaigns' => $campaigns, 'totalCampaigns' => $total_campaigns, 'donations' => $donations, 'users' => $users]);
    }

    public function currency($data)
    {
        return 'Rp '.number_format($data,0,'.',',');
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
