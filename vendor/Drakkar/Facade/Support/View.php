<?php
namespace Facade\Support;

class View extends \Facade\AbstractFacade{
    public static function getFacadeAccessor(){
        return 'view';
    }
}