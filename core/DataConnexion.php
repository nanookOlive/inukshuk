<?php

namespace Core;
use PDO;

class DataConnexion extends PDO{


    private const DBHOST='localhost';
    private const DBNAME='inukshuk';
    private const DBUSER='nanook';
    private const DBPASS='ours';
    private static $dbInstance=null;


    private function __construct(){


        try{

            $dsn='mysql:dbhost='.self::DBHOST.';dbname='.self::DBNAME;
            self::$dbInstance = parent::__construct($dsn,self::DBUSER,self::DBPASS);
        }

        catch(PDOException $error){

            die($error->getMessage());
        }
    }

    public static function getDbInstance(){

        if(self::$dbInstance == null){

            self::$dbInstance =  new self();
        }

        return self::$dbInstance;
    }

}