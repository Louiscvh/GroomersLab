<?php //fichier public/index.php

//on ajoute la config du site

require_once('header.php');



$images = $pdo->prepare('SELECT * FROM coffee_gallery ORDER BY title');
$images->execute();

$tImages = $images->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="coif__container">
    <?php foreach ($tImages as $value) { ?>
        <div class="coif__block">
            <img data-scroll data-scroll-speed="1.5" src="<?php echo URL . 'public/data/' . $value['file'] ?>" alt="<?= $value['description'] ?>">
            <h4><?= $value['title'] ?></h4>
            <p>Made by <?= $value['author'] ?></p>
            <?php
            if(isset($_SESSION['admin'])){ ?>
                <a href="<?php echo URL ?>groomers_Coffee/back/admin/galerie/updategalerie.php?galerieid=<?php echo $value['id']; ?>">Modifier</a>
            <?php } ?> 
        </div>
    <?php } ?>
</div>
<?php
if(isset($_SESSION['admin'])){ ?>
        <a class="lien add"href="<?php echo URL ?>groomers_Coffee/back/admin/galerie/addgalerie.php">Ajouter une photo</a>
<?php } ?> 