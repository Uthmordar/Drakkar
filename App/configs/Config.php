<?php
namespace App\configs; 

class Config{
    private $config = [];
    /**
     * 
     * @param type $config
     * @return string
     */    
    public function __construct($config){
        if(!is_array($config)){
            throw new \RuntimeException('Erreur de format dans le fichier de config.');
        }
        $this->config = $config;
    }
    public function getConfig($name){
        if(isset($this->config[$name])){
            return $this->config[$name];
        }
        return '';
    }
}