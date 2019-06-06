<?php
namespace App\Http\Controllers\Exam8001;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinController extends Controller {

    public function index(Request $request) {
        

        return view('exam8001.join');

    }

}