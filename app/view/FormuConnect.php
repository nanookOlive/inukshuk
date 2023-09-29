
<?php


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

            <a href="<?= $router->generate('inscription')?>" class='titre-fr' id='right'>nous rejoindre</a>
            <a href="<?= $router->generate('inscription')?>" class='titre-inut' id='right'>rejoindre</a>
        </div>
    </div>

    <div class='big-container'>

        
        

        <div class='right-container'>
            <div id='info-error'></div>
                <form method='POST' class='formulaire'>
                    <input type='text' name='mail' placeholder='mail'>
                    <input type='password' name='password' placeholder='password'>
                    <input type='submit' name='send' value="se connecter" id='button-send'>
                </form>   
            </div>
        </div>
        <?php require_once 'footer.php'?>
</body>

</html>