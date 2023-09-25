<?php

namespace App\controllers;
use App\models\User;

class UserController extends CoreController{

    
    public function connect(){

        $router=$this->router;

        require_once __DIR__.'../../view/Formu.php';
    }

    public function verify(){
    
        $router=$this->router;

        // autentif


        if($_POST['mail']==='ours'){ // si ok vers la page all Tunes
            header("Location:".$router->generate('allTunes'));


        }

        else{

            header("Location:".$router->generate('home'));
        }

       
    }
}