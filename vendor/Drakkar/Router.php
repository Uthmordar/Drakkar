<?php
namespace vendor\Drakkar;

class Router{
    private static $routes=[];
    /**
     * GetRoute from App\Route & list them
     * @param type $route
     * @param type $controller
     */
    public static function addRoute($route, $controller){
        self::$routes[$route]=$controller;
    }
    /**
     * return controller link to route
     * @param type $domain
     * @param type $url
     * @return type array
     */
    public static function getRoute($domain, $url){
        return self::chooseRoute($domain, $url);
    }
    /**
     * get right route 
     * @param type $domain
     * @param type $url
     * @return array
     */
    public static function chooseRoute($domain, $url){
        $term=substr($url, strrpos($url, $domain) . strlen($domain));
        foreach(self::$routes as $route=>$controller){
            if($route==$term)
                return ['route'=>$route, 'controller'=>$controller];
        }
        return ['route'=>'404.php', 'controller'=>false];
    }
}