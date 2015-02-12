<?php
namespace Render;

class Render implements \Interfaces\iSingleton, \Interfaces\iRender{
    private $config;
    private $path;
    private $twig;
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
     * get global object conf & path => load object
     * @param Config $config
     * @param Path $path
     */
    public function init($config, \Interfaces\iPath $path){
        $this->config=$config;
        $this->path=$path;
        require_once $path->getPath('vendors') . 'twig/twig/lib/Twig/Autoloader.php';
        \Twig_Autoloader::register();
        $loader=new \Twig_Loader_Filesystem(PATH_APP . 'views');
        $this->twig=new \Twig_Environment($loader);
    }
    
    /**
     * display template
     * @param Controller $controller
     */
    public function render(){
        if(\View::isTwig()){
            $args=$this->generateTwigTemplate();
            $this->twig->display(\View::getPage(), $args);
        }else{
            $args=$this->renderPage();
        }
    }
    
    /**
    * load template
    * @return type
    */
    protected function generateTwigTemplate(){
        $layout=$this->twig->loadTemplate(\View::getTemplate());
        $args=['layout' => $layout, 'config'=>$this->config, 'path'=>$this->path];
        return array_merge($args, \View::getArgs());
    }
    
    /**
     * 
     * @return type
     */
    protected function renderPage(){
        $args=array_merge(['config'=>$this->config, 'path'=>$this->path], \View::getArgs());
        require_once PATH_APP . '\views\\' . \View::getPage();
        ob_start();
        extract($args);
        include PATH_APP . '\views\\' . \View::getPage();
        $return=ob_get_clean();

        return $return;
    }
    
    /**
    * display errors
    * @param type exception
    */
    public function renderError($error){
        $this->twig->display('error.twig.php', ['msg'=>$error->getMessage()]);
        die();
    }
}