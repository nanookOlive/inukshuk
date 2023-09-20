<?php

$routes=[
    ['method'=>'GET',
    'route'=>'/',
    'target'=>['method'=>'getAllTune','controller'=>'GrilleController'],
    'name'=>'home'],
    ['method'=>'GET',
    'route'=>'/auteurs',
    'target'=>['method'=>'getAllAuteur','controller'=>'AuteurController'],
    'name'=>'auteurs']
];

$basePath='/mvc2';