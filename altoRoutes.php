<?php

$routes=[

    ['method'=>'GET',
    'route'=>'/',
    'target'=>['method'=>'connect','controller'=>'UserController'],
    'name'=>'home'],
    ['method'=>'POST',
    'route'=>'/',
    'target'=>['method'=>'verify','controller'=>'UserController'],
    'name'=>'user-connect'],
    ['method'=>'GET',
    'route'=>"/inscription",
    'target'=>["method"=>'inscription','controller'=>'UserController'],
    'name'=>'inscription'],
    ['method'=>'POST',
    'route'=>'/inscription',
    'target'=>['method'=>'sendInscription','controller'=>'UserController'],
    'name'=>'sendInscription'],
    ['method'=>'GET',
    'route'=>'/allTunes',
    'target'=>['method'=>'getAllTune','controller'=>'GrilleController'],
    'name'=>'allTunes'],
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