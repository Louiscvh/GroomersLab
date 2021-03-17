<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour modifier un membre de la team Groomers');
	header('Location: '.URL);
	exit();
}

$read = $pdo->prepare('SELECT * FROM team WHERE id = :i');
$read->execute([':i' => $_GET['teamid']]);

$data = $read->fetch(PDO::FETCH_ASSOC); 

$path = "admin";
$title = "Modifier : ".$data['name']; 
?>
<?php require_once('../../../../public/includes/head.php')?>
    <div class="sepa__block">
        <div class="sepa --sepa1"></div>
        <div class="sepa --sepa2"></div>
        <div class="sepa --sepa3"></div>
    </div>
    <a href=""><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.png" alt="Logo Groomers"></a>

    <div class="admin__container modif">
        <h1>Modifier : <?= $data['name'] ?></h1>
        <?php echo flash_out() ?>
        <form method="post" action="../../core/effectif/updateeffectif.php" enctype="multipart/form-data">

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
                <label for="nom">Nom *</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $data['name'] ?>">
            </div>
            <div>
                <label for="pseudo">Pseudo *</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $data['pseudo'] ?>">
            </div> 
            <div>
                <label for="lien">Lien</label>
                <input type="text" class="form-control" id="lien" name="lien" value="<?= $data['link'] ?>" >
            </div>
            <div class="form__controls">
                <button class="submit"type="submit" class="submit">Modifier</button>
                <a class="deletegalerie lien"href="deleteeffectif.php?teamid=<?= $data['id']; ?>">Supprimer</a>
            </div>
        </form>
    </div>
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>