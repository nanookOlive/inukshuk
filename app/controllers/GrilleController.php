<?php


namespace App\controllers;
use  App\models\Grille;

class GrilleController extends CoreController{



    public function getAllTune(){


        $tunes = (new Grille())->getAll();
        $this->render('Tune',$tunes);
        
    }

    public function getAllByAuteur($id){

        $data = (new Grille)->getTunesByAuteur($id);
        $this ->render('Tune',$data);

    }

    
}