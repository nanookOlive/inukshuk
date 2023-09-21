

<?php foreach($data as $auteur):?>
    <a href="<?= $router->generate('byAuteur',['id'=>$auteur->getId()])?>"><?= $auteur->getAuteur()?></a>
<?php endforeach?>