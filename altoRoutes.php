<?php

$routes=[
    ['method'=>'GET',
    'route'=>'/',
    'target'=>['method'=>'getAllTune','controller'=>'Controller'],
    'name'=>'home'],
    ['method'=>'GET',
    'route'=>'/auteurs',
    'target'=>['method'=>'getAllAuteur','controller'=>'Controller'],
    'name'=>'auteurs']
];

$basePath='/mvc2';