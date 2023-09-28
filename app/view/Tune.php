
<div class='mama-flex'>
    <div id='liste-grille'>


        <?php foreach($data as $grille):?>
            <p class='item-click' value="<?=$grille->getTitre()?>"><?= $grille->getTitre()?></p> <!--implementer une fonction rand qui affiche un cara inuktitut devant chaque item -->
            <span class='underline-item-click'></span>
            <?php endforeach?>

    </div>
    <div id='show-pdf'>
        </div>
    

</div>