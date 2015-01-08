<?php
use Bootstrap\Autoload;
$autoload = new Autoload;

use vendor\Drakkar\Router\Router;
$router=new Router();
require_once PATH_APP . 'Route.php';

use App\configs\Config;
try{
    $config = new Config(require_once PATH_CONFIG . 'app.php');
}catch(\RuntimeException $e){
    var_dump($e->getMessage());die();
}

use vendor\Drakkar\Path;
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

use vendor\Drakkar\RouteToController;
$controller=RouteToController::initRoute($route);
if(!$controller){
    var_dump('Erreur chargement');die();
}

use vendor\Drakkar\Render;
Render::initRender($config, $path);
Render::render($controller);