<?php

namespace App\Http\Controllers;

use App\Start;
use Illuminate\Http\Request;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $t_submisi = new Start();
        $t_submisi -> submisi_judul = $request -> judul;
        $t_submisi -> submisi_cerita = $request -> cerita;
        $t_submisi -> submisi_phone = $request -> noHandphone;
        // $t_submisi -> submisi_tipe = $request -> tipe;
        // $t_submisi -> submisi_hub_relasi = $request -> judul;
        $t_submisi -> submisi_total = $request -> total;
        $t_submisi -> submisi_tujuan = $request -> tujuan;

        $t_submisi -> save();

        return $t_submisi;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
