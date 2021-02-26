<?php //fichier public/index.php

//on ajoute la config du site
require_once('../config/settings.php');

require_once('header.php');



$images = $pdo->prepare('SELECT * FROM haircut');
$images->execute();

$tImages = $images->fetchAll(PDO::FETCH_ASSOC);

?>



<main>
    <div class="coiffeur__container">
        <div class="coiffeurs">
        <div class="coiffeur" style="margin-left:50%;">
            <div class="coiffeur__cube" style="background-image: url(img/coiffeur_1.jpg);">
            <div class="coiffeur__title">
                <h3 class="coiffeur__name">Justin K.AK Mat</h3>
                <h2 class="coiffeur__social">@JustinK</h2>
            </div>
            </div>
        </div>
        <div class="coiffeur">
            <div class="coiffeur__cube" style="background-image: url(img/coiffeur_2.jpg);">
                <div class="coiffeur__title">
                <h3 class="coiffeur__name">Justin K.AK Mat</h3>
                <h2 class="coiffeur__social">@JustinK</h2>
                </div>
            </div>
            </div>
        </div>
    </div>            
        <div class="slider">
        <div class="slider__progress">
        </div>
    </div>
</main>

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