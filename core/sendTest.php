<?php

require_once __DIR__.'/Utils.php';
$email = 'marie-aguillon@orange.fr';
$content='les oursons ont une petite queue';
$token=uniqid();

sendRequestInscription($email,$content,$token);