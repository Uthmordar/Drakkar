<?php

class Db extends \Facade\SingletonFacade{
    public static function resolve($name){
        $className='\\Database\\' . ucfirst($name);
        
        if($className::getInstance()){
            return $className::getInstance();
        }
        return $className::newInstance();
    }
    
    public static function getFacadeAccessor(){
        return 'DatabaseAccessor';
    }
}