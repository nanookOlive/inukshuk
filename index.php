<?php

use App\controllers\Controller;
use App\models\Model;
use App\models\Grille;
use Core\DataConnexion;

require_once 'Autoloader.php';
require_once 'core/DataConnexion.php';
require_once 'AltoRouter.php';
require_once'Dispatcher.php';
Autoloader::register();


//test alto 

$router=new AltoRouter();
$_SERVER['BASE_URI']='/mvc2';
$router->setBasePath($_SERVER['BASE_URI']);
$router->map('GET','/',['method'=>'miaou','controller'=>'Controller'],'home');
$router->map('GET','/chien',['method'=>'ouaf','controller'=>'Controller'],'chien');

$match=$router->match();
$dispatcher=new Dispatcher($match,'SAUCISSE');
$dispatcher->setControllersNamespace('App\controllers');
$dispatcher->dispatch();

?>

<!Doctype html>

<a href=<?=$router->generate('chien')?>>ouaf</a>