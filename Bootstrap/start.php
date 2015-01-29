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
    $path = new Path($arrayPath);
}catch(\RuntimeException $e){
    var_dump($e->getMessage());die();
}
try{
    $route=$router->getRoute($path->getUrl());
}catch(RuntimeException $e){
    var_dump($e->getMessage());die();
}

$controller=RouteToController::initRoute($route);
if(!$controller){
    var_dump('Erreur chargement');die();
}

$render=new Render($config, $path);
$render->render($controller);