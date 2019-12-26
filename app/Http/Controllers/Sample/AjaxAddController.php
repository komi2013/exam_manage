<?php
namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AjaxAddController extends Controller {

    public function index(Request $request) {
        
        $obj = DB::table('t_item')->orderBy('item_id','desc')->limit(5)->get();
        
        return view('sample.ajax_add', compact('obj'));
    }
    public function fizzbuzz(Request $request) {
        
        return view('sample.fizzbuzz');
    }
}