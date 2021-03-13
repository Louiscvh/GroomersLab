<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter une photo');
	header('Location: '.URL);
	exit();
}
$path = "admin";
$title = "Ajouter une photo"
?>
<?php require_once('../../../../public/includes/head.php')?>
    <div class="sepa__block">
        <div style="left:25%;" class="sepa --sepa1"></div>
        <div style="left:50%;" class="sepa --sepa2"></div>
        <div style="left:75%;" class="sepa --sepa3"></div>
    </div>
    <a href=""><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.png" alt=""></a>
    <div class="admin__container">
        <?php echo flash_out() ?>
        <h1><?php echo $title?></h1>
        <form method="post" action="../../core/galerie/uploadgalerie.php" enctype="multipart/form-data">
            <div>
                <a class="backArrow" href="<?php echo URL ?>">< Retour</a>
                <br>
                <label for="fichier"><img src="<?php
                    echo (!empty($_POST['datapreview'])) ? $_POST['datapreview'] : ((isset($data['file'])) ? URL . 'public/data/' . $data['file'] : URL . 'assets/img/placeholder.png') ?>" alt="couverture" id="preview" class="img-fluid border"></label>
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
                <input type="text" class="form-control" id="description" name="description">
            </div> 
            <div>
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div> 
            <div>
                <label for="auteur">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur">
            </div> 
            <button class="submit" type="submit" value="Se connecter">Envoyer</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.0/dist/locomotive-scroll.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="module" src="<?php echo URL ?>groomers_ui/src/js/admin.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>