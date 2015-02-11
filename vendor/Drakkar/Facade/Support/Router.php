<?php
namespace Facade\Support;

class Router extends \Facade\AbstractFacade{
    public static function resolve($name){
        $className = '\\Facade\\Library\\' . ucfirst($name);
        if($className::getInstance()){
            return $className::getInstance();
        }
        return $className::newInstance();
    }
    
    public static function getFacadeAccessor(){
        return 'router';
    }
}