<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;


class LoginController extends Controller
{
    public function init(){
        $user = Auth::user();

        return response()->json(['user' => $user], 200);
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){ //true remember password
            return response()->json(Auth::user(), 200,);
        } else{
            return response()->json(['error' => 'Maaf anda tidak bisa login.'], 401);
        }
    }

    public function logout(){
        Auth::logout();
    }
}
