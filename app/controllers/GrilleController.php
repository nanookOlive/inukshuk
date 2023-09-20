<?php


namespace App\controllers;
use  App\models\Grille;

class GrilleController extends CoreController{


   

    

    public function getAllTune(){


        $tunes = (new Grille())->getAll();
        $this->render('Tune',$tunes);
        
    }

    
}