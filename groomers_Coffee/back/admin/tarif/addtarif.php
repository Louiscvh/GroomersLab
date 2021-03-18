<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un tarif');
	header('Location: ' .URL. '/coffee.php');
	exit();
}

$themes = executeSQL("SELECT DISTINCT theme FROM coffee_table ORDER BY theme");
if( $themes->rowCount() > 0){
    $infos_themes = $themes->fetchAll();
}

$path = "admin";
$title = "Ajouter un tarif"
?>
<?php require_once('../../../../public/includes/head.php')?>
    <a href="https://www.barbierlab.fr/"><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.webp" alt="Logo Groomers"></a>
    <div class="admin__container">
        <form method="post" action="../../core/tarif/addtarif.php">
            <h1>Ajouter un tarif</h1>
            <?php echo flash_out() ?>
            <div>
                <a class="lien backArrow" href="<?php echo URL ?>/coffee.php">< Retour</a>
            </div>
            <div class="param__section">
                <a class="lien" href="?action=choose">Selectionner Section</a>
                <a class="lien addSection" href="?action=add">Ajouter Section</a>
            </div>
            <?php if (isset($_GET['action']) && $_GET['action'] == 'choose') { ?>
            <div>
            <label for="theme">Sélectionner Section *</label>
            <select class="sectionSelect" name="theme" id="theme">
                <?php foreach($infos_themes as $theme) { ?>
                    <option data-theme="<?php echo $theme['theme'] ?>"><?php echo $theme['theme'] ?></option>
                <?php } ?>
            </select>
            </div>
            <?php } ?>
            <?php if (isset($_GET['action']) && $_GET['action'] == 'add') { ?>
            <div>
                <label for="theme">Section *</label>
                <input type="text" class="form-control" id="theme" name="theme">
            </div>
            <?php } ?>
            <div>
                <label for="name">Nom *</label>
                <input type="text" class="form-control" id="name" name="name">
            </div> 
            <div>
                <label for="standard">Tarif Standard *</label>
                <input type="number" step="0.01" class="form-control" id="standard" name="standard">
            </div> 
            <div>
                <label for="little">Tarif Petit</label>
                <input type="number" step="0.01" class="form-control" id="little" name="little">
            </div> 
            <div>
                <label for="big">Tarif Grand</label>
                <input type="number" step="0.01" class="form-control" id="big" name="big">
            </div>
            <button class="submit" type="submit" value="Se connecter">Envoyer</button>  
        </form>
    </div>  
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>