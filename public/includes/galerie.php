<?php //fichier public/index.php

//on ajoute la config du site
require_once('../config/settings.php');

require_once('header.php');



$images = $pdo->prepare('SELECT * FROM haircut');
$images->execute();

$tImages = $images->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="coif__container">
    <?php foreach ($tImages as $value) { ?>
        <div class="coif__block">
            <img src="../public/data/<?= $value['file'] ?>" alt="<?= $value['description'] ?>">
            <h4><?= $value['title'] ?></h4>
            <p>Made by <?= $value['author'] ?></p>
            <?php
            if(isset($_SESSION['admin'])){ ?>
                <a href="../back/admin/galerie/updategalerie.php?haircutid=<?php echo $value['id']; ?>">Modifier</a>
            <?php } ?> 
        </div>
    <?php } ?>
</div>
<?php
if(isset($_SESSION['admin'])){ ?>
        <a href="../back/admin/galerie/addgalerie.php">Ajouter une photo</a>
<?php } ?> 