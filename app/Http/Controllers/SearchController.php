<?php

namespace App\Http\Controllers;

use App\Searcher;
use App\Submission;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;


class SearchController extends Controller
{
    public function index(Request $request){
        // return view('search');
        $search = $request->q;
        $sql = array(
            DB::raw('t_submissions.submisi_judul'),
            DB::raw('t_submissions.submisi_id'),
            DB::raw('m_user.user_name as author'),
            DB::raw('t_submissions.submisi_foto as src'),
            DB::raw('t_submissions.submisi_terkumpul as raised'),
        );
        $data = DB::table('t_submissions')
                ->select($sql)
                ->join('m_user', 't_submissions.user_id', '=', 'm_user.user_id')
                ->where('submisi_judul', 'like', '%'.$search.'%')->get();
        return $data;
    }
}
