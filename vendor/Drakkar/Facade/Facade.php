<?php 
namespace Facade;

abstract class AbstractFacade{
    public static function __callStatic($method, $args){
        $instance=static::resolve(static::getFacadeAccessor());
        return call_user_func([$instance, $method],$args);
    }

    public static function resolve($name){
        $className = '\\Facade\\Library\\' . ucfirst($name);
        return new $className;
    }
}
