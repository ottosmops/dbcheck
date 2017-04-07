<?php

namespace Ottosmops\Dbcheck;

use Illuminate\Console\Command;
use DB, Schema;

class Dbcheck extends Command
{
    protected $signature = 'db:check';

    protected $description = 'Analyse the database for invalid foreign keys.';

    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $headers = ['TABLE_SCHEMA', 'TABLE_NAME', 'COLUMN_NAME', 'REFERENCED_TABLE_NAME', 'REFERENCED_COLUMN_NAME', 'INVALID_KEY_COUNT']; 

        $procedure = file_get_contents (realpath(dirname(__FILE__)).'/analyse_invalid_foreign_keys.sql');
        DB::unprepared($procedure);
        DB::select(DB::raw("call ANALYZE_INVALID_FOREIGN_KEYS('%', '%', 'Y')"));
        $result =  DB::table('INVALID_FOREIGN_KEYS')->get()->toArray();
        
        $array = [];
        $i = 0;
        foreach($result as $row) {
            foreach($headers as $key) {
                $array[$i][] = $row->$key;
            }
            $i++;
        }

        $this->table($headers, $array);

    }

    
}
