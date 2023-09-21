<?php

use App\models\{Model,Grille,Auteur};

require_once __DIR__.'/../Autoloader.php';
require_once __DIR__.'/../AltoRouter.php';
require_once __DIR__.'/../Dispatcher.php';
require_once __DIR__.'/../altoRoutes.php';

Autoloader::register();

function readVarDump($arg){

    echo '<pre>';
    var_dump($arg);
    echo '</pre>'; 
}
//test alto 



//les routes sous la forme d'un tableau


//$pattern = '/^(?:[A-Z][a-zA-Z\s]*[!@#$%^&*()_+{}\[\]:;"\'<>,.?~\\/-]*)+$/';


$router=new AltoRouter($routes,$basePath);
//$router->addMatchTypes(['a'=>$pattern])
$match  = $router->match();
$dispatcher=new Dispatcher($match,'ErrorController::err404');
$dispatcher->setControllersNamespace('App\controllers');
$dispatcher->setControllersArguments($match['name'],$router);



$dispatcher->dispatch();

