<?php //fichier public/index.php

//on ajoute la config du site

require_once('header.php');



$images = $pdo->prepare('SELECT * FROM team ORDER BY name');
$images->execute();

$tImages = $images->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="coiffeur__container">
    <div class="coiffeurs" data-scroll data-scroll-speed="2">
        <?php foreach ($tImages as $value) : ?>
            <article class="coiffeur">
                <div class="coiffeur__cube" alt="<?= $value['description'] ?>" style=" margin-bottom:20px;background-image: url(public/data/<?= $value['file'] ?>);">
                    <div class="coiffeur__title">
                        <h3 class="coiffeur__name"><?= $value['name'] ?></h3>
                        <h2 class="coiffeur__social"><a href="<?= $value['link'] ?>" target="_blank"><?= '@'.$value['pseudo'] ?></a></h2>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['admin'])) : ?>
                    <a style="font-family: avenirregular, arial, cursive;" href="<?php echo URL ?>groomers_Barber/back/admin/effectif/updateeffectif.php?teamid=<?php echo $value['id']; ?>">Modifier</a>
                <?php endif; ?> 
            </article>
        <?php endforeach; ?> 
    </div>
</div>
<div class="scroll2">
    <div class="scroll2__container">
        <p>Scroll</p>
        <div class="scroll__sepa"></div>
    </div>
</div>

<?php
if(isset($_SESSION['admin'])){ ?>
<div class="container">
    <a class="lien add" href="<?php echo URL ?>groomers_Barber/back/admin/effectif/addeffectif.php">Ajouter un barber</a>
</div>
<?php } ?> 