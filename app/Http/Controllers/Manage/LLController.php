<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LLController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null) {
//    	$list = $this->getFileList('/var/www/exam_manage/');
//        echo base_path().$request->path.'*';
//        die;
//        $_path = base_path();
//        die($_path);
        if ($request->path == '/app/Http/Controllers/' 
                OR $request->path == '/resources/views/') {
            return $this->dir($request->path);
        }
        $list = [];
        foreach(glob(base_path().$request->path.'*') as $k => $file){
            $p = str_replace('/var/www/exam_manage', '', htmlspecialchars($file));
            if(is_file($file)){
                $list[$k]['path'] = $p;
                $list[$k]['file'] = true;
            } else if (is_dir($file)) {
                $list[$k]['path'] = $p.'/';
                $list[$k]['file'] = false;
            }
        }
        $arr = explode("/",$request->path);
        $goup = '';
        for ($i = 1; $i < count($arr)-2; $i++) {
            $goup .= '/'.$arr[$i];
        }
        $goup .= '/';
        return view('manage.ll', compact('list','goup'));
    }
    public function dir($path) {

        if ($path == '/app/Http/Controllers/') {
            $list[0]['path'] = '/app/Http/Controllers/Controller.php';
            $list[0]['file'] = true;
            if (session('manager_id')) {
                $obj = DB::connection('exam_manage')->table('t_applicant')
                        ->where('manager_id',session('manager_id'))
                        ->get();
                foreach ($obj as $k => $d) {
                    $list[$k+1]['path'] = '/app/Http/Controllers/Exam'.$d->applicant_id.'/';
                    $list[$k+1]['file'] = false; 
                }
            } else if (isset($_SESSION['applicant_id'])) {
                $list[1]['path'] = '/app/Http/Controllers/Exam'.$_SESSION['applicant_id'].'/';
                $list[1]['file'] = false;       
            }

            $goup = '/app/Http/';
            return view('manage.ll', compact('list','goup'));
        }
        if ($path == '/resources/views/') {
            $list[0]['path'] = '/resources/views/errors/';
            $list[0]['file'] = false;
            if (session('manager_id')) {
                $obj = DB::connection('exam_manage')->table('t_applicant')
                        ->where('manager_id',session('manager_id'))
                        ->get();
                foreach ($obj as $k => $d) {
                    $list[$k+1]['path'] = '//resources/views/exam'.$d->applicant_id.'/';
                    $list[$k+1]['file'] = false; 
                }
            } else if (isset($_SESSION['applicant_id'])) {
                $list[1]['path'] = '/resources/views/exam'.$_SESSION['applicant_id'].'/';
                $list[1]['file'] = false;
            }
            $goup = '/resources/';
            return view('manage.ll', compact('list','goup'));
        }
        
    }
    public function getFileList($dir) {
        $files = scandir($dir);
        $files = array_filter($files, function ($file) { // 注(1)
            return !in_array($file, array('.', '..'));
        });

        $list = array();
        foreach ($files as $file) {
            $fullpath = rtrim($dir, '/') . '/' . $file; // 注(2)
            if (is_file($fullpath)) {
                $list[] = $fullpath;
            }
            if (is_dir($fullpath)) {
                $list = array_merge($list, $this->getFileList($fullpath));
            }
        }
        return $list;
    }

}

