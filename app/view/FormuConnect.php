

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='/mvc2/app/view/app.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>
    <div class='big-container'>

        <div class='left-container'>
            <img src='/mvc2/app/view/ressources/2.png'>
        </div>

        <div class='right-container'>
            <form method='POST' class='formulaire'>
                <input type='text' name='mail'>
                <input type='password' name='password'>
                <input type='submit' name='send'>
            </form>
            <a href="<?= $router->generate('inscription')?>">s'inscrire</a>
        </div>
    </div>
</body>
</html>