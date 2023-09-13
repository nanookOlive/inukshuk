<?php


namespace App\controllers;


class Controller{


    public function render($viewType, array $data){


        require_once __DIR__.'/../view/header.php';
        require_once __DIR__.'/../view/'.$viewType.'.php';
        require_once __DIR__.'/../view/footer.php';
    }
}