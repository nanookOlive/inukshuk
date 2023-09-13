<?php

namespace App\models;
use PDO;

class Grille extends Model {


    protected $table='tune';
    private $titre;
    protected $class;
    protected $idTune;



    public function getTitre(){

        return $this->titre;
    }

    public function getId(){

        return $this->idTune;
    }

    
}