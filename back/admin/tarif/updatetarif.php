<?php

require_once('../../../config/settings.php');


// Contenu de la page de connexion


if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être connecté pour ajouter un tarif');
	header('Location: tarif.php');
	exit();
}

$read = $pdo->prepare('SELECT * FROM hair WHERE id = :i');
$read->execute([':i' => $_GET['tarifid']]);

$data = $read->fetch(PDO::FETCH_ASSOC); 
    


if(isset($_GET['delete']) && !empty($_GET['tarifid'])){
    if (isset($_GET['delete']) && $_GET['delete'] == 'delhair') {
        $req = $pdo->prepare('DELETE FROM hair WHERE id = :i');
        //execute
        $req->execute([':i' => $_GET['tarifid']]);
    }
    flash_in('success', 'Supprimé');
    //redirige vers accueil
    header('Location: '.URL.'src');
    exit();
}

$path = "admin";
$title = "Modifier tarif"
?>
<?php require_once('../../../public/includes/head.php')?>
    <a href=""><img class="logo" src="../../../src/img/logo_white.png" alt=""></a>
    <div class="admin__container">
        <form method="post" action="../../core/tarif/updatetarif.php">
            <h1>Modifier <?= $data['name'] ?> :</h1>
            <?php echo flash_out() ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <a href="<?php echo URL ?>src">< Retour</a>
        
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
                <label for="theme">Section</label>
                <input type="text" class="form-control" id="theme" name="theme" value="<?= $data['theme'] ?>">
            </div> 

            <button type="submit" class="btn btn-primary">Modifier</button>

            <?php
            if(isset($_SESSION['admin'])){ ?>
                <p><a href="?delete=delhair&tarifid=<?= $data['id']; ?>">Supprimer Hair</a></p>
            <?php } ?>
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
   


