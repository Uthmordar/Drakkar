<?php

class View implements \Interfaces\iSingleton, \Interfaces\iView{
    private static $template;
    private static $page;
    private static $args=[];
    private static $instance = null;
    
    private function __construct(){}
    
    private function __clone(){}

    public static function getInstance(){
        return self::$instance;
    }

    public static function newInstance(){
        if(self::$instance==null){
            self::$instance=new self();
        }
        return self::$instance;
    }
    
    /**
     * create view
     * @param template
     * @param page
     * @param args (facultative)
     * @throws Exception
     */
    public static function create(){
        $args=func_get_args();
        if(!self::setTemplate($args[0])){
            throw new \InvalidArgumentException('No template');
        }
        if(!self::setPage($args[1])){
            throw new \InvalidArgumentException('No page');
        }
        if(!empty($args[2]) && is_array($args[2])){
            self::setArgs($args);
        }
    }
    
    /**
     * @param type $template
     * @return boolean
     */
    
    protected static function setTemplate($template){
        if(strpos($template, '.twig.php')){
            return self::$template=$template;
        }
        return false;
    }
    
    /**
     * @param type $page
     * @return boolean
     */
    protected static function setPage($page){
        if(strpos($page, '.twig.php')){
            return self::$page=$page;
        }
        return false;
    }
    
    /**
     * 
     * @param type $args
     * @return boolean
     */
    protected static function setArgs($args){
        if(is_array($args)){
            return self::$args=$args;
        }
        return false;
    }
    
    /**
     * 
     * @param type $template
     * @return type
     */
    public static function getTemplate(){
        return self::$template;
    }
    
    /**
     * 
     * @param type $page
     * @return type
     */
    public static function getPage(){
        return self::$page;
    }
    
    /**
     * 
     * @param type $args
     * @return type
     */
    public static function getArgs(){
        return self::$args;
    }
}