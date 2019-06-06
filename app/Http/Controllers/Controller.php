<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        if ( isset($_SESSION['applicant_id']) ) {
            \Config::set('database.connections.exam.database', 'exam_'.$_SESSION['applicant_id'] ?? '');
            \Config::set('database.connections.exam.username', 'exam_'.$_SESSION['applicant_id'] ?? '');
            \Config::set('database.connections.exam.password', $_SESSION['db_password'] ?? '');
        } else if ( !isset($_SESSION) ) {
            session_set_cookie_params(3600 * 24 * 7);
            session_start(); 
        }
    }
}
