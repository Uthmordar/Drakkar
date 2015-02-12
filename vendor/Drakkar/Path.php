<?php

class Path implements \Interfaces\iPath, \Interfaces\iSingleton{
    private static $path=[];
    private static $instance = null;

    private function __construct(){}
    
    private function __clone(){}

    public static function getInstance(){
        return self::$instance;
    }

    public static function newInstance(){
        if(self::$instance==null) {
            self::$instance=new self();
        }
        return self::$instance;
    }
    /**
     * 
     * @param type $path
     * @throws \RuntimeException
     */
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
        $host=filter_input(INPUT_SERVER, $_SERVER['HTTP_HOST']);
        $uri=filter_input(INPUT_SERVER, $_SERVER['REQUEST_URI']);
        if($host && $uri){
            return "http://" . $host . $uri;
        }
        return '';
    }
}