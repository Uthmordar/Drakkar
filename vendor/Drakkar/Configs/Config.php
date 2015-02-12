<?php
namespace Configs; 

class Config{
    private $config = [];
    /**
     * 
     * @param type $config
     * @return string
     */    
    public function __construct(array $config){
        if(!is_array($config)){
            throw new \RuntimeException('Erreur de format dans le fichier de config.');
        }
        $this->config = $config;
    }
    
    /**
     * 
     * @param type $name
     * @return string
     */
    public function getConfig($name){
        if(isset($this->config[$name])){
            return $this->config[$name];
        }
        return '';
    }
}