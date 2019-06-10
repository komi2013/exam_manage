<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PasswordController extends Controller {

    public function lessuri(Request $request) {
        $request->session()->regenerateToken();
        DB::connection('exam_manage')->table('t_manager')
                ->where('manager_id',session('manager_id'))
                ->update([
                    "password" => $request->password
                ]);
        $res[0] = 1;
        echo json_encode($res);
    }

}

