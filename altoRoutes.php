<?php

$routes=[
    ['method'=>'GET',
    'route'=>'/',
    'target'=>['method'=>'getAllTune','controller'=>'GrilleController'],
    'name'=>'home'],
    ['method'=>'GET',
    'route'=>'/auteurs',
    'target'=>['method'=>'getAllAuteur','controller'=>'GrilleController'],
    'name'=>'auteurs']
];

$basePath='/mvc2';