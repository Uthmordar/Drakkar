<?php
namespace Interfaces;

interface iPath{
    public function initPath($path);
    public function getPath($name);
    public function getDomain();
    public function getUrl();
}