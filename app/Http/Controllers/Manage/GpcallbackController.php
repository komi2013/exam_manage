<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Weidner\Goutte\GoutteFacade;

class GpcallbackController extends Controller {

    public function lessuri(Request $request, $page) {
        $post_data = array(
          'code' => $_GET['code'],
          'client_id' => '1001190811901-sj2dd1vcledc4i8hfnb3qmrt63t7ubvi.apps.googleusercontent.com',
          'client_secret' => 'vTyFc16jmccIMl5-Vomf60C3',
          'redirect_uri' => 'https://exam-manage.quigen.info/Manage/Gpcallback/',
          'grant_type' => 'authorization_code',
        );

        $curl = curl_init("https://accounts.google.com/o/oauth2/token");
        curl_setopt($curl,CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($curl);

        if (curl_errno($curl)) {
          die( curl_errno($curl) );
        } else {
          curl_close($curl);
        }
        $output = json_decode($output);
        $contents = file_get_contents('https://www.googleapis.com/oauth2/v1/tokeninfo?access_token='
                .$output->access_token);
        $contents = json_decode($contents);

//        dd($contents);
//  +"issued_to": "1001190811901-sj2dd1vcledc4i8hfnb3qmrt63t7ubvi.apps.googleusercontent.com"
//  +"audience": "1001190811901-sj2dd1vcledc4i8hfnb3qmrt63t7ubvi.apps.googleusercontent.com"
//  +"user_id": "101648555248376672193"
//  +"scope": "openid"
//  +"expires_in": 3599
//  +"access_type": "online"
        
        $post_data = array('access_token' => $output->access_token);
        $res = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . http_build_query($post_data));
        $result = json_decode($res, true);
//dd($result);
//array:9 [▼
//  "id" => "101648555248376672193"
//  "email" => "seijirok@gmail.com"
//  "verified_email" => true
//  "name" => "Sei Komi"
//  "given_name" => "Sei"
//  "family_name" => "Komi"
//  "link" => "https://plus.google.com/101648555248376672193"
//  "picture" => "https://lh4.googleusercontent.com/-8trcwIgCqo4/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rdNRGcFAYUMhg0H8wwnGgFT-2TdlA/mo/photo.jpg"
//  "locale" => "ja"
//]
        $obj = DB::connection('exam_manage')->table('t_manager')
                ->where('oauth_type',1)->where('oauth_id',$result['id'])
                ->first();
        if (isset($obj->manager_id)) {
            $manager_id = $obj->manager_id;
        } else {
            $manager_id = DB::connection('exam_manage')->select("select nextval('t_manager_manager_id_seq')")[0]->nextval;
            DB::connection('exam_manage')->table('t_manager')->insert([
                "manager_id" => $manager_id
                ,"oauth_type" => 1
                ,"oauth_id" => $result['id']
                ,"updated_at" => now()
                ,"manager_name" => $result['family_name']
            ]);
        }
        $request->session()->put('manager_id', $manager_id);
        $request->session()->put('db', 'exam_manage');

        return redirect('/Manage/Applicant/index/');
    }

}

