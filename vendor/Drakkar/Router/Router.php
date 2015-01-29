<?php
namespace Router;
use Interfaces\iRoutable;

class Router  extends \SplObjectStorage{
    /**
     * 
     * @param \Interfaces\iRoutable $route
     */
    public function addRoute(iRoutable $route){
        foreach($this as $oldRoute){
            if($route->getPattern() == $oldRoute->getPattern()){
                throw new \RuntimeException('Route already exist');
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
            if(!$matches){
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