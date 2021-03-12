<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un tarif');
	header('Location: tarif.php');
	exit();
}

$themes = executeSQL("SELECT DISTINCT theme FROM hair ORDER BY theme");
if( $themes->rowCount() > 0){
    $infos_themes = $themes->fetchAll();
}

$path = "admin";
$title = "Ajouter un tarif"
?>
<?php require_once('../../../public/includes/head.php')?>
    <a href=""><img class="logo" src="../../../src/img/logo_white.png" alt=""></a>
    <div class="admin__container">
        <form method="post" action="../../core/tarif/addtarif.php">
            <h1>Ajouter un tarif :</h1>
            <?php echo flash_out() ?>
            <a href="<?php echo URL ?>src">< Retour</a>
            <div>
                <label for="coupe">Nom</label>
                <input type="text" class="form-control" id="coupe" name="coupe">
            </div> 
            <div>
                <label for="homme">Tarif Homme</label>
                <input type="text" class="form-control" id="homme" name="homme">
            </div> 
            <div>
                <label for="femme">Tarif Femme</label>
                <input type="text" class="form-control" id="femme" name="femme">
            </div> 
            <div>
                <label for="enfant">Tarif Enfant</label>
                <input type="text" class="form-control" id="enfant" name="enfant">
            </div>
            <div>
                <p>Selectionnez une section</p>
                <select name="choose" id="theme">
                <?php foreach($infos_themes as $theme) { ?>
                        <option data-theme="<?php echo $theme['theme'] ?>"><?php echo $theme['theme'] ?></option>
                    <?php } ?>
                    <option value="ajouter">Ajouter</option>
                    <?php if( isset($_POST['choose'] ))
                         if( $_POST['choose'] === "mango" ) {?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
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