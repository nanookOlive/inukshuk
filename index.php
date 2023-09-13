<?php

use App\controllers\Controller;
use App\models\Model;
use App\models\Grille;
use Core\DataConnexion;

require_once 'Autoloader.php';
require_once 'core/DataConnexion.php';
require_once 'AltoRouter.php';
Autoloader::register();

$grilles= new Grille;

$grilles=$grilles->getAll();