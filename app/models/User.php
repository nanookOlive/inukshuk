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
    public function getGranted():int{

        return $this->granted;
    }

    public function getToken():string 
    {
        return $this->token;
    }

    public function getMail():string
    {
        return $this->mail;
    }

    public function setGranted(int $status){

        $this->granted = $status;
    }
    public function getUser(string $email):User|false{

        $pdo = DataConnexion::getDbInstance();
        $query='SELECT * FROM user WHERE mail="'.$email.'"';
        return $pdo->query($query)->fetchObject(get_class($this));
    }

    public function getUserByToken(string $token):User|false
    {
        $pdo = DataConnexion::getDbInstance();
        $query='SELECT * FROM user WHERE token= :token';

        if($statement= $pdo->prepare($query)){

            if($statement->execute(array(':token'=>$token))){

                return $statement->fetchObject(get_class($this));
            }
        }
        else{

            return FALSE;
        }
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


    public function updateUser(){


        $pdo = DataConnexion::getDbInstance();
        $query = 'UPDATE user SET mail =:mail, pass=:pass, granted=:granted, token=:token WHERE idUser = :idUser';
        $data=[':idUser'=>$this->idUser,':mail'=>$this->getMail(),
        ':pass'=>$this->getPassword(),
        ':granted'=>$this->getGranted(),
        ':token'=>$this->getToken()];

        if($statement=$pdo->prepare($query)){

            if($statement->execute($data)){

                return TRUE;
            }
            
        }

    }

}