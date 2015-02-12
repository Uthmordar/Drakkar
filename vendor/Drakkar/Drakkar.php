<?php

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
    
    public function setConfig(){
        $this->config=new \Configs\Config(require_once PATH_CONFIG . 'app.php');
    }

    public function setPath($arrayPath){
        \Path::initPath($arrayPath);
    }

    public function setRender(){
        $this->render=Render\Render::newInstance();
        $this->render->init($this->config, \Path::getInstance());
    }

    public function routing(){
        require_once PATH_APP . 'Route.php';
        $route=\Router::getRoute(\Path::getUrl());
        $controller=\RouteToController::initRoute($route);
        if(!$controller){
            $this->render->renderError('Erreur chargement');
        }
        $this->render->render();
    }
}