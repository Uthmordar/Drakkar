<?php
namespace vendor\Drakkar;

class RouteToController{
    private static $method;
    private static $controller;
    private static $params;
    /**
     * init RouteToModel
     * @param type $route
     */
    public static function initRoute($route){
        self::$method=$route['action'];
        self::$controller=$route['controller'];
        if(!empty($route['params'])){
            self::$params=$route['params'];
        }
        require_once PATH_APP . '\controllers\\' . self::$controller . '.php';
        return self::loadController();
    }
    /**
     * Load Uri template
     * @return \vendor\Drakkar\
     */
    public static function loadController(){
        $controller=new self::$controller;
        $method=self::$method;
        $controller->$method(self::$params);
        return $controller;
    }
}