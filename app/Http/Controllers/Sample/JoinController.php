<?php
namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class JoinController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null, $date='2019-05-27') {
        
//// フェイクデータを生成するジェネレータを作成
//$faker = \Faker\Factory::create();
//
//// 日本人の氏名を10人分出力
//for ($i = 0; $i < 10; $i++) {
//  echo $faker->word(20) . "<br>";
//}
//die;
//        $obj = DB::table('sekaimon')->get();
//        foreach ($obj as $d) {
//            DB::table('t_item')
//                    ->insert([
//                        "item_name" => $d->original
//                    ]);
//        }
//        die;
//        $obj = DB::table('t_item')->orderBy('item_id','asc')->get();
//        $created_at = Carbon::now();
//        foreach ($obj as $d) {
//            DB::table('t_item')->where("item_id",$d->item_id)
//                    ->update([
//                        "created_at" => $created_at->format('Y-m-d H:i:s')
//                    ]);
//            $created_at->addMinute(30);
//        }
//        
//        die('done');

        $obj = DB::table('t_item')->whereDate('created_at', '=', $date)->get();
        $arr_category_ids = [];
        $item = [];
        foreach ($obj as $d) {
            $arr_category_ids[] = $d->category_id;
            $arr = [];
            $arr['item_id'] = $d->item_id;
            $arr['item_name'] = $d->item_name;
            $arr['created_at'] = $d->created_at;
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