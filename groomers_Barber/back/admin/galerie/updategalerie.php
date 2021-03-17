<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour modifier une image');
	header('Location: '.URL);
	exit();
}

$read = $pdo->prepare('SELECT * FROM haircut WHERE id = :i');
$read->execute([':i' => $_GET['haircutid']]);

$data = $read->fetch(PDO::FETCH_ASSOC); 

$path = "admin";
$title = "Modifier : ".$data['title']
?>
<?php require_once('../../../../public/includes/head.php')?>
    <div class="sepa__block">
        <div class="sepa"></div>
        <div class="sepa"></div>
        <div class="sepa"></div>
    </div>
    <a href=""><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.png" alt="Logo Groomers"></a>

    <div class="admin__container modif">
        <h1>Modifier : <?= $data['title'] ?></h1>
        <?php echo flash_out() ?>
        <form method="post" action="../../core/galerie/updategalerie.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div>
                <a class="lien backArrow" href="<?php echo URL ?>">< Retour</a>
            </div>
            <div>
                <br>
                <label for="fichier"><img src="<?php
                    echo (!empty($_POST['datapreview'])) ? $_POST['datapreview'] : ((isset($data['file'])) ? URL . 'public/data/' . $data['file'] : URL . 'groomers_ui/src/img/placeholder_barber.png') ?>" alt="couverture" id="preview" class="img-fluid border"></label>
                <br>
                <label for="">Photo *</label>
                <input type="file" id="fichier" name="fichier" class="form-control" accept="image/jpeg,image/png,image/webp">
                <input type="hidden" name="datapreview" id="datapreview" value="<?php echo $_POST['datapreview'] ?? '' ?>">
            
                <?php
                if (isset($data['file'])) {
                ?>
                    <input type="hidden" name="couverture_actuelle" value="<?php echo $data["file"] ?>">
                <?php
                }
                ?>
            </div> 
            
            <div>
                <label for="description">Description *</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $data['description'] ?>">
            </div> 
            <div>
                <label for="titre">Titre *</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?= $data['title'] ?>">
            </div> 
            <div>
                <label for="auteur">Auteur *</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $data['author'] ?>" >
            </div>
            <div class="form__controls">
                <button type="submit" class="btn btn-primary submit">Modifier</button>
                <a class="deletegalerie lien" href="deletegalerie.php?haircutid=<?= $data['id']; ?>">Supprimer</a>
            </div>
        </form>
    </div>
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>