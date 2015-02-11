<?php

class Home{
    /**
     * view Home
     */
    public function showHome(){
        View::create('layout.twig.php', 'home.twig.php', []);
    }
    
    /**
     * 
     */
    public function show404(){
        View::create('layout.twig.php', '404.twig.php', []);
    }
    
    public function postHome(){
        View::create('layout.twig.php', '404.twig.php', []);
    }
}