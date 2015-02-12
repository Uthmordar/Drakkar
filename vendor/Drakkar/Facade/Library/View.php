<?php
namespace Facade\Library;

class View implements \Interfaces\iSingleton, \Interfaces\iView{
    private $template;
    private $page;
    private $args=[];
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
    public function create(){
        $args=func_get_args()[0];
        if(!$this->setTemplate($args[0])){
            throw new \InvalidArgumentException('No template');
        }
        if(!$this->setPage($args[1])){
            throw new \InvalidArgumentException('No page');
        }
        if(!empty($args[2]) && is_array($args[2])){
            $this->setArgs($args);
        }
    }
    
    /**
     * @param type $template
     * @return boolean
     */
    protected function setTemplate($template){
        if(strpos($template, '.twig.php')){
            return $this->template=$template;
        }
        return false;
    }
    
    /**
     * @param type $page
     * @return boolean
     */
    protected function setPage($page){
        if(strpos($page, '.twig.php')){
            return $this->page=$page;
        }
        return false;
    }
    
    /**
     * 
     * @param type $args
     * @return boolean
     */
    protected function setArgs($args){
        if(is_array($args)){
            return $this->args=$args;
        }
        return false;
    }
    
    /**
     * 
     * @param type $template
     * @return type
     */
    public function getTemplate(){
        return $this->template;
    }
    
    /**
     * 
     * @param type $page
     * @return type
     */
    public function getPage(){
        return $this->page;
    }
    
    /**
     * 
     * @param type $args
     * @return type
     */
    public function getArgs(){
        return $this->args;
    }
}