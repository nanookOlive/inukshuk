<?php


namespace App\models;

use Core\DataConnexion;

use PDO;

require_once __DIR__.'/../../core/DataConnexion.php';
// require_once __DIR__.'/../../Autoloader.php';

class Model {

    protected $table='tune';
    protected $pdo;
    // protected $call=__CLASS__;

    public function __construct(){

        $this->pdo=DataConnexion::getDbInstance();
    }

    

    
}