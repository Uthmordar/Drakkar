<?php 
namespace Facade;

abstract class SingletonFacade extends AbstractFacade{
    public static function resolve($name){
        $className = '\\Facade\\Library\\' . ucfirst($name);
        if($className::getInstance()){
            return $className::getInstance();
        }
        return $className::newInstance();
    }
}