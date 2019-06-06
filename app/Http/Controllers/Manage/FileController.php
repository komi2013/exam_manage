<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FileController extends Controller {

    public function edit(Request $request) {
        $request->path;
//        '/var/www/exam_manage/package.json'
//        dd(base_path());
        
        $data = file_get_contents(base_path().$request->path);
        $path = $request->path;
        return view('manage.file', compact('data','path'));
    }
    public function update(Request $request) {
        
//        dd($request->path. $request->data);
        file_put_contents(base_path().$request->path, $request->data);
        $res[0] = 1;
        echo json_encode($res);
    }
}

