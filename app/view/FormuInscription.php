<?php

if(!is_null($_SESSION['error'])){

    foreach($_SESSION['error'] as $key => $val){

        echo $key. ' '. $val.'</br>';
    }
}
$_SESSION['error']=[];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>
<body>

    <form method='POST'>
        <input type='mail' name='mail' placeholder='mail'>
        <input type='password' name='password' placeholder='password'>
        <textarea name='message'></textarea>
        <input type='submit'name='submit'>
    </form>
    <a href='<?=$router->generate('home')?>'>retour</a>
</body>
</html>