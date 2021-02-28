<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un membre de la team Groomers');
	header('Location: '.URL.'src');
	exit();
}

$path = "admin";
$title = "Ajouter effectif"
?>
<?php require_once('../../../public/includes/head.php')?>
    <div class="sepa__block">
        <div style="left:25%;" class="sepa --sepa1"></div>
        <div style="left:50%;" class="sepa --sepa2"></div>
        <div style="left:75%;" class="sepa --sepa3"></div>
    </div>
    <div class="container">
        <h1><?php echo $title?></h1>
        <form method="post" action="../../core/effectif/uploadeffectif.php" enctype="multipart/form-data">
            <div>
                <label for="fichier">Fichier</label>
                <input type="file" class="form-control" id="fichier" name="fichier" required>
            </div> 
            <div>
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div> 
            <div>
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div> 
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div> 
            <div>
                <label for="lien">Lien</label>
                <input type="text" class="form-control" id="lien" name="lien">
            </div> 
            <button class="submit" type="submit" value="Se connecter">Envoyer</button>
        </form>
    </div>
</body>
</html>