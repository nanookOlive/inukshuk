
<div class='list-auteur'>
<?php foreach($data as $auteur):?>
    <a href="<?= $router->generate('byAuteur',['id'=>$auteur->getId()])?>" class='auteur-click'><?= $auteur->getAuteur()?></a>
<?php endforeach?>
</div>