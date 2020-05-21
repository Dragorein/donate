<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $m_user = new User;
        $m_user -> user_name = $request ->name;
        $m_user -> user_mail = $request ->email;
        $m_user -> user_token = $request ->token;
        $m_user -> user_phone = $request ->noHandphone;
        $m_user -> user_password = bcrypt($request->password);

        $m_user -> save();

        return $m_user;
    }
    
    public function login(Request $request)
    {
        $userLoggingIn = new User;
        $userLoggingIn = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt(['user_mail' => $userLoggingIn['email'], 'password' => $userLoggingIn['password']])) {
            return response(['user' => '', 'loggedin' => false, 'message' => 'invalid login credentials.']);
        }

        Session::put('user', Auth::user());
        Session::put('loggedin', true);
        return response(['user' => Session::get('user'), 'loggedin' => Session::get('loggedin')]);
    }

    public function logout()
    {
        Session::flush();
    }

    public function currentUser()
    {
        if (!Session::has('loggedin')) {
            return response(['user' => '', 'loggedin' => false]);
        }

        return response(['user' => Session::get('user'), 'loggedin' => Session::get('loggedin')]);
    }
}
