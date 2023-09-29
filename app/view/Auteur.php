

<div class='mama-flex'>

    <div id='liste-grille'>


        <?php foreach($data as $auteur):?>
            <a href="<?= $router->generate('byAuteur',['id'=>$auteur->getId()])?>" class='auteur-click'><?=$auteur->getAuteur()?></a>
            <span class='underline-item-click'></span>
            <?php endforeach?>

    </div>
    
    

</div>