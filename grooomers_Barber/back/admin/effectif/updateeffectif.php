<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour modifier un membre de la team Groomers');
	header('Location: '.URL.'src');
	exit();
}

$read = $pdo->prepare('SELECT * FROM team WHERE id = :i');
$read->execute([':i' => $_GET['teamid']]);

$data = $read->fetch(PDO::FETCH_ASSOC); 

$path = "admin";
$title = "Modifier effectif"
?>
<?php require_once('../../../public/includes/head.php')?>
    <div class="sepa__block">
        <div class="sepa --sepa1"></div>
        <div class="sepa --sepa2"></div>
        <div class="sepa --sepa3"></div>
    </div>
    <a href=""><img class="logo" src="../../../src/img/logo_white.png" alt=""></a>

    <div class="admin__container">
        <h1><?php echo $title?></h1>
        <?php echo flash_out() ?>
        <form method="post" action="../../core/effectif/updateeffectif.php" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div style="display: flex;flex-direction: column;">
                <a class="backArrow" href="<?php echo URL ?>src">< Retour</a>
                <img src="<?php
                    echo (!empty($_POST['datapreview'])) ? $_POST['datapreview'] : ((isset($data['file'])) ? URL . 'public/data/' . $data['file'] : URL . 'assets/img/placeholder.png') ?>" alt="couverture" id="preview" class="img-fluid border"></label>
                <label for="fichier">Photo</label>
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
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $data['description'] ?>">
            </div> 
            <div>
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $data['name'] ?>">
            </div>
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $data['pseudo'] ?>">
            </div> 
            <div>
                <label for="lien">Lien</label>
                <input type="text" class="form-control" id="lien" name="lien" value="<?= $data['link'] ?>" >
            </div> 
            <button class="submit"type="submit" class="btn btn-primary">Modifier</button>
            <a class="lien suppr"href="deleteeffectif.php?teamid=<?= $data['id']; ?>">Supprimer</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.0/dist/locomotive-scroll.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="module" src="<?php echo URL ?>src/js/admin.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>