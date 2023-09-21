<?php 

namespace App\models;
use PDO;

class Auteur extends Model{

    protected $table='tune';
    protected $nomAuteur;
    protected $id;

    public function getId():int 
    {
        return $this->id;
    }

    public function getAuteur():string 
    {
        return $this->nomAuteur;
    }
    
    public function getAll():array
    {

        $data=[];
        $stat=($this->pdo)->query('select  id,nomAuteur from auteur order by nomAuteur');
        return $stat->fetchAll(PDO::FETCH_CLASS,get_class($this));

            
        
        
    }
    
}