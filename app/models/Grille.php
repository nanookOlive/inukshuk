<?php

namespace App\models;
use PDO;
use core\DataConnexion;

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

        $pdo=DataConnexion::getDbInstance();
        $query='SELECT * FROM '.$this->table.';';
        return $pdo->query($query)->fetchAll(PDO::FETCH_CLASS,get_class($this));
    }

    public function getTunesByAuteur(string $id):array
    {

        $query ='SELECT idTune,titre,chemin FROM tune JOIN auteur ON tune.auteurId=auteur.id WHERE id= :id';
        $statement = $this->pdo->prepare($query);
        $statement->execute(array('id'=>$id));
        return $data=$statement->fetchAll(PDO::FETCH_CLASS,get_class($this));
    }
}