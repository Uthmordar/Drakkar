<?php 
namespace Bootstrap;

class Autoload{
    public function __construct(){
        spl_autoload_register(
            function($className){
                if($lastSep = strrpos($className, '\\')){
                    $class = substr($className, $lastSep + 1);
                    $path = substr($className, 0, $lastSep);
                    $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
                }else
                    return false;
                $import = '..' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $class . '.php';
                // on modifie les _ du nom de la classe par des \ par convention
                $import = str_replace('_', DIRECTORY_SEPARATOR, $import);
                if(!empty($import)){
                    if(file_exists($import))
                        require_once $import;
                }
            }
        );
    }
}