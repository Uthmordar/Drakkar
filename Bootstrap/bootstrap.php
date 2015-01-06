<?php
require_once 'Autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';


define('PATH_APP', '../App/');
define('PATH_CONFIG', PATH_APP . 'configs/');
//définition du chemin d'accès au dossier d'images
define('PATH_ASSETS', 'assets/');
define('PATH_IMAGE', 'assets/images/');
define('PATH_CSS', 'assets/css/');
define('PATH_JS', 'assets/js/');

define('PATH_VENDORS', '../vendor/');

$arrayPath=array(
	'app'=>PATH_APP,
	'config'=>PATH_CONFIG,
	'assets'=>PATH_ASSETS,
	'image'=>PATH_IMAGE,
	'css'=>PATH_CSS,
	'js'=>PATH_JS,
	'vendors'=>PATH_VENDORS
);
// -------- fin bootstrap
require_once 'start.php';