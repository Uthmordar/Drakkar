<?php 

class Controller{
    private $template;
    private $page;
    private $args=[];
    /**
     * @param type $template
     * @return boolean
     */
    public function setTemplate($template){
        if(strpos($template, '.twig.php')){
            return $this->template=$template;
        }
        return false;
    }
    /**
     * @param type $page
     * @return boolean
     */
    public function setPage($page){
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
    public function setArgs($args){
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