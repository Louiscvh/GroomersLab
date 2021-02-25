<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter une photo');
	header('Location: '.URL.'src');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une photo</title>
    <link rel="stylesheet" href="../../../src/css/admin.css">
</head>
<body>
    <div class="sepa__block">
        <div style="left:25%;" class="sepa --sepa1"></div>
        <div style="left:50%;" class="sepa --sepa2"></div>
        <div style="left:75%;" class="sepa --sepa3"></div>
    </div>
    <div class="container">
        <img class="logo" src="" alt="">
        <h1>Ajouter une photo</h1>
        <form method="post" action="../../core/uploadgalerie.php" enctype="multipart/form-data">
            <div>
                <label for="fichier">Fichier</label>
                <input type="file" class="form-control" id="fichier" name="fichier" required>
            </div> 
            <div>
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div> 
            <div>
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div> 
            <div>
                <label for="auteur">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" >
            </div> 
            <button class="submit" type="submit" value="Se connecter">Envoyer</button>
        </form>
    </div>
</body>
</html>