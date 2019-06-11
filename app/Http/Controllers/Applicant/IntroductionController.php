<?php
namespace App\Http\Controllers\Applicant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IntroductionController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null, $lang='en') {
        
        if (!isset($_SESSION['applicant_id'])) {
            $message = 'please go to start URL';
            return view('errors.404', compact('message'));
        }

        $applicant = DB::connection('exam_manage')->table('t_applicant')
                ->where('applicant_id',$_SESSION['applicant_id'])
                ->first();
        if (!$applicant) {
            return view('errors.404');
        }
        return view('applicant.introduction_'.$lang, compact('applicant'));
    }
}