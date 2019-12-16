<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApplicantSessionController extends Controller {

    public function session_save(Request $request, $directory=null, $controller=null, 
            $action=null) {

        $applicant = DB::connection('exam_manage')->table('t_applicant')
                ->where('applicant_id',$request->input('applicant_id'))
                ->first();
        $_SESSION['applicant_id'] = $applicant->applicant_id;
        $_SESSION['db_password'] = $applicant->db_password;
        $applicant_id = $applicant->applicant_id;
        $arr[0] = '/Exam'.$applicant_id.'/AjaxAdd/index/';
        $arr[1] = '/Exam'.$applicant_id.'/Join/index/';
        $arr[2] = '/Manage/LL/index/?path=/app/Http/Controllers/Exam'.$applicant_id.'/';
        $arr[3] = '/Manage/LL/index/?path=/resources/views/exam'.$applicant_id.'/';
        $goto = $arr[$request->input('goto')];
        
        return view('manage.goto', compact('applicant_id','goto'));
        
    }

}

