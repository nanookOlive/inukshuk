<?php


namespace App\models;

use Core\DataConnexion;

use PDO;

require_once __DIR__.'/../../core/DataConnexion.php';

class Model {

    protected $table='tune';
    protected $pdo;
    // protected $call=__CLASS__;

    public function __construct(){

        $this->pdo=DataConnexion::getDbInstance();
    }

    public function getAll():array 
    {

        $query='SELECT * FROM '.$this->table.';';
        return $data=($this->pdo)->query($query)->fetchAll(PDO::FETCH_CLASS,get_class($this));
    }
    

    
}