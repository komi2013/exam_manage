<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use DateTime;

class Rollback extends Command
{

    protected $signature = 'Rollback';

    protected $description = 'Rollback';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle() {
//            \Config::set('database.connections.exam.database', "exam_manage");
//            \Config::set('database.connections.exam.username', 'postgres');
//            \Config::set('database.connections.exam.password', 'sde5tuft');
//        for ($i = 8011; $i <= 8013; $i++) {
//            $result = DB::statement(
//                    "CREATE ROLE exam_".$i." WITH LOGIN PASSWORD 'password';");
//            $result = DB::statement(
//                    "CREATE DATABASE exam_".$i." WITH TEMPLATE exam_8003 OWNER exam_".$i.";");
//            
//            $conn = "host=localhost dbname=exam_".$i.
//                    " user=postgres".
//                    " password=sde5tuft";
//            $link = pg_connect($conn);
//            $result = pg_query("GRANT ALL ON ALL TABLES IN SCHEMA public TO exam_".$i.";");
//            $result = pg_query("ALTER TABLE public.t_item OWNER TO exam_".$i.";");
//            $result = pg_query("ALTER TABLE public.m_category OWNER TO exam_".$i.";");
//            pg_close($link);
//            DB::table('t_applicant')->insert([
//                "db_password" => 'password'
//                ,"manager_id" => 1
//                ,"deadline" => '2019-01-01'
//                ,"applicant_id" => $i
//            ]);
//        }
//        dd($result);
//        echo base_path()."/infra/rollback.sh ".'8002';
//        shell_exec(base_path()."/infra/rollback.sh ".'8002');
//        
//        die;
        $applicants = DB::connection('exam_manage')
                ->table('t_applicant')
                ->where('deadline','<',now())
                ->where('manager_id','<>',0)
                ->orderBy('applicant_id')
                ->get();
        foreach ($applicants as $d) {
            $password = str_random(8);
            try {
                $conn = "host=localhost dbname=postgres".
                        " user=postgres".
                        " password=sde5tuft"."";
                $link = pg_connect($conn);
                $result = pg_query("ALTER USER exam_".$d->applicant_id.
                        " password '".$password."';");
                
                $result = pg_query("DROP DATABASE IF EXISTS exam_".$d->applicant_id.";");
                $result = pg_query("CREATE DATABASE exam_".$d->applicant_id.
                        " WITH TEMPLATE exam_8001 OWNER exam_".$d->applicant_id.";");
                pg_close($link);
                $conn = "host=localhost dbname=exam_".$d->applicant_id.
                        " user=postgres".
                        " password=sde5tuft";
                $link = pg_connect($conn);
                $result = pg_query("GRANT ALL ON ALL TABLES IN SCHEMA public TO exam_".$d->applicant_id.";");
                $result = pg_query("ALTER TABLE public.t_item OWNER TO exam_".$d->applicant_id.";");
                $result = pg_query("ALTER TABLE public.m_category OWNER TO exam_".$d->applicant_id.";");
                pg_close($link);
                shell_exec(base_path()."/infra/rollback.sh ".$d->applicant_id);
                
            } catch (\Exception $e){
                Log::error($e);
                dd($e);
                $result = false;
            }
            if ($result) {
                DB::connection('exam_manage')->table('t_applicant')
                        ->where("applicant_id",$d->applicant_id)
                        ->update([
                            "applicant_name" => ''
                            ,"apply_from" => ''
                            ,"updated_at" => now()
                            ,"applicant_status" => ""
                            ,"deadline" => now()
                            ,"manager_id" => 0
                            ,"db_password" => $password
                        ]);
            }

        }
        
        echo 'done';
    }
}
