<?php
namespace Interfaces;

interface iRoutable{
    public function getController();
    public function getAction();
    public function getParams($matches);
    public function isMatch($url);
}