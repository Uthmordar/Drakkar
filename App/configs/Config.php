<?php
namespace App\configs; 

class Config{
    private $config = [];
    /**
     * 
     * @param type $name
     * @return string
     */    
    public function __construct($config){
        try{
            if(!is_array($config))
                throw new Exception('Erreur de format dans le fichier de config.');     
            $this->config = $config;
        } catch (Exception $ex){
        }
    }
    public function getConfig($name){
        if(isset($this->config[$name]))
            return $this->config[$name];
        return '';
    }
}