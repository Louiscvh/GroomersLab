<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un tarif');
	header('Location: ' .URL);
	exit();
}

$themes = executeSQL("SELECT DISTINCT theme FROM hair ORDER BY theme");
if( $themes->rowCount() > 0){
    $infos_themes = $themes->fetchAll();
}

$path = "admin";
$title = "Ajouter un tarif"
?>
<?php require_once('../../../../public/includes/head.php')?>
    <a href=""><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.png" alt=""></a>
    <div class="admin__container">
        <form method="post" action="../../core/tarif/addtarif.php">
            <h1>Ajouter un tarif</h1>
            <?php echo flash_out() ?>
            <div>
                <a class="lien backArrow" href="<?php echo URL ?>">< Retour</a>
            </div>
            <div class="param__section">
                <a class="lien" href="?action=choose">Selectionner Section</a>
                <a class="lien addSection" href="?action=add">Ajouter Section</a>
            </div>
            <div>
                <?php if (isset($_GET['action']) && $_GET['action'] == 'choose') { ?>
                    <label for="theme">Sélectionner Section</label>
                    <select class="sectionSelect" name="theme" id="theme">
                        <?php foreach($infos_themes as $theme) { ?>
                            <option data-theme="<?php echo $theme['theme'] ?>"><?php echo $theme['theme'] ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>
            <div>
                <?php if (isset($_GET['action']) && $_GET['action'] == 'add') { ?>
                    <label for="theme">Section</label>
                    <input type="text" class="form-control" id="theme" name="theme">
                <?php } ?>
            </div>
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
            <button type="submit" class="submit btn btn-primary">Modifier</button>
        </form>
    </div>  
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>