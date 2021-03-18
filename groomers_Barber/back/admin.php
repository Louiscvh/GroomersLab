<?php

require_once('../../config/settings.php');

if (isset($_SESSION['admin'])) {
    // Je suis déjà connecté
    header('location:' . URL);
    exit();
}

if(!empty($_POST)){
    // formulaire soumis
    if(empty($_POST['login']) || empty($_POST['password']) ){
        flash_in('error','Merci de remplir tous les champs');
    }
    else{

        $user = getUserByLogin($_POST['login']);
        if( $user ){
            // je l'ai trouvé
            // on vérifie le mot de passe
            if(password_verify($_POST['password'], $user['password'])){

                $_SESSION['admin'] = $user;
                flash_in('success','Connexion reussie');
                header('location:'.URL);
                exit();

            }else{
                flash_in('error','Identifiants incorrects');
            }
        }
        else{
            flash_in('error','Identifiants incorrects');
        }

    }

}

$path='admin';
$title='Connexion'

?>
<?php require_once('../../public/includes/head.php')?>
    <div class="sepa__block">
        <div class="sepa"></div>
        <div class="sepa"></div>
        <div class="sepa"></div>
    </div>
    <a href="https://www.barbierlab.fr/"><img class="logo" src="<?php echo URL ?>groomers_ui/src/img/logo_white.webp" alt="Logo Groomers"></a>
    <?php echo flash_out() ?>

    <div class="admin__container">
        <h1><?php echo $title?></h1>
        <form method="post">
            <div>
                <input type="text" class="form-control" id="login" name="login" placeholder="Identifiant">
            </div> 
            <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
            <button class="submit" type="submit" value="Se connecter">Se Connecter</button>
        </form>
        <a class="resetPassword lien" href="admin/reinitmdp.php">J'ai oublié mon mot de passe</a>

    </div>
</body>

</html>