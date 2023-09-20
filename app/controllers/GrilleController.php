<?php


namespace App\controllers;
use  App\models\Grille;

class GrilleController extends CoreController{


   

    public function render($viewType, array $data){

      
        $router=$this->router;
        
        
        require_once __DIR__.'/../view/header.php';
        require_once __DIR__.'/../view/'.$viewType.'.php';
        require_once __DIR__.'/../view/footer.php';
    }

    public function getAllTune(){


        $tunes = (new Grille())->getAll();
        $this->render('Tune',$tunes);
        
    }

    public function getAllAuteur(){

        $tunes = (new Grille())->getAll();
        $this->render('Auteur',$tunes);
    }
}