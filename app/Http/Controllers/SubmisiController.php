<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import file Model Submisi
use App\M_Submisi;

class SubmisiController extends Controller
{
    // mengambil semua data
    public function all()
    {
        return M_Submisi::all();
    }
}
