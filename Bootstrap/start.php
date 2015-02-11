<?php
use Bootstrap\Autoload;
$autoload=new Autoload;

use Router\Router;
$router=new Router();

Path::newInstance();
View::newInstance();

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
$render=new Render($config, Path::getInstance());

try{
    require_once PATH_APP . 'Route.php';
    $route=$router->getRoute(Path::getUrl());
}catch(RuntimeException $e){
    $render->renderError($e);
}

$controller=RouteToController::initRoute($route);
if(!$controller){
    $render->renderError('Erreur chargement');
}

$render->render();