<?php
namespace Console;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Bootstrap\Autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

define('PATH_APP', __DIR__  . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR);
define('PATH_CONFIG', PATH_APP . 'configs' . DIRECTORY_SEPARATOR);
define('PATH_SEEDS', PATH_APP . 'database' . DIRECTORY_SEPARATOR . 'Seeds');
define('PATH_TABLES', PATH_APP . 'database' . DIRECTORY_SEPARATOR . 'Tables');

\Db::initDb();

if(empty($argv[1])){
    Message::renderMessage('missing arguments, try --help for more information', "help");
    return false;
}

if($argv[1]=="--help"){
    Message::renderMessage("SEED :\n\tseed:seed => seed all tables\n\tseed:seed filename => seed specific file\n\tseed:truncate => truncate all tables\n\tseed:truncate table => truncate table\n\n"
            . "MIGRATE :\n \tmigrate:create => migrate all tables\n\tmigrate:drop => drop all tables\n\tmigrate:drop table => drop specific table", "help");
}else if(!empty($argv[1])){
    $arrayTask=explode(':', $argv[1]);
    if($arrayTask[0]=='seed' && !empty($arrayTask[1])){
        $argv[1]=(!empty($arrayTask[1]))? $arrayTask[1] : false;
        Seed\Seed::dispatch($argv);
    }else if($arrayTask[0]=='migrate' && !empty($arrayTask[1])){
        $argv[1]=(!empty($arrayTask[1]))? $arrayTask[1] : false;
        Migrate\Migrate::dispatch($argv);
    }else{
        Message::renderMessage('unknown command or arguments, try --help for more information', "help");
    }
}