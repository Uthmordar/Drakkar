<?php
namespace Facade\Support;

class Router extends \Facade\SingletonFacade{    
    public static function getFacadeAccessor(){
        return 'router';
    }
}