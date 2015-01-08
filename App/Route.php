<?php
namespace App;
use vendor\Drakkar\Router\Route;
/*use vendor\Drakkar\Router;

Router::addRoute('index.php', 'Home->showHome');
Router::addRoute('toto.php', 'Home->showHome');*/

$router->addRoute(new Route(['pattern' => '\/error.php', 'connect' => 'Home:show404']));
$router->addRoute(new Route(['pattern' => '\/', 'connect' => 'Home:showHome']));