<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un membre de la team Groomers');
	header('Location: '.URL);
	exit();
}

$path = "admin";
$title = "Ajouter un barber"
?>
<?php require_once('../../../../public/includes/head.php')?>
    <div class="sepa__block">
        <div class="sepa"></div>
        <div class="sepa"></div>
        <div class="sepa"></div>
    </div>
    <a href=""><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.png" alt="Logo Groomers"></a>

    <div class="admin__container">
        <h1><?php echo $title?></h1>
        <?php echo flash_out() ?>
        <form method="post" action="../../core/effectif/uploadeffectif.php" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="description" name="description">
            </div> 
            <div>
                <label for="nom">Nom *</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div> 
            <div>
                <label for="pseudo">Pseudo *</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div> 
            <div>
                <label for="lien">Lien</label>
                <input type="text" class="form-control" id="lien" name="lien">
            </div> 
            <button class="submit" type="submit" value="Se connecter">Envoyer</button>
        </form>
    </div>
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>