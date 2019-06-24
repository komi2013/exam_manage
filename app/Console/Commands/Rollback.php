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
        
//        for ($i = 8016; $i < 9000; $i++) {
//            $result = pg_query("CREATE USER exam_".$i." WITH PASSWORD '12345678';");
//        }

        $applicants = DB::connection('exam_manage')
                ->table('t_applicant')
                ->where('deadline','<',now())
                ->where('manager_id','<>',0)
                ->where('applicant_id','<>',8001)
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
