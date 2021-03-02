<?php

require_once('../config/settings.php');

if (isset($_SESSION['admin'])) {
    // Je suis déjà connecté
    header('location:' . URL . 'src');
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
                header('location:'.URL.'src');
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
<?php require_once('../public/includes/head.php')?>
    <div class="sepa__block">
        <div style="left:25%;" class="sepa --sepa1"></div>
        <div style="left:50%;" class="sepa --sepa2"></div>
        <div style="left:75%;" class="sepa --sepa3"></div>
    </div>
    <div class="container">
        <img class="logo" src="" alt="">
        <h1><?php echo $title?></h1>
        <?php echo flash_out() ?>
        <form method="post">
            <div>
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login">
            </div> 
            <div>
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button class="submit" type="submit" value="Se connecter">Se Connecter</button>
        </form>
        <a href="<?php echo URL ?>back/admin/reinitmdp.php">J'ai oublié mon mot de passe</a>
    </div>
</body>

</html>