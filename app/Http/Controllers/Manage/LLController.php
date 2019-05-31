<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LLController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null, $dir='exam_manage/') {
//    	$list = $this->getFileList('/var/www/exam_manage/');
        $list = [];
        foreach(glob('/var/www/'.$dir.'*') as $file){
            if(is_file($file)){
                $list[] = htmlspecialchars($file);
            }
        }
        
//        die;
        dd($list);
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

