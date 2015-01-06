<?php
use Bootstrap\Autoload;
$autoload = new Autoload;

use App\configs\Config;
$config = new Config(require_once PATH_CONFIG . 'app.php');

use vendor\Drakkar\Path;
$path = new Path($arrayPath);

use vendor\Drakkar\Router;
require_once PATH_APP . 'Route.php';
$arrayRoute = Router::getRoute($config->getConfig('url'), $path->getUrl());
if($arrayRoute['route']=='404.php'){
    var_dump('Erreur 404'); die();
}

use vendor\Drakkar\RouteToController;
$controller=RouteToController::initRoute($arrayRoute['controller']);
if(!$controller){
    var_dump('Erreur chargement');die();
}

use vendor\Drakkar\Render;
Render::initRender($config, $path);
Render::render($controller);