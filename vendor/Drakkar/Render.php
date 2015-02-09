<?php

class Render{
    private $config;
    private $path;
    private $twig;
    /**
     * get global object conf & path => load object
     * @param Config $config
     * @param Path $path
     */
    public function __construct($config, \Interfaces\iPath $path){
        $this->config=$config;
        $this->path=$path;
        require_once $path::getPath('vendors') . 'twig/twig/lib/Twig/Autoloader.php';
        \Twig_Autoloader::register();
        $loader=new \Twig_Loader_Filesystem(PATH_APP . 'views');
        $this->twig=new \Twig_Environment($loader);
    }
    
    /**
     * render template
     * @param Controller $controller
     */
    public function render($controller){
        $layout=$this->twig->loadTemplate($controller->getTemplate());
        $this->twig->display($controller->getPage(), array('layout' => $layout, 'config'=>$this->config, 'path'=>$this->path));
    }
    
    public function renderError($msg){
        
    }
    
    public function render404(){
        
    }
}