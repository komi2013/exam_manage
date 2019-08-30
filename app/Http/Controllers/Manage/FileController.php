<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FileController extends Controller {

    public function edit(Request $request) {

        $viewable = true;
        if (
                strpos($request->path, '/Manage/') OR 
                strpos($request->path, '/Applicant/') OR
                strpos($request->path, '/Rollback') OR
                strpos($request->path, '.env') OR 
                strpos($request->path, 'config/database.php')
                ) {
            return view('errors.404');
        }
        if (!isset($_SESSION['applicant_id']) AND 
                strpos($request->path, '/Sample/')) {
            return view('errors.404');
        }
        if (strpos($request->path, 'app/Http/Controllers/Exam8')) {
            $applicant_id = substr($request->path, 26, 4);
            $ok = false;
            if (session('manager_id')) {
                $obj = DB::connection('exam_manage')->table('t_applicant')
                        ->where('manager_id',session('manager_id'))
                        ->get();
                foreach ($obj as $k => $d) {
                    if ($d->applicant_id == $applicant_id) {
                        $ok = true;
                    }
                }
            }
            if (isset($_SESSION['applicant_id'])) {
                if ($_SESSION['applicant_id'] == $applicant_id) {
                    $ok = true;
                }     
            }
            if (!$ok) {
                return view('errors.404');
            }
        }
        if (strpos($request->path, 'resources/views/exam8')) {
            $applicant_id = substr($request->path, 21, 4);
            $ok = false;
            if (session('manager_id')) {
                $obj = DB::connection('exam_manage')->table('t_applicant')
                        ->where('manager_id',session('manager_id'))
                        ->get();
                foreach ($obj as $k => $d) {
                    if ($d->applicant_id == $applicant_id) {
                        $ok = true;
                    }
                }
            }
            if (isset($_SESSION['applicant_id'])) {
                if ($_SESSION['applicant_id'] == $applicant_id) {
                    $ok = true;
                }     
            }
            if (!$ok) {
                return view('errors.404');
            }
        }
        $data = file_get_contents(base_path().$request->path);
        $path = $request->path;
        $arr = explode("/",$request->path);
        $goup = '';
        for ($i = 1; $i < count($arr)-1; $i++) {
            $goup .= '/'.$arr[$i];
        }
        $goup .= '/';
        return view('manage.file', compact('data','path','goup'));
    }
    public function update(Request $request) {
        
        file_put_contents(base_path().$request->path, $request->data);
        $res[0] = 1;
        echo json_encode($res);
    }
}

