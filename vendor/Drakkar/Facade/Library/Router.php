<?php
namespace Facade\Library;
use Interfaces\iRoutable;
use Router\Route;

class Router extends \SplObjectStorage{
    private static $instance = null;
    private function __construct(){}
    
    private function __clone(){}

    public static function getInstance() {
        return self::$instance;
    }

    public static function newInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * 
     * @param type $args
     */
    public function get($args){
        $data=$args[0];
        $data['method']='GET';
        $this->addRoute(new Route($data));
    }
    
    /**
     * 
     * @param type $args
     */
    public function post($args){
        $data=$args[0];
        $data['method']='POST';
        $this->addRoute(new Route($data));
    }
    
    /**
     * @param \Interfaces\iRoutable $route
     */
    public function addRoute(iRoutable $route){
        foreach($this as $oldRoute){
            if($route->getPattern() == $oldRoute->getPattern() && $route->getMethod()==$oldRoute->getMethod()){
                throw new \RuntimeException('Route "' . $route->getPattern() . '" already exist');
            }
        }
        $this->attach($route);
    }
    
   /**
    * 
    * @param type $url
    * @return type
    * @throws \RuntimeException
    */
    public function getRoute($url){
        foreach($this as $k){
            $matches=$k->isMatch($url);
            $method=(filter_input(INPUT_SERVER, $_SERVER['REQUEST_METHOD']))? filter_input(INPUT_SERVER, $_SERVER['REQUEST_METHOD']) : 'GET';
            if(!$matches || $method!=$k->getMethod()){
                continue;
            }
            $array=[
                'controller' => $k->getController(),
                'action' => $k->getAction()
            ];
            $params=$k->getParams($matches);
            if($params){
                $array['params']=$params;
            }
            return $array;
        }
        throw new \RuntimeException('404');
    }
}