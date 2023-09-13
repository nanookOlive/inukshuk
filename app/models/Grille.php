<?php

namespace App\models;
use PDO;

class Grille extends Model {


    protected $table='tune';
    private $titre;
    protected $class;



    public function getTitre(){

        return $this->titre;
    }

    
}