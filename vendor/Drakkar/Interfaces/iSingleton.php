<?php
namespace Interfaces;

interface iSingleton{
    public static function getInstance();
    public static function newInstance();
}