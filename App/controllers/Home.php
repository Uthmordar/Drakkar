<?php
class Home extends Controller{
    public function showHome(){
        $this->setTemplate('layout.twig.php');
        $this->setPage('home.twig.php');
        $this->setArgs(array());
        return true;
    }
    public function show404(){
        $this->setTemplate('layout.twig.php');
        $this->setPage('404.twig.php');
        $this->setArgs(array());
        return true;
    }
}