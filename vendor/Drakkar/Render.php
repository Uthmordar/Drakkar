<?php
namespace vendor\Drakkar;

class Render{
    private static $config;
    private static $path;
    private static $twig;
    /**
     * get global object conf & path => load object
     * @param \vendors\Bloom\Config $config
     * @param \vendors\Bloom\Path $path
     */
    public static function initRender($config, Path $path){
        self::$config=$config;
        self::$path=$path;
        require_once $path->getPath('vendors') . 'twig/twig/lib/Twig/Autoloader.php';
        \Twig_Autoloader::register();
        $loader=new \Twig_Loader_Filesystem(PATH_APP . 'views');
        self::$twig=new \Twig_Environment($loader);
    }
    /**
     * render template
     * @param \vendor\Drakkar\Controller $controller
     */
    public static function render(Controller $controller){
        $layout = self::$twig->loadTemplate($controller->getTemplate());
        self::$twig->display($controller->getPage(), array('layout' => $layout, 'config'=>self::$config, 'path'=>self::$path));
    }
}