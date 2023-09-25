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

        if($_POST['mail']==='ours'){
            header("Location:".$router->generate('allTunes'));


        }

        else{

            header("Location:".$router->generate('home'));
        }

       
    }
}