<?php


namespace App\models;
use PDO;
use core\DataConnexion;

class User extends Model{

    protected $idUser;
    protected $mail;
    protected $pass;
    protected $granted;
    private $token;


    public function getPassword():string{

        return $this->pass;
    }
    public function getGranted():bool{

        return $this->granted;
    }

    public function getToken():string 
    {
        return $this->token;
    }
    public function getUser(string $email):User|false{

        $pdo = DataConnexion::getDbInstance();
        $query='SELECT * FROM user WHERE mail="'.$email.'"';
        return $pdo->query($query)->fetchObject(get_class($this));
    }



    public function insertUser($mail,$pass,string $token=null){

        $pdo = DataConnexion::getDbInstance();

        $query='INSERT INTO user(mail,pass,granted,token)VALUES(:mail, :pass,:granted,:token)';
        $data=[':mail'=>$mail,':pass'=>$pass,':granted'=>0,':token'=>$token];
        $statement = $pdo->prepare($query);
        if($statement->execute($data)){

            return true;
        }

    }
}