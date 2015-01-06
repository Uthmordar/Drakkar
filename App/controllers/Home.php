<?php
class Home extends vendor\Drakkar\Controller{
    public function showHome(){
        $this->setTemplate('layout.twig.php');
        $this->setPage('home.twig.php');
        $this->setArgs(array());
        return true;
    }
}