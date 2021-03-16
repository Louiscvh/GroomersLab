<?php

require_once('../../../../config/settings.php');


// Contenu de la page de connexion


if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un tarif');
	header('Location: ' .URL);
	exit();
}

$read = $pdo->prepare('SELECT * FROM hair WHERE id = :i');
$read->execute([':i' => $_GET['tarifid']]);

$data = $read->fetch(PDO::FETCH_ASSOC); 
    
$themes = executeSQL("SELECT DISTINCT theme FROM hair ORDER BY theme");
if( $themes->rowCount() > 0){
    $infos_themes = $themes->fetchAll();
}

if(isset($_GET['delete']) && !empty($_GET['tarifid'])){
    if (isset($_GET['delete']) && $_GET['delete'] == 'delhair') {
        $req = $pdo->prepare('DELETE FROM hair WHERE id = :i');
        //execute
        $req->execute([':i' => $_GET['tarifid']]);
    }
    flash_in('success', 'Supprimé');
    //redirige vers accueil
    header('Location: '.URL);
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
            <div>
                <a class="backArrow" href="<?php echo URL ?>">< Retour</a>
            </div>
            
        
            <div>
                <label for="coupe">Nom</label>
                <input type="text" class="form-control" id="coupe" name="coupe" value="<?= $data['name'] ?>">
            </div> 
            <div>
                <label for="homme">Tarif Homme</label>
                <input type="text" class="form-control" id="homme" name="homme" value="<?= $data['men'] ?>">
            </div> 
            <div>
                <label for="femme">Tarif Femme</label>
                <input type="text" class="form-control" id="femme" name="femme" value="<?= $data['women'] ?>">
            </div> 
            <div>
                <label for="enfant">Tarif Enfant</label>
                <input type="text" class="form-control" id="enfant" name="enfant" value="<?= $data['kid'] ?>">
            </div> 
            <div>
            <select name="theme" id="theme" class="sectionSelect">
                <?php foreach($infos_themes as $theme) { ?>
                    <option data-theme="<?php echo $theme['theme'] ?>" <?php if($data['theme'] == $theme['theme']) echo 'selected'; ?> ><?php echo $theme['theme'] ?></option>
                <?php } ?>
            </select>
            </div> 

            <button type="submit" class=" submit btn btn-primary">Modifier</button>

            <?php
            if(isset($_SESSION['admin'])){ ?>
                <p><a class="lien suppr" href="?delete=delhair&tarifid=<?= $data['id']; ?>">Supprimer Tarif</a></p>
            <?php } ?>
        </form>
    </div>  
    <?php require_once('../../../../public/includes/footersection.php')?>
</body>
</html>
   


