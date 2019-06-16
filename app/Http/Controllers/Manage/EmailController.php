<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Weidner\Goutte\GoutteFacade;

class EmailController extends Controller {

    public function lessuri(Request $request) {
        $auth = str_random(8);
        $request->session()->put('email_auth', $auth);
        $request->session()->put('manager_pass', $request->manager_pass);
        $request->session()->put('email', $request->email);
//        RCPT TO: seijiro.komatsu@shopairlines.com To: seijiro.komatsu@shopairlines.com
        $to = $request->email;
        $subject = "Please Verify Your Email";
        $message = "Please Verify Your Email\r\n"
                ."https://exam-manage.quigen.info/Manage/Email/auth/"
                . $auth ."/ \r\n"
                . "new password : ".$request->password." \r\n"
                ;
        $headers = "From: noreply@exam-manage.quigen.info";
        $res[0] = 1;
$to='seijiro.komatsu@shopairlines.com';      //<-- 宛先アドレス
$subject='TEST MAIL';
$message='THIS IS TEST';
        $res[1] = mail($to, $subject, $message);
$to = 'komatsuka@yahoo.com';
$title = '件名';
$message = '本文';
$header = 'From: 送信元@example.jp';
mb_send_mail($to, $title, $message, $header, '-f' . '送信元@example.jp');
        echo json_encode($res);
//        return redirect('/Manage/Applicant/index/');
    }
    public function auth(Request $request, $directory=null, $controller=null, 
            $action=null, $auth) {
        if ($auth != session('email_auth')) {
            return view('errors.404');
        }

        $obj = DB::connection('exam_manage')->table('t_manager')
            ->where('email',session('email'))
            ->first();
        if ($obj->manager_id AND $obj->oauth_type == 3) {
            DB::connection('exam_manage')->table('t_manager')
                    ->where("manager_id",$obj->manager_id)
                    ->update([
                        "manager_pass" => session('manager_pass')
                        ,"updated_at" => now()
                    ]);
        } else {
            $manager_id = DB::connection('exam_manage')
                    ->select("select nextval('t_manager_manager_id_seq')")[0]->nextval;
            DB::connection('exam_manage')->table('t_manager')->insert([
                "manager_id" => $manager_id
                ,"oauth_type" => 3
                ,"updated_at" => now()
                ,"manager_pass" => session('manager_pass')
            ]);                
        }

        $request->session()->put('manager_id', $manager_id);

        return redirect('/Manage/Applicant/index/');
    }
    public function login(Request $request) {
        $obj = DB::connection('exam_manage')->table('t_manager')
            ->where('email',$request->email)
            ->first();
        $res[0] = 2;
        if (!isset($obj->manager_id)) {
            die(json_encode($res));
        }
        if ($obj->oauth_type != 3 OR $obj->manager_pass != $request->manager_pass) {
            die(json_encode($res));
        }
        $request->session()->put('manager_id', $obj->manager_id);
        $res[0] = 1;
        echo json_encode($res);
//        return redirect('/Manage/Applicant/index/' );
    }
}

