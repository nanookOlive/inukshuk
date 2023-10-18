
<?php

$message='';

if(isset($_SESSION['inscription'])){

    $message=$_SESSION['inscription'];
}

if(isset($_SESSION['error'])){

    $error=$_SESSION['error'];

    if(isset($error['errorConnection'])){

        $error=$error['errorConnection'];
        $_SESSION['error']['errorConnection']=null;
        $_SESSION['error']=null;
    }
    else{
        $error=null;

    }
    
}
else{
    $error=null;

}

if(isset($_SESSION['user'])){

    $_SESSION['user']=null;
}

$_SESSION=[];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='/mvc2/app/view/app.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inukshuk</title>
</head>

<body>

    <div class='top-page'>
        <div class='waou-effect' id='left' >
            <div class="titre-fr">Inukshuk</div>
            <div class='titre-inut'>iNQSQ</div>
        </div>
        <div class='waou-effect' >

            <a href="<?= $router->generate('inscription')?>" class='titre-fr' id='right'>s'inscrire</a>
            <a href="<?= $router->generate('inscription')?>" class='titre-inut' id='right'>rejoindre</a>
        </div>
    </div>

    <div class='big-container'>

        
        

        <div class='right-container'>
            <div id='info-error'><?=$error?></div>
                <form method='POST' class='formulaire'>
                    <input type='text' name='mail' placeholder='mail'>
                    <input type='password' name='password' placeholder='password'>
                    <input type='submit' name='send' value="se connecter" id='button-send'>
                </form>   
            </div>
        </div>
    </div>
    <?=$message?>
        <?php require_once 'footer.php'?>
</body>

</html>