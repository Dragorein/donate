<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\User;

class ProfileController extends Controller
{
    //update profile
    public function update_profile(Request $request)
    {

        $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phoneNumber' => 'required|numeric|min:10',
            'email' => 'required|email',
            'image' => '',
        ]);
        
        
        $userupdate = User::find($request->id);
        $userupdate->user_name = ucfirst($request->firstName).' '.ucfirst($request->lastName);
        $userupdate->user_mail = $request->email;
        $userupdate->user_token = $request->token;
        $userupdate->user_phone = $request->phoneNumber;
       
        
        $file = $request -> file('image');

        if ($file == null) {
            $userupdate -> save();
            Session::put('user', $userupdate);
        }else {
            $ext = $request->file('image')->getClientOriginalExtension();
            $current_timestamp = now()->timestamp;
            $imageFile = $current_timestamp.'.'.$ext;
            $userupdate->user_foto = $imageFile;
            $request->file('image')->storeAs('profile', $current_timestamp.'.'.$ext);
            $userupdate -> save();
            Session::put('user', $userupdate);
        }
        return response(['response' => 'success', 'message' => 'Update akun berhasil!']);
    }

    // Update Password
    public function update_password(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required|min:4',
            'newpassword' => 'required|min:4|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'min:4',
        ]);
        $password =  $request->oldpassword; 
        $email = $request->email;
        if(!Auth::attempt(['user_mail' => $email,'password' => $password])) {
            return response(['response' => 'BAD','message' => 'Invalid Old Password.']);
        }
        $userupdate = User::find($request->id);
        $userupdate->user_password = bcrypt($request->newpassword);
        $userupdate -> save();
        return response(['response' => 'success', 'message' => 'Update Password akun berhasil!']);
    }
    //Get Information Submision and Donation History
    public function get_history_submision_donation($id)
    {
        $sql_submission_active = array(
            DB::raw('t_submissions.submisi_id'),
            DB::raw('t_submissions.submisi_foto'),
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('m_user.user_name'),
            DB::raw('(DATEDIFF(submisi_expired_at, now())) as sisa_hari'),
        );
        $submission_active = DB::table('t_submissions')
            ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
            ->select($sql_submission_active)
            ->where([
                ['t_submissions.user_id',$id],
                ['t_submissions.submisi_is_active',1]
            ])
            ->get();

        $sql_submission_history = array(
            DB::raw('t_submissions.submisi_id'),
            DB::raw('t_submissions.submisi_foto'),
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('m_user.user_name'),
            DB::raw('(DATEDIFF(submisi_expired_at, now())) as sisa_hari'),
        );
        $submission_history = DB::table('t_submissions')
            ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
            ->select($sql_submission_history)
            ->where([
                ['t_submissions.user_id',$id],
                ['t_submissions.submisi_is_active',0]
            ])
            ->get();

        $sql_donations = array(
            DB::raw('t_submissions.submisi_id'),
            DB::raw('t_submissions.submisi_foto'),
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('m_user.user_name'),
            DB::raw('(DATEDIFF(submisi_expired_at, now())) as sisa_hari'),
        );
        $donations = DB::table('t_donations')
            ->join('t_submissions', 't_donations.submisi_id', '=', 't_submissions.submisi_id')
            ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
            ->select($sql_donations)
            ->where('t_donations.user_id',$id)
            ->get();

        return response([
            'submissionhistory' => $submission_history, 
            'submissionactive' => $submission_active, 
            'donations' => $donations,
        ]);
    }
}
