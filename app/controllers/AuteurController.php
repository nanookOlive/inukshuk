<?php

namespace App\controllers;
use App\models\Auteur;

class AuteurController extends CoreController{


    public function getAllAuteur()
    {

        $data = (new Auteur())->getAll();
        $this->render('Auteur',$data);
    }


    
}