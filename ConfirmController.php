<?php

namespace App\controllers;
use App\models\User;
require_once __DIR__.'/../../core/Utils.php';

class ConfirmController extends CoreController{


    public function confirmation($token){

        //fetch the user 
        $user = new User;
        $user = $user->getUserByToken($token);


        //set the granted status to 1 

        $user->setGranted(1);
        $user->updateUser(); // in base


      //send email confirmation of validation 

      if(sendConfirmationInscription($user->getMail())){

        echo 'Inscription validée, mail de confirmation envoyé';
        
      }


        
    }
}