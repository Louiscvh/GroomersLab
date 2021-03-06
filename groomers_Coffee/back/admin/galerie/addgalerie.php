<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter une photo');
	header('Location: '.URL. '/coffee.php');
	exit();
}
$path = "admin";
$title = "Ajouter une photo"
?>
<?php require_once('../../../../public/includes/head.php')?>
    <div class="sepa__block">
        <div class="sepa"></div>
        <div class="sepa"></div>
        <div class="sepa"></div>
    </div>
    <a href="https://www.barbierlab.fr/"><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.webp" alt="Logo Groomers"></a>
    <div class="admin__container">
        <?php echo flash_out() ?>
        <h1><?php echo $title?></h1>
        <form method="post" action="../../core/galerie/uploadgalerie.php" enctype="multipart/form-data">
            <div>
                <a class="lien backArrow" href="<?php echo URL ?>/coffee.php">< Retour</a>
            </div>
            <div>
                <br>
                <label for="fichier"><img src="<?php
                    echo (!empty($_POST['datapreview'])) ? $_POST['datapreview'] : ((isset($data['file'])) ? URL . 'public/data/' . $data['file'] : URL . 'groomers_ui/src/img/placeholder_barber.webp') ?>" alt="couverture" id="preview" class="img-fluid border"></label>
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
                <input type="text" class="form-control" id="description" name="description">
            </div> 
            <div>
                <label for="titre">Titre *</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div> 
            <div>
                <label for="auteur">Auteur *</label>
                <input type="text" class="form-control" id="auteur" name="auteur">
            </div> 
            <button class="submit" type="submit" value="Se connecter">Envoyer</button>
        </form>
    </div>
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>