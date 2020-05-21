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
            $users[$key]['user_created_at'] = $users[$key]['created_at']->format('d-m-Y');
            $users[$key]['user_updated_at'] = $users[$key]['updated_at']->format('d-m-Y');
            $isadmin = $users[$key]['user_is_admin'];
            $isactive = $users[$key]['user_is_active'];
            $users[$key]['user_is_admin'] = 'user';
            $users[$key]['user_is_active'] = 'tidak aktif';
            if($isadmin == 1)
                $users[$key]['user_is_admin'] = 'admin';
            if($isactive == 1)
                $users[$key]['user_is_admin'] = 'aktif';
        }

        $campaigns = Start::all();
        return response(['users' => $users, 'campaigns' => $campaigns]);
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
