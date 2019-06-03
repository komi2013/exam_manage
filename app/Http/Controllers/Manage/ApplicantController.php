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
        $obj = DB::table('t_applicant')
                ->where('manager_id',$manager_id)
                ->get();

        return view('manage.applicant', compact('obj'));
        
    }

}

