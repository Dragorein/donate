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
        $search = $request->get('q');
        return Searcher::where('submisi_judul', 'like', '%'.$search.'%')->get();
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
