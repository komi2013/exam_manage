<?php
namespace App\Http\Controllers\Applicant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StartController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null, $password='', $lang='en', $apply_from='') {
//DB::statement("ALTER USER exam_8001 password 's2e4tuz1';");
//die('he we go');

        $exam_manage = DB::connection('exam_manage')->table('t_manager')
                ->where('password',$password)->first();
        if (!$exam_manage) {
            return view('errors.404');
        }
        return view('applicant.start', compact('apply_from','exam_manage','lang'));
    }
    public function lessuri(Request $request) {
        $request->session()->regenerateToken();
        $exam_manage = DB::connection('exam_manage')->table('t_manager')
                ->where('password',$request->input('password'))->first();
        if (!$exam_manage) {
            return view('errors.404');
        }
        $applicant = DB::connection('exam_manage')->table('t_applicant')
                ->where('manager_id',0)
                ->orderBy('applicant_id','asc')
                ->first();
        $res[0] = 1;
        if ($applicant->applicant_id) {
            $dt = Carbon::now();
            $dt->addDay(7);
            DB::connection('exam_manage')->table('t_applicant')
                    ->where("applicant_id",$applicant->applicant_id)
                    ->update([
                        "applicant_name" => $request->input('applicant_name')
                        ,"apply_from" => $request->input('apply_from') ?? ''
                        ,"updated_at" => now()
                        ,"applicant_status" => "trying"
                        ,"deadline" => $dt->format('Y-m-d H:i:s')
                        ,"manager_id" => $exam_manage->manager_id
                    ]);

            $_SESSION['applicant_id'] = $applicant->applicant_id;
            $_SESSION['db_password'] = $applicant->db_password;
        } else {
            $res[0] = 2;
        }
        echo json_encode($res);
    }
}