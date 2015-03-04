<?php
namespace Console\Seed;

class Seed{
    /**
     * seed command dispatcher
     * @param type $argv
     */
    static function dispatch($argv){
        if(!empty($argv[1]) && $argv[1]=="truncate"){
            $truncate=new TruncateTable(\Db::getDb());
            if(!empty($argv[2])){
                $truncate->truncateTable($argv[2]);
            }else{
                $truncate->truncateAllTables();
            }
        }else if(!empty($argv[1]) && $argv[1]=="seed"){
            $seeder=new SeedTable(\Db::getDb());
            if(!empty($argv[2])){
                $seeder->seedTable($argv[2]);
            }else{
                $seeder->getFiles();
                $seeder->seedTables();
            }
        }else{
            \Console\Message::renderMessage('unknown seed arguments, try --help for more information', "help");
        }
    }
}