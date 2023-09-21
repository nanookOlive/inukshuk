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

    public function getTunesByAuteur(string $id):array
    {

        $query ='SELECT idTune,titre,chemin FROM tune JOIN auteur ON tune.auteurId=auteur.id WHERE id= :id';
        $statement = $this->pdo->prepare($query);
        $statement->execute(array('id'=>$id));
        return $data=$statement->fetchAll(PDO::FETCH_CLASS,get_class($this));
    }
}