<?php

namespace App\controllers;
use App\models\User;
require_once __DIR__.'/../../core/Utils.php';

class UserController extends CoreController{

    
    public function connect(){

        $router=$this->router;

        require_once __DIR__.'../../view/FormuConnect.php';
    }

    public function verify(){
    
        $router=$this->router;

        // on vérifie nettoie les inputs

        if((empty($_POST['mail']) || (empty($_POST['password'])))){

           header('Location:'.$router->generate('home'));
        }
        else{

            $email = filter_input(INPUT_POST,'mail',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password=filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $user=new User;
            $user=$user->getUser($email);


                    //on crée un objet user à partir du mail 

            if(!$user){

                echo 'user not in base !';
                header('Location:'.$router->generate('home'));
            }

            else{
       

                if(!empty($_SESSION['user'])){ // le user est déjà connecté

                   echo 'user already connected !';
                  
                }
                // on assigne l'objet user dans le tableau de session
                else{


                    // on vérifie le mot de pass 

                    if($password === $user->getPassword()){

                        if($user->getGranted()){

                            //on check le status du user ; il doit être granted pour accéder au service
                            $_SESSION['user']=serialize($user);  
                            header('Location:'.$router->generate('allTunes'));
                        }

                        else{

                            echo 'validation de votre demande inscription en cours';
                        }
                    }

                    else{

                        echo 'wrong password';
                    }
                    
            
                }
            }


        }  
    }

    public function inscription(){

        $router= $this->router;

        require_once __DIR__.'../../view/FormuInscription.php';
    }



    public function sendInscription(){

        $router=$this->router;


       
        $error=[];


        ////is empty 

        foreach($_POST as $key => $val){

            if(empty($val)){
                $error[$key]='is_empty';
            }
        }

        $_SESSION['error']=$error;


        if(!empty($error)){

            header('Location:'.$router->generate('inscription'));
            
        }

        


        
       else{



        
            $email=filter_input(INPUT_POST,'mail',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password=filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $message=filter_input(INPUT_POST,'message',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if(filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL)){

                
                //exists in base 

                $user = new User;
                            

                if($user->getUser($email)){

                    $error['inBase']='user allready in base';

                    //message vous êtes dejà inscrit
                    $_SESSION['error']= $error;
                    header('Location:'.$router->generate('inscription'));

                }
                else{

                    $token = uniqid();
                    if($user->insertUser($email,$password,$token)){

                        //envoie du mail à l'admin pour changement du status de granted 0 à granted 1
                        $token=($user->getUser($email))->getToken();
                        
                        sendRequestInscription($email,$_POST['message'],$token);
                        header('Location:'.$router->generate('home'));
                    }

                    else{

                        echo 'probleme lors inscription' ;

                    }
                }

            }
            else{

                echo 'invalid mail format';
            }
        }
            


        //header("Location:".$router->generate('home'));

    }


    public function logoutUser(){

        $router = $this->router;
        session_unset();
        session_destroy();

        if(ini_get('session.use_cookies')){
            $params = session_get_cookie_params();
            setCookie(session_name(),'',time()-3600,
            $params["path"],
            $params['domain'],
            $params['secure'],
            $params['httponly']);
        }

        header('Location:'.$router->generate('home'));

       
    }
}