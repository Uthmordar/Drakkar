<?php
namespace vendor\Drakkar;

class Request{
    private static $params=[];

    public static function route($uri){
        $pattern='/^index.php\/(?P<type>.+)\/(?P<id>.+)/';
        preg_match($pattern, $uri, $matches);

        self::$params=$matches;
    }

    public static function getType(){
        if(!empty(self::$params['type'])){
            return self::$params['type'];
        }else{
            return false;
        }
    }

    public static function getId(){
        if(!empty(self::$params['id'])){
            return self::$params['id'];
        }else{
            return false;
        }
    }
}