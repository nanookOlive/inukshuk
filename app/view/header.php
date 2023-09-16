<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <link rel="stylesheet" href='app/view/app.css'>
    <title>Inukshuk</title>
</head>
<body>

    <header>

        <div class="top-header">
            <div class="logo-container">
                <img src='app/view/ressources/2.png' id='logo' loading='lazy'>
            </div>

            <div class="text-content">
                <div class="text-logo" id="inuktitut">iNQSQ</div>
                <div class="text-logo" id="french">Inukshuk</div>
            </div>
            <div class="nav">

            <span class='categorie-nav'>
                <p class="top-cat-nav">morceaux</p>
                <a href="<?= $router->generate('home')?>">les morceaux</a>
            </span>
            
            <span class='categorie-nav'>
                <p class="top-cat-nav">auteurs</p>
                <a href="<?=$router->generate('auteurs')?>">les auteurs</a>
            </span>

        </div>
        </div>

       
    </header>
</body>
</html>