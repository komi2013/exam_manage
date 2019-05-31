<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FileController extends Controller {

    public function edit(Request $request) {

        $data = file_get_contents('/var/www/exam_manage/package.json');
        
//        echo '<textarea>'.$data.'</textarea>';
        
        return view('manage.file', compact('data'));
    }
    public function update(Request $request) {
        file_put_contents('/var/www/exam_manage/README.md', 'wos');
    }
}

