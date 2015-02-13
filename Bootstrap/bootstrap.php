<?php
require_once 'Autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

define('PATH_APP', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR);
define('PATH_CONFIG', PATH_APP . 'configs' . DIRECTORY_SEPARATOR);
//définition du chemin d'accès au dossier d'images
define('PATH_ASSETS', 'assets' . DIRECTORY_SEPARATOR);
define('PATH_IMAGE', 'assets'. DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR);
define('PATH_CSS', 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR);
define('PATH_JS', 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR);

define('PATH_VENDORS', '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR);

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