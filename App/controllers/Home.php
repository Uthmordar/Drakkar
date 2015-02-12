<?php

class Home{
    /**
    * view Home
    */
    public function showHome(){
        View::create(['layout'=>'layout.twig.php', 'tpl'=>'home.twig.php']);
    }
    
    /**
    * 
    */
    public function show404(){
        View::create(['layout'=>'layout.twig.php', 'tpl'=>'404.twig.php']);
    }
    
    public function postHome(){
        View::create(['layout'=>'layout.twig.php', 'tpl'=>'404.twig.php']);
    }
    
    public function article($id){
        View::create(['tpl'=>'tpl.php', 'args'=>['id'=>$id]]);
    }
}