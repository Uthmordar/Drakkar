<?php
use Symfony\Component\Yaml\Yaml;

class Drakkar{
    private $autoload;
    private $config;
    private $render;
    
    public function __construct($arrayPath){
        $this->autoload=new Bootstrap\Autoload;
        try{
            $this->setConfig();
            $this->setPath($arrayPath);
            $this->setRender();
            $this->routing();
        }catch(RuntimeException $e){
            $this->render->renderError($e);
        }
    }
    
    /**
     * set Config container object
     */
    public function setConfig(){
        $this->config=new \Configs\Config(Yaml::parse(PATH_CONFIG . 'app.yml'));
    }

    /**
     * Init Path singleton object
     * @param type $arrayPath
     */
    public function setPath($arrayPath){
        \Path::initPath($arrayPath);
    }

    /**
     * init Render
     */
    public function setRender(){
        $this->render=Render\Render::newInstance();
        $this->render->init($this->config, \Path::getInstance());
    }

    /**
     * routing  && rendering
     */
    public function routing(){
        require_once PATH_APP . 'Route.php';
        $route=\Router::getRoute(\Path::getUrl());
        $controller=\RouteToController::initRoute($route);
        if(!$controller){
            $this->render->renderError('Erreur chargement');
        }
        if(\View::getPage()){
            $this->render->render();
        }
    }
}