<?php

class View extends \Facade\SingletonFacade{  
    public static function getFacadeAccessor(){
        return 'view';
    }
}