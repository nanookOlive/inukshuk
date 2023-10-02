<?php

$errorInscription=null;
$statutInscription=null;
$errorMail=null;


if(isset($_SESSION['error'])){
    

    if(isset($_SESSION['error']['errorInscription'])){

      $errorInscription=$_SESSION['error']['errorInscription'];
      $statutInscription=$_SESSION['error']['statutInscription'];
     
    }
    elseif(isset($_SESSION['error']['email'])){

        $errorMail=$_SESSION['error']['email'];
    }

    $_SESSION['error']=[];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='/mvc2/app/view/app.css'>

    <title>S'inscrire</title>
</head>
<body>
<body>

    <div class='top-page'>
        <div class='waou-effect'>
            <div class="titre-fr">Inukshuk</div>
            <div class='titre-inut'>iNQSQ</div>
        </div>
        <div class='waou-effect' >

            <a href="<?= $router->generate('home')?>" class='titre-fr' id='right'>retour</a>
            <a href="<?= $router->generate('home')?>" class='titre-inut' id='right'>retour</a>
        </div>
    </div>

    <div class='big-container'>

        
        

        <div class='right-container'>
            <div id='info-error'>
                <?=$errorInscription?>
                <?=$statutInscription?>
                <?=$errorMail?>
            </div>
                <form method='POST' class='formulaire'>
                
                    <input type='mail' name='mail' placeholder='votre mail' required>
                    <input type='text' name='password' placeholder='votre password' requiered>
                    <textarea name='message' placeholder='un petit message pour nanook ...' rows='5' required></textarea>
                    <input type='submit' name='send' value="envoyer" id='button-send'>
                </form>   
            </div>
        </div>
        <?php require_once 'footer.php'?>
</body>
    
        
  
</body>
</html>