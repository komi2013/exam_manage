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
//        die;
//        dd($goup);
        return view('manage.ll', compact('list','goup'));
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

