<?php

namespace App\controllers;
use App\models\User;
use core\JWT;
require_once __DIR__.'/../../core/JWT.php';
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

                $_SESSION['error']=['errorConnection'=>'Vous n\'êtes pas encore inscrit.'];
                header('Location:'.$router->generate('home'));
            }

            else{
       

                if(!empty($_SESSION['user'])){ // le user est déjà connecté
                    
                    $this->logoutUser();
                   
                  
                }
                // on assigne l'objet user dans le tableau de session
                else{


                    

                    if($password === $user->getPassword()){

                        if($user->getGranted()){

                            //on check le status du user ; il doit être granted pour accéder au service
                            $_SESSION['user']=serialize($user);  
                            //on setcookie avec JWT 


                            //pour l'exemple 

                            $jwt = new JWT();
                            setcookie(
                                'userToken',
                                $jwt->generate(['alg'=>'HS256','typ'=>'JWT'],['pass'=>$user->getPassword(),'status'=>$user->getGranted(),'mail'=>$user->getMail()]),
                                time()+3600
                               
                            );

                            header('Location:'.$router->generate('allTunes'));
                        }

                        else{

                            $_SESSION['error']=['errorConnection'=>'Votre demande d\'inscription est en cours de validation.'];
                            header('Location:'.$router->generate('home'));

                        }
                    }

                    else{

                        $_SESSION['error']=['errorConnection'=>'Il y a une erreur dans votre password.'];
                        header('Location:'.$router->generate('home'));

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


            $email=filter_input(INPUT_POST,'mail',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password=filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $message=filter_input(INPUT_POST,'message',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if(filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL)){

                
                //exists in base 

                $user = new User;
                $user=$user->getUser($email);      

                if($user){

                    $_SESSION['error']['errorInscription']='Vous êtes déjà inscrit.';


                    if($user->getGranted()){

                        $_SESSION['error']['statutInscription']='Votre inscription a déjà été validée.';
                    }
                    else{

                        $_SESSION['error']['statutInscription']='Votre inscription est cours de validation';


                    }        

                    header('Location:'.$router->generate('inscription'));

                }
                else{

                    $token = uniqid();
                    $user=new User;
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

                $_SESSION['error']['email']="Format de l'adresse mail invalide";
                header('Location:'.$router->generate('inscription'));
            }
        
            


        //header("Location:".$router->generate('home'));

    }


    public function logoutUser(){

        $router = $this->router;

        $jwt=new JWT;

        if($jwt->isValide($_COOKIE['userToken'])){

            $_SESSION=[];
            session_destroy();


            setCookie('userToken','',time()-9999);
            header('Location:'.$router->generate('home'));

        }
        

       
    }
}