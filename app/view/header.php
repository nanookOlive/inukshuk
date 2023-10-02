<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <link rel="stylesheet" href='/mvc2/app/view/app.css'>
    <title>Inukshuk</title>
</head>
<body>

    <header>



        <div class="top-header">
           <a href="<?= $router->generate('allTunes')?>"> <div class="logo-container">
                <img src='/mvc2/app/view/ressources/2.png' id='logo' loading='lazy'>
            </div></a>

            <div class="text-content">
                <div class="text-logo" id="inuktitut">iNQSQ</div>
                <div class="text-logo" id="french">Inukshuk</div>
            </div>
            <div class="nav">

            <span class='categorie-nav'>
                <p class="top-cat-nav">morceaux</p>
                <a href="<?= $router->generate('allTunes')?>">les morceaux</a>
            </span>
            
            <span class='categorie-nav'>
                <p class="top-cat-nav">auteurs</p>
                <a href="<?=$router->generate('auteurs')?>">les auteurs</a>
            </span>

            <span class='categorie-nav'>
                <p class="top-cat-nav">partir</p>
                <a href="<?= $router->generate('logout')?>">se déconnecter</a>

            </span>

        </div>

       
    </header>
