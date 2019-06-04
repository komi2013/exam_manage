<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        \Config::set('database.connections.exam_8001.database', 'exam_8001');
        \Config::set('database.connections.exam_8001.username', 'exam_8001');
        \Config::set('database.connections.exam_8001.password', 's2e4tuz1');
        
    }
}
