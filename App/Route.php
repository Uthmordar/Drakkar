<?php
namespace App;
use vendor\Drakkar\Router\Route;

$router->addRoute(new Route(['pattern' => '\/error.php', 'connect' => 'Home:show404']));
$router->addRoute(new Route(['pattern' => '\/', 'connect' => 'Home:showHome']));