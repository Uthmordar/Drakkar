<?php

class Path implements \Interfaces\iPath, \Interfaces\iSingleton{
    private static $path=[];
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
     * @param type $name
     * @return string path
     */    
    /*public function __construct($path){
        if(!is_array($path)){
            throw new \RuntimeException('Erreur de format dans le fichier de path.');
        }
        $this->path = $path;
    }*/
    public static function initPath($path){
        if(!is_array($path)){
            throw new \RuntimeException('Erreur de format dans le fichier de path.');
        }
        self::$path = $path;
    }
    /**
    * @param type $name
    * @return string path
    */
    public static function getPath($name){
        if(isset(self::$path[$name])){
            return self::$path[$name];
        }
        return '';
    }
    /**
    * @return string domain
    */
    public static function getDomain(){
        if($_SERVER['HTTP_HOST']){
            return $_SERVER['HTTP_HOST'];
        }
        return '';
    }
    /**
    * @return string current url
    */
    public static function getUrl(){
        if($_SERVER['HTTP_HOST'] && $_SERVER['REQUEST_URI']){
            return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }
        return '';
    }
}