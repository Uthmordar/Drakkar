<?php
namespace vendor\Drakkar;

class RouteToController{
    private static $method;
    private static $controller;
    /**
     * init RouteToModel
     * @param type $route
     */
    public static function initRoute($route){
        self::startRoute($route);
        require_once '..\App\controllers\\' . self::$controller . '.php';
        return self::loadController();
    }
    /**
     * Get controller & method from App\Route.php
     * @param type $route
     */
    public static function startRoute($route){
        self::$controller=substr($route, 0, strrpos($route, '->'));
        self::$method=substr($route, strrpos($route, '->')+2);  
    }
    /**
     * Load Uri template
     * @return \vendor\Drakkar\
     */
    public static function loadController(){
        $controller=new self::$controller;
        $method=self::$method;
        $controller->$method();
        return $controller;
    }
}