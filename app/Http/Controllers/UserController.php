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
        // dd ($request);
        if($request->step == 1) {
            $request->validate([
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'phoneNumber' => 'required|numeric',
                'email' => 'required|email|unique:App\User,user_mail',
                'image' => 'required',
            ]);

            return response(['response' => 'continue']);;
        }

        if($request->step == 2) {
            $request->validate([
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'phoneNumber' => 'required|numeric|min:10',
                'email' => 'required|email',
                'image' => 'required',
                'password' => 'required|min:4|required_with:confirmPassword|same:confirmPassword',
                'confirmPassword' => 'min:4',
            ]);

            $userRegister = new User;
            $userRegister->user_name = $request->firstName.' '.$request->lastName;
            $userRegister->user_mail = $request->email;
            $userRegister->user_token = $request->token;
            $userRegister->user_phone = $request->phoneNumber;
            $userRegister->user_foto = $request->file('image')->getClientOriginalName();
            $userRegister->user_password = bcrypt($request->password);
            $userRegister->user_is_active = 1;

            $userRegister -> save();

            $request->file('image')->storeAs('profile', $request->file('image')->getClientOriginalName());

            return response(['response' => 'success', 'message' => 'Registrasi akun berhasil!']);
        }
    }
    
    public function login(Request $request)
    {
        $userLoggingIn = new User;
        $userLoggingIn = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'token' => 'required'
        ]);

        if(!Auth::attempt(['user_mail' => $userLoggingIn['email'], 'password' => $userLoggingIn['password']])) {
            return response(['user' => '', 'loggedin' => false, 'message' => 'Invalid login credentials.']);
        }

        $userId = Auth::user()->user_id;
        User::find($userId)->update(['user_token' => $userLoggingIn['token']]);
        Session::put('user', User::find($userId));
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