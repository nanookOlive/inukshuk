<?php


namespace App\controllers;
use  App\models\Grille;

class GrilleController extends CoreController{



    public function getAllTune(){


        if(isset($_SESSION['user'])){

            $tunes = (new Grille())->getAll();
            $this->render('Tune',$tunes);
        }
        else{

            echo 'error getAllTunes</br>';
            var_dump($_SESSION);
        }
       
        
    }

    public function getAllByAuteur($id){

        

            $data = (new Grille)->getTunesByAuteur($id);
            $this ->render('Tune',$data);
        
    }

    
}