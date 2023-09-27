<?php


namespace App\models;
use PDO;
use core\DataConnexion;

class User extends Model{

    protected $idUser;
    protected $mail;
    protected $pass;
    protected $granted;


    public function getPassword(){

        return $this->pass;
    }


    public function getUser(string $email):User|false{

        $pdo = DataConnexion::getDbInstance();
        $query='SELECT * FROM user WHERE mail="'.$email.'"';
        return $pdo->query($query)->fetchObject(get_class($this));
    }



    public function insertUser($mail,$pass){

        $query='INSERT INTO user(mail,pass,granted)VALUES(:mail, :pass,:granted)';
        $data=[':mail'=>$mail,':pass'=>$pass,':granted'=>0];
        $statement = ($this->pdo)->prepare($query);
        if($statement->execute($data)){

            return true;
        }

    }
}