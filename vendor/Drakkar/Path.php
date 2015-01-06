<?php
namespace vendor\Drakkar; 

class Path{
    private $path=[];
    /**
     * @param type $name
     * @return string path
     */    
    public function __construct($path){
        if(!is_array($path)){
            throw new \RuntimeException('Erreur de format dans le fichier de path.');
        }
        $this->path = $path;
    }
    /**
    * @param type $name
    * @return string path
    */
    public function getPath($name){
        if(isset($this->path[$name])){
            return $this->path[$name];
        }
        return '';
    }
    /**
    * @return string domain
    */
    public function getDomain(){
        if($_SERVER['HTTP_HOST']){
            return $_SERVER['HTTP_HOST'];
        }
        return '';
    }
    /**
    * @return string current url
    */
    public function getUrl(){
        if($_SERVER['HTTP_HOST'] && $_SERVER['REQUEST_URI']){
            return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }
        return '';
    }
}