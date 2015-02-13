<?php
namespace Interfaces;

interface iDb{
    public static function setConnect(array $database);
    public static function getConnect();
}