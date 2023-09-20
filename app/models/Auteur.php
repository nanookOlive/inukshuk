<?php 

namespace App\models;
use PDO;

class Auteur extends Model{

    protected $table='tune';
    protected $auteur;


    public function getAuteur():string 
    {
        return $this->auteur;
    }
    public function getAll():array{

        $query='SELECT DISTINCT auteur FROM '.$this->table;
        return $data=($this->pdo)->query($query)->fetchAll(PDO::FETCH_CLASS,get_class($this));

    }
    
}