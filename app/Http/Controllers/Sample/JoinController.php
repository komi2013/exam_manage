<?php
namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class JoinController extends Controller {

    public function index(Request $request) {
        $date = $request->input('date') ?? '2019-05-30';
        $obj = DB::table('t_item')->whereDate('created_at', '=', $date)->get();
        $arr_category_ids = [];
        $item = [];
        foreach ($obj as $d) {
            $arr_category_ids[] = $d->category_id;
            $arr = [];
            $arr['item_id'] = $d->item_id;
            $arr['item_name'] = $d->item_name;
            $arr['created_at'] = date("Y-m-d", strtotime($d->created_at));
            $arr['category_id'] = $d->category_id;
            $arr['category_name'] = '';
            $arr['exportability'] = 0;
            $item[$d->item_id] = $arr;
        }

        $obj = DB::table('m_category')->whereIn("category_id", $arr_category_ids)->get();
        foreach ($item as $k => $d1) {
            foreach ($obj as $d2) {
                if ($d1['category_id'] == $d2->category_id) {
                    $item[$k]['category_name'] = $d2->category_name;
                    $item[$k]['exportability'] = $d2->exportability;
                }
            }
        }
        
        return view('sample.join', compact('item','date'));

    }

}