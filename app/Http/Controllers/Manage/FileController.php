<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FileController extends Controller {

    public function edit(Request $request) {
        $request->path;

        $viewable = true;
        if (
                strpos($request->path, '/Manage/') OR 
                strpos($request->path, '/Applicant/') OR
                strpos($request->path, '.env') OR 
                strpos($request->path, 'config/database.php')
                ) {
            return view('errors.404');
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

