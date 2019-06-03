<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Weidner\Goutte\GoutteFacade;

class AuthController extends Controller {

    public function index(Request $request, $directory=null, $controller=null, 
            $action=null, $lang='en') {

        $fb_url = 'https://www.facebook.com/dialog/oauth'
          .'?client_id='.config('oauth.fb_id')
          .'&redirect_uri=https://'.$_SERVER['HTTP_HOST'].'/Manage/Fboauth/'
          ;

        $gp_url = 'https://accounts.google.com/o/oauth2/auth'
          .'?client_id=1001190811901-sj2dd1vcledc4i8hfnb3qmrt63t7ubvi.apps.googleusercontent.com'
          .'&response_type=code'
          .'&scope=openid'
          .'&redirect_uri=https://'.$_SERVER['HTTP_HOST'].'/Manage/Gpcallback/'
          ;
        return view('manage.auth', compact('fb_url','gp_url','lang'));
    }

}

