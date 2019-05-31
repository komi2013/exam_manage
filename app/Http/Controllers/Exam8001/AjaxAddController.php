<?php
namespace App\Http\Controllers\Exam8001;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AjaxAddController extends Controller {

    public function index(Request $request) {
        
        $obj = DB::table('t_item')->orderBy('item_id','desc')->limit(2)->get();
        
        return view('exam8001.ajax_add', compact('obj'));
    }

}