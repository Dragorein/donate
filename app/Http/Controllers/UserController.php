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
        if($request->step == 1) {
            $rules = [
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'phoneNumber' => 'required|numeric|min:10',
                'email' => 'required|email|unique:App\User,user_mail',
                'image' => 'required|mimes:jpg,jpeg,png',
            ];

            $messages = [
                'firstName.required' => 'Kolom nama depan harus diisi.',
                'lastName.required' => 'Kolom nama belakang harus diisi.',
                'phoneNumber.required' => 'Kolom nomor telepon harus diisi.',
                'phoneNumber.numeric' => 'Nomor telepon harus diisi dengan angka',
                'phoneNumber.min' => 'Minimal nomor telepon adalah 10',
                'email.required' => 'Kolom email harus diisi.',
                'email.email' => 'Tolong Masukan email yang valid.',
                'email.unique' => 'Maaf email ini sudah terpakai.',
                'image.required' => 'File gambar harus ada.',
                'image.mimes' => 'File gambar harus berupa .jpg, .jpeg atau .png.',
            ];

            $this->validate($request, $rules, $messages);
            return response(['response' => 'continue']);;
        }

        if($request->step == 2) {
            $rules = [
                'password' => 'required|min:4|required_with:confirmPassword|same:confirmPassword',
                'confirmPassword' => 'required|min:4',
            ];
            
            $messages = [
                'password.required' => 'Kolom password harus diisi.',
                'password.min' => 'Minimal karakter pada password adalah 4.',
                'password.required_with' => 'Password dibutuh dikonfirmasi.',
                'password.same' => 'Password dan konfirmasi password harus sama.',
                'confirmPassword.required' => 'Kolom konfirmasi password harus diisi.',
                'confirmPassword.min' => 'Minimal karakter pada konfirmasi password adalah 4.',
            ];
            
            $userRegister = new User;
            $userRegister->user_name = ucfirst($request->firstName).' '.ucfirst($request->lastName);
            $userRegister->user_mail = $request->email;
            $userRegister->user_token = $request->token;
            $userRegister->user_phone = $request->phoneNumber;
            $userRegister->user_password = bcrypt($request->password);
            $userRegister->user_is_active = 1;
            
            $file = $request -> file('image');

            if ($file == null) {
                $userRegister ->user_foto = 'default.png';
            }else {
                $ext = $request->file('image')->getClientOriginalExtension();
                $current_timestamp = now()->timestamp;
                $imageFile = $current_timestamp.'.'.$ext;
                $userRegister->user_foto = $imageFile;
                $request->file('image')->storeAs('public/profile', $current_timestamp.'.'.$ext);
            }

            $userRegister -> save();

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
        $userData = User::find($userId);
        $userData->update(['user_token' => $userLoggingIn['token']]);
        Session::put('user', $userData);
        Session::put('loggedin', true);
        if($userData->user_is_admin == 1) {
            Session::put('isadmin', true);
        }
        return response(['user' => Session::get('user'), 'loggedin' => Session::get('loggedin'), 'isadmin' => Session::has('isadmin')]);
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
        return response(['user' => Session::get('user'), 'loggedin' => Session::get('loggedin'), 'isadmin' => Session::has('isadmin')]);
    }
}
