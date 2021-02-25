<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter une image');
	header('Location: '.URL.'src');
	exit();
}

$read = $pdo->prepare('SELECT * FROM haircut WHERE id = :i');
$read->execute([':i' => $_GET['haircutid']]);

$data = $read->fetch(PDO::FETCH_ASSOC); 

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
        <form method="post" action="../../core/updategalerie.php" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div>
                <label for="fichier">Fichier</label>
                <input type="file" class="form-control" id="fichier" name="fichier" required>
            </div> 
            <div>
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $data['description'] ?>" required>
            </div> 
            <div>
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?= $data['title'] ?>" required>
            </div> 
            <div>
                <label for="auteur">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $data['author'] ?>" >
            </div>
            <img src="../../../public/data/<?= $data['file'] ?>" alt="<?= $data['description'] ?>">
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="deletegalerie.php?haircutid=<?= $data['id']; ?>">Supprimer</a>
        </form>
    </div>
</body>
</html>