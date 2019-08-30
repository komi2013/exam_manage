<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null) {

        $manager_id = $request->session()->get('manager_id');
        if(!$manager_id){
            return redirect('/Manage/Auth/index/');
        }
        $obj = DB::connection('exam_manage')->table('t_applicant')
                ->where('manager_id',$manager_id)
                ->orderBy('deadline','desc')
                ->get();
        $manager = DB::connection('exam_manage')->table('t_manager')
                ->where('manager_id',$manager_id)
                ->first();
        $login_icon = '';
        switch ($manager->oauth_type) {
            case 1:
                $login_icon = "/img/icon/gp.png";
                break;
            case 2:
                $login_icon = "/img/icon/fb.jpg";
                break;
        }
        return view('manage.applicant', compact('obj','manager','login_icon'));
        
    }

}

