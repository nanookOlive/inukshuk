<?php

namespace App\controllers;

 abstract class CoreController{


    public $router;

    public function __construct($home,$router){

        $this->router= $router;

    }
 }