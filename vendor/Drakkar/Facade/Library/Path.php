<?php
namespace Facade\Library;

class Path implements \Interfaces\iPath, \Interfaces\iSingleton{
    private $path=[];
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
    public function initPath($path){
        if(!is_array($path)){
            throw new \RuntimeException('Erreur de format dans le fichier de path.');
        }
        $this->path=$path[0];
    }
    
    /**
    * @param type $name
    * @return string path
    */
    public function getPath($name){
        $index=(is_array($name))? $name[0] : $name;
        if(isset($this->path[$index])){
            return $this->path[$index];
        }
        return '';
    }
    
    /**
    * @return string domain
    */
    public function getDomain(){
        $host=$_SERVER['HTTP_HOST'];
        if($host){
            return $host;
        }
        return '';
    }
    
    /**
    * @return string current url
    */
    public function getUrl(){
        $host=filter_input(INPUT_SERVER, $_SERVER['HTTP_HOST']);
        $uri=filter_input(INPUT_SERVER, $_SERVER['REQUEST_URI']);
        if($host && $uri){
            return "http://" . $host . $uri;
        }
        return '';
    }
}