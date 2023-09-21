<?php

use App\models\{Model,Grille,Auteur};
require_once __DIR__.'/Autoloader.php';


Autoloader::register();


$auteur=new Grille;
echo '<pre>';
var_dump($auteur->getTunesByAuteur('Oasis'));
echo "</pre>";