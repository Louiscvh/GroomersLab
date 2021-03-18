<?php

require_once('../../../../config/settings.php');


// Contenu de la page de connexion


if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour modifier un tarif');
	header('Location: ' .URL. 'coffee.php');
	exit();
}

$read = $pdo->prepare('SELECT * FROM coffee_table WHERE id = :i');
$read->execute([':i' => $_GET['tarifid']]);

$data = $read->fetch(PDO::FETCH_ASSOC); 
    
$themes = executeSQL("SELECT DISTINCT theme FROM coffee_table ORDER BY theme");
if( $themes->rowCount() > 0){
    $infos_themes = $themes->fetchAll();
}

if(isset($_GET['delete']) && !empty($_GET['tarifid'])){
    if (isset($_GET['delete']) && $_GET['delete'] == 'delprice') {
        $req = $pdo->prepare('DELETE FROM coffee_table WHERE id = :i');
        //execute
        $req->execute([':i' => $_GET['tarifid']]);
    }
    flash_in('success', 'Tarif supprimé');
    //redirige vers accueil
    header('Location: '.URL.'coffee.php');
    exit();
}

$path = "admin";
$title = "Modifier : ".$data['name']
?>
<?php require_once('../../../../public/includes/head.php')?>
    <a href="https://www.barbierlab.fr/"><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.webp" alt="Logo Groomers"></a>
    <div class="admin__container modif">
        <form method="post" action="../../core/tarif/updatetarif.php">
            <h1>Modifier : <?= $data['name'] ?></h1>
            <?php echo flash_out() ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div>
                <a class="lien backArrow" href="<?php echo URL ?>/coffee.php">< Retour</a>
            </div>
            <div>
                <label for="name">Nom *</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?>">
            </div> 
            <div>
                <label for="standard">Tarif Standard *</label>
                <input type="number" step="0.01" class="form-control" id="standard" name="standard" value="<?= $data['standard'] ?>">
            </div> 
            <div>
                <label for="little">Tarif Petit</label>
                <input type="number" step="0.01" class="form-control" id="little" name="little" value="<?= $data['little'] ?>">
            </div> 
            <div>
                <label for="big">Tarif Grand</label>
                <input type="number" step="0.01" class="form-control" id="big" name="big" value="<?= $data['big'] ?>">
            </div> 
            <div>
            <label for="theme">Sélectionner Section *</label>
            <select class="sectionSelect" name="theme" id="theme">
                <?php foreach($infos_themes as $theme) { ?>
                    <option data-theme="<?php echo $theme['theme'] ?>" <?php if($data['theme'] == $theme['theme']) echo 'selected'; ?> ><?php echo $theme['theme'] ?></option>
                <?php } ?>
            </select>
            </div> 
            <div class="form__controls">
                <button type="submit" class="btn btn-primary submit">Modifier</button>
                <a class="deletegalerie lien" href="?delete=delprice&tarifid=<?= $data['id']; ?>">Supprimer Tarif</a>
            </div>        
        </form>
    </div>  
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>
   


