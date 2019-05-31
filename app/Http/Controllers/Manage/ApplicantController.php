<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null, $dir='exam_manage/') {

        $obj = DB::table('t_applicant')->get();
        
        return view('manage.applicant', compact('obj'));
        
    }

}

