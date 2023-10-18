<div class='mama-flex'>
    <div id='liste-grille'>


        <?php foreach($data as $grille):?>
            <div id="<?=$grille->getTitre()?>" class='item-container'><p class='item-click' value="<?=$grille->getTitre()?>" ><?= $grille->getTitre()?></p><div class='show-pdf-mobile'></div>
            <span class='underline-item-click'></span></div>
            <?php endforeach?>
            

    </div>
    <div id='show-pdf'>
        </div>
    

</div>