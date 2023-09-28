<?php

namespace App\controllers;

class ConfirmController extends CoreController{


    public function confirmation($token){

        echo $token;
    }
}