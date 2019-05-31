<?php
namespace App\Http\Controllers\Exam8001;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AddItemController extends Controller {

    public function lessuri(Request $request) {
//        $request->session()->regenerateToken();
        DB::table('t_item')->insert([
            "item_name" => $request->input('item_name')
            ,"created_at" => $request->input('created_at') ?? now()
        ]);

    }

}