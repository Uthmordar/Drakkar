<?php
use Bootstrap\Autoload;
$autoload=new Autoload;

use Router\Router;
$router=new Router();
require_once PATH_APP . 'Route.php';

use App\configs\Config;
try{
    $config=new Config(require_once PATH_CONFIG . 'app.php');
}catch(\RuntimeException $e){
    var_dump($e->getMessage());die();
}

try{
    Path::newInstance();
    Path::initPath($arrayPath);
}catch(\RuntimeException $e){
    var_dump($e->getMessage());die();
}
try{
    $route=$router->getRoute(Path::getUrl());
}catch(RuntimeException $e){
    var_dump($e->getMessage());die();
}

$controller=RouteToController::initRoute($route);
if(!$controller){
    var_dump('Erreur chargement');die();
}

$render=new Render($config, Path::getInstance());
$render->render($controller);