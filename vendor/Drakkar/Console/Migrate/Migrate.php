<?php
namespace Console\Migrate;

class Migrate{
    /**
     * command routing for migrate
     * @param type $argv
     */
    static function dispatch($argv){
        if(!empty($argv[1]) && $argv[1]=="drop"){
            $drop=new DropTable(\Db::getDb());
            if(!empty($argv[2])){
                $drop->dropTable($argv[2]);
            }else{
                $drop->dropAllTables();
            }
        }else if(!empty($argv[1]) && $argv[1]=="create"){
            $generator=new CreateTable(\Db::getDb());
            $generator->setFiles();
            $generator->generateTables();
        }else{
            \Console\Message::renderMessage('unknown migrate arguments, try --help for more information', "help");
        }
    }
}