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

    // function action(Request $request){
    //     if($request->ajax()){
    //         $output = '';
    //         $query = $request->get('query');
    //         if ($query != ''){
    //             $data = DB::table('t_sumbission')
    //                 ->where('submisi_judul', 'like', '%'.$query.'%')
    //                 ->orderBy('submisi_id', 'desc')
    //                 ->get();
    //         } else {
    //             $data = DB::table('t_submission')
    //             ->orderBy('submisi_id', 'desc')
    //             ->get();
    //         }
    //         $total = $data->count();
    //         if ($total > 0){
    //             foreach($data as $row){
    //                 $output .='
    //                 <tr>
    //                     <td>'.$row->submisi_judul.'</td>
    //                 </tr>';
    //             }
    //         } else {
    //             $output = '
    //             <tr>
    //                 <td align="center">Data Not Found</td>
    //             </tr>
    //             ';
    //         }
    //         $data = array(
    //             'table_data' => $output,
    //             'total' => $total
    //         );

    //         echo json_encode($data);
    //     }
    // }
}
