<?php

namespace App\controllers;
use App\models\Auteur;
use core\JWT;
require_once __DIR__.'/../../core/JWT.php';

class AuteurController extends CoreController{


    public function getAllAuteur()
    {

        if(isset($_SESSION['user'])){

            $jwt= new JWT;

            if($jwt->isValide($_COOKIE['userToken'])){
                $data =(new Auteur())->getAll();
                $this->render('Auteur',$data);
    

            }
            else{


            }
            
            
        }
        
    }


    
}