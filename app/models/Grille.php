<?php

namespace App\models;
use PDO;

class Grille extends Model {


    protected $table='tune';
    private $titre;
    protected $class;
    protected $idTune;
    protected $auteur;
    protected $contributeur;
    

    public  function getTitre(){

        return $this->titre;
    }

    public function getId(){

        return $this->idTune;
    }

    public function getAuteur():string 
    {
        return $this->auteur;
        
    }
    public function getChemin():string 
    {
        return $this->contributeur;
    }

    public function getAll():array 
    {

        $query='SELECT * FROM '.$this->table.';';
        return $data=($this->pdo)->query($query)->fetchAll(PDO::FETCH_CLASS,get_class($this));
    }
}