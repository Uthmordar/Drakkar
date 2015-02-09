<?php
namespace Interfaces;

interface iPath{
    public static function initPath($path);
    public static function getPath($name);
    public static function getDomain();
    public static function getUrl();
}