<?php
use Bootstrap\Autoload;
$autoload=new Autoload;

use App\configs\Config;
try{
    $config=new Config(require_once PATH_CONFIG . 'app.php');
}catch(\RuntimeException $e){
    var_dump($e->getMessage());die();
}

try{
    Path::initPath($arrayPath);
}catch(\RuntimeException $e){
    var_dump($e->getMessage());die();
}

use Render\Render;
$render=Render::newInstance();
$render->init($config, Path::getInstance());

try{
    require_once PATH_APP . 'Route.php';
    $route=Router::getRoute(Path::getUrl());
}catch(RuntimeException $e){
    $render->renderError($e);
}

$controller=RouteToController::initRoute($route);
if(!$controller){
    $render->renderError('Erreur chargement');
}

$render->render();