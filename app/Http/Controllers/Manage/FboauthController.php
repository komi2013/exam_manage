<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Weidner\Goutte\GoutteFacade;

class FboauthController extends Controller {

    public function lessuri(Request $request, $page) {
    $client_id = config('oauth.fb_id');
    $client_secret = config('oauth.fb_secret');

    $fb_url = 'https://graph.facebook.com/oauth/access_token?';
    $redirect_uri = 'redirect_uri=https://'.$_SERVER['HTTP_HOST'].'/Manage/Fboauth/&';

    $contents = file_get_contents($fb_url.'client_id='.$client_id.'&'.$redirect_uri.'client_secret='.$client_secret.'&code='.$_GET['code']);
    $contents = json_decode($contents,true);

    $contents = file_get_contents('https://graph.facebook.com/me?access_token='.$contents['access_token']);
    $contents = json_decode($contents);
//        dd($contents);
//  +"name": "Seigi Komatsu"
//  +"id": "10216221617110572"

        $obj = DB::table('t_manager')
                ->where('oauth_type',2)->where('oauth_id',$contents->id)
                ->first();
        if (isset($obj->manager_id)) {
            $manager_id = $obj->manager_id;
        } else {
            $manager_id = DB::select("select nextval('t_manager_manager_id_seq')")[0]->nextval;
            DB::table('t_manager')->insert([
                "manager_id" => $manager_id
                ,"oauth_type" => 2
                ,"oauth_id" => $contents->id
                ,"updated_at" => now()
            ]);
        }
        $request->session()->put('manager_id', $manager_id);
        $request->session()->put('db', 'exam_manage');

        return redirect('/Manage/Applicant/index/');
    }

}

