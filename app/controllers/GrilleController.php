<?php


namespace App\controllers;
use  App\models\Grille;
use core\JWT;
require_once __DIR__.'/../../core/JWT.php';

class GrilleController extends CoreController{



    public function getAllTune(){


        if(isset($_SESSION['user'])){


            $jwt=new JWT;

            if($jwt->isValide($_COOKIE['userToken'])){
                $tunes = (new Grille())->getAll();
                $this->render('Tune',$tunes);
            }
            
        }
        else{

            echo 'error getAllTunes</br>';
            var_dump($_SESSION);
        }
       
        
    }

    public function getAllByAuteur($id){

        
        if(isset($_SESSION['user'])){

            $jwt=new JWT;

            if($jwt->isValide($_COOKIE['userToken'])){

                $data = (new Grille)->getTunesByAuteur($id);
                $this ->render('Tune',$data);
            }

            else{

                
            }
        }
            
        
    }

    
}