<?php

namespace App\controllers;

 abstract class CoreController{


    public $router;

    public function __construct($home,$router){

        $this->router= $router;

    }

    public function render($viewType, array $data){

      
        $router=$this->router;
        
        
        require_once __DIR__.'/../view/header.php';
        require_once __DIR__.'/../view/'.$viewType.'.php';
        require_once __DIR__.'/../view/footer.php';
    }
 }