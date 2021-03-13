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
    <a href=""><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.png" alt=""></a>
    <div class="admin__container">
        <form method="post" action="../../core/tarif/addtarif.php">
            <h1>Ajouter un tarif</h1>
            <?php echo flash_out() ?>
            <a class="backArrow" href="<?php echo URL ?>/coffee.php">< Retour</a>
            <div class="param__section">
                <a class="lien" href="?action=choose">Selectionner Section</a>
                <a class="lien" href="?action=add">Ajouter Section</a>
            </div>
            <div>
                <?php if (isset($_GET['action']) && $_GET['action'] == 'choose') { ?>
                    <select name="theme" id="theme">
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
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name">
            </div> 
            <div>
                <label for="standard">Standard</label>
                <input type="text" class="form-control" id="standard" name="standard">
            </div> 
            <div>
                <label for="little">Petit</label>
                <input type="text" class="form-control" id="little" name="little">
            </div> 
            <div>
                <label for="big">Grand</label>
                <input type="text" class="form-control" id="big" name="big">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>  
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>