<?php

class Singleton implements \Interfaces\iSingleton{
    private static $instance = null;

    private function __construct(){}
   
    private function __clone(){}

    public static function getInstance() {
        return self::$instance;
    }

    public static function newInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}