<?php

require_once('../../../../config/settings.php');


// Contenu de la page de connexion


if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un tarif');
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
    flash_in('success', 'Supprimé');
    //redirige vers accueil
    header('Location: '.URL.'coffee.php');
    exit();
}

$path = "admin";
$title = "Modifier tarif"
?>
<?php require_once('../../../../public/includes/head.php')?>
    <a href=""><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.png" alt=""></a>
    <div class="admin__container">
        <form method="post" action="../../core/tarif/updatetarif.php">
            <h1>Modifier <?= $data['name'] ?></h1>
            <?php echo flash_out() ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <a class="backArrow" href="<?php echo URL ?>/coffee.php">< Retour</a>
        
            <div>
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?>">
            </div> 
            <div>
                <label for="standard">Tarif Homme</label>
                <input type="text" class="form-control" id="standard" name="standard" value="<?= $data['standard'] ?>">
            </div> 
            <div>
                <label for="little">Tarif Femme</label>
                <input type="text" class="form-control" id="little" name="little" value="<?= $data['little'] ?>">
            </div> 
            <div>
                <label for="big">Tarif Enfant</label>
                <input type="text" class="form-control" id="big" name="big" value="<?= $data['big'] ?>">
            </div> 
            <div>
            <select name="theme" id="theme">
                <?php foreach($infos_themes as $theme) { ?>
                    <option data-theme="<?php echo $theme['theme'] ?>" <?php if($data['theme'] == $theme['theme']) echo 'selected'; ?> ><?php echo $theme['theme'] ?></option>
                <?php } ?>
            </select>
            </div> 

            <button type="submit" class="btn btn-primary">Modifier</button>

            <?php
            if(isset($_SESSION['admin'])){ ?>
                <p><a href="?delete=delprice&tarifid=<?= $data['id']; ?>">Supprimer Tarif</a></p>
            <?php } ?>
        </form>
    </div>  
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>
   


