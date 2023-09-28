<?php

namespace App\controllers;
use App\models\User;


class ConfirmController extends CoreController{


    public function confirmation($token){

        //fetch the user 
        $user = new User;
        $user = $user->getUserByToken($token);


        //set the granted status to 1 

        $user->setGranted(1);

        echo '<pre>';
        var_dump($user);
        echo '</pre>';
        //update user 

        $user->updateUser();
    }
}