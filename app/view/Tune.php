<div class='mama-flex'>
    <div id='liste-grille'>
        <?php foreach($data as $grille):?>
            <p class='item-click'><?= $grille->getTitre()?></p> <!--implementer une fonction rand qui affiche un cara inuktitut devant chaque item -->
            <span class='underline-item-click'></span>
            <?php endforeach?>

    </div>
    <div class='show-pdf'>
        <iframe  src='app/view/ressources/pdf.pdf' width='500px' height='700px' ></iframe>
        </div>
    

</div>