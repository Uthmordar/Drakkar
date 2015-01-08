<?php
namespace vendor\Drakkar\Router;
use vendor\Drakkar\Interfaces\iRoutable;

class Route implements iRoutable{
    protected $pattern;
    protected $controller;
    protected $action;
    protected $params;
    /**
     * 
     * @param array $route
     */
    public function __construct(array $route){
        if(empty($route['connect'])){
            throw new \RuntimeException('Access controller novalidate');
        }
        $this->setConnect($route['connect']);
        $this->setPattern($route['pattern']);
        if(!empty($route['params'])){
            $params=explode(',',$route['params']);
            $this->setParams($params);
        }
    }
    /**
     * 
     * @param type $connect
     * @throws Exception
     */
    public function setConnect($connect){
        $split=explode(':', $connect);
        if(count($split)!=2){
            throw new \RuntimeException('Access controller novalidate');
        }
        $this->setController($split[0])->setAction($split[1]);
    }
    /**
     * 
     * @param type $action
     * @return \Router\Route
     */
    public function setAction($action){
        $this->action=$action;
        return $this;
    }
    /**
     * 
     * @param type $controller
     * @return \Router\Route
     */
    public function setController($controller){
        $this->controller=$controller;
        return $this;
    }
    /**
     * 
     * @param array $params
     * @return \Router\Route
     */
    public function setParams(array $params){
        $this->params=$params;
        return $this;
    }
    /**
     * 
     * @param type $pattern
     * @return \Router\Route
     * @throws RuntimeException
     */
    public function setPattern($pattern){
        /*if(empty($pattern)){
            throw new \RuntimeException('No pattern');
        }*/
        $this->pattern=$pattern;
        return $this;
    }
    /**
     * 
     * @return type
     */
    public function getController(){
        return $this->controller;
    }
    /**
     * 
     * @return type
     */
    public function getAction(){
        return $this->action;
    }
    /**
     * 
     * @param type $matches
     * @return boolean
     */
    public function getParams($matches){
        if(!$matches || empty($matches)){
            return false;
        }
        if(!empty($this->params)){
            $params=[];
            foreach($this->params as $v){
                $params[trim($v)]=$matches[$v];
            }
            return $params;
        }
    }
    /**
     * 
     * @return type
     */
    public function getPattern(){
        return $this->pattern;
    }
    /**
     * 
     * @param type $url
     * @return boolean
     */
    public function isMatch($url){
        $check=preg_match("/" . $this->getPattern() . "$/", $url, $matches);
        if(!$check){
            return false;
        }
        return $matches;
    }
}