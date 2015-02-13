<?php
namespace Console\Migration;
use Symfony\Component\Yaml\Yaml;

require_once __DIR__ . '\..\..\..\..\Bootstrap\Autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

define('PATH_APP', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR);
define('PATH_CONFIG', PATH_APP . 'configs' . DIRECTORY_SEPARATOR);
define('PATH_TABLES', PATH_APP . 'database' . DIRECTORY_SEPARATOR . 'Tables');

\Db::initDb();

if(!empty($argv[1]) && $argv[1]=="drop"){
    $drop=new DropTable(\Db::getDb());
    if(!empty($argv[2])){
        $drop->dropTable($argv[2]);
    }else{
        $files=array_reverse(array_diff(scandir(PATH_TABLES), array('..', '.')));
        foreach($files as $file){
            $drop->dropYamlTable(Yaml::parse(PATH_TABLES . DIRECTORY_SEPARATOR . $file));
        }
    }
}else{
    $generator=new CreateTable(\Db::getDb());
    $files=array_diff(scandir(PATH_TABLES), array('..', '.'));
    foreach($files as $file){
        $generator->generateTable(Yaml::parse(PATH_TABLES . DIRECTORY_SEPARATOR . $file));
    }
}