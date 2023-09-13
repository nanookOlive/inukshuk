<?php

namespace App\models;
use PDO;

class Grille extends Model {


    protected $table='tune';
    private $titre;
    protected $class;



    public function getTitre(){

        return $this->titre();
    }

    public function getAll():array 
    {

        $query='SELECT * FROM '.$this->table.';';
        return $data=($this->pdo)->query($query)->fetchAll(PDO::FETCH_CLASS,'Grille');
    }
}