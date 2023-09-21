<?php

$routes=[
    ['method'=>'GET',
    'route'=>'/',
    'target'=>['method'=>'getAllTune','controller'=>'GrilleController'],
    'name'=>'home'],
    ['method'=>'GET',
    'route'=>'/auteurs',
    'target'=>['method'=>'getAllAuteur','controller'=>'AuteurController'],
    'name'=>'auteurs'],
    ['method'=>'GET',
    'route'=>'/byAuteur/[a:id]',
    'target' =>['method'=>'getAllByAuteur','controller'=>'GrilleController'],
    'name'=>'byAuteur']

];

$basePath='/mvc2';