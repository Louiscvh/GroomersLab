<?php

require_once('../../config/settings.php');

if(!isset($_SESSION['admin'])){

	header('location:' . URL . 'src');
	exit();
}

if (isset($_POST['changemail'])) {
    // on sait que l'on traite le premier formulaire (email, coordonnées)
    if (!empty($_POST['email'])) {
        // controle de validité du format de l'email   :  nom@provider.ext
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            //Modif en base
            executeSQL("UPDATE users SET email=:email WHERE id_user=:id_user", array(
                'email' => $_POST['email'],
                'id_user' => $_SESSION['admin']['id_user']
            ));
            // Maj de la session
            $_SESSION['admin']['email'] = $_POST['email'];
            flash_in('success', "L'email a été mis à jour");
            header('location:' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            flash_in('error', "Le format de l'email est incorrect");
        }
    } else {
        flash_in('error', "Merci de renseigner l'email");
    }
}

if (isset($_POST['changemdp'])) {
    // on sait que l'on traite le deuxieme formulaire (mdp)
    if (empty(trim($_POST['mdp'])) || empty(trim($_POST['newmdp'])) || empty(trim($_POST['confirmationpassword']))) {
        flash_in('error', 'Merci de remplir tous les champs');
    } else {

        if (!password_verify($_POST['mdp'], $_SESSION['admin']['password'])) {
            flash_in('error', 'Le mot de passe est incorrect');
        } else {
            if ($_POST['newmdp'] !== $_POST['confirmationpassword']) {
                flash_in('error', 'Le nouveau mot de passe et sa confirmation ne concordent pas');
            } else {

                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[_\$\!\-\.\%])[\w\$\!\-\.\%]{8,20}$#', $_POST['newmdp'])) {
                    // OK compléxité respectée
                    $newmdp = password_hash($_POST['newmdp'], PASSWORD_DEFAULT);
                    executeSQL("UPDATE users SET password=:newmdp WHERE id_user=:id_user", array(
                        'newmdp' => $newmdp,
                        'id_user' => $_SESSION['admin']['id_user']
                    ));
                    $_SESSION['admin']['password'] = $newmdp;
                    flash_in('success', 'Le mot de passe a été mis à jour');
                    header('location:' . $_SERVER['PHP_SELF']);

                    //  ex: http://localhost/b2dev/projet/admin/gestion_articles.php?action=edit&id=13
                    // $_SERVER['PHP_SELF'] page courante ( uniquement le fichier de script ) =>  http://localhost/b2dev/projet/admin/gestion_articles.php
                    //  $_SERVER['REQUEST_URI'] url complet http://localhost/b2dev/projet/admin/gestion_articles.php?action=edit&id=13
                    
                    exit();
                } else {
                    flash_in('error', 'Le mot de passe doit comporter entre 8 et 20 caractères dont au moins 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (_$!-.%)');
                }
            }
        }
    }
}

if (isset($_POST['changeuser'])) {
    // on sait que l'on traite le premier formulaire (email, coordonnées)
    if (!empty($_POST['user'])) {

        executeSQL("UPDATE users SET login=:login WHERE id_user=:id_user", array(
            'login' => $_POST['user'],
            'id_user' => $_SESSION['admin']['id_user']
        ));

        $_SESSION['admin']['login'] = $_POST['user'];
        flash_in('success', "Le nom d'utilisateur a été mis à jour");
        header('location:' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        flash_in('error', "Merci de renseigner l'email");
    }
}

$path="admin";
$title="Paramètres";
?>
<?php require_once('../../public/includes/head.php')?>
<a href=""><img class="logo" src="../../src/img/logo_white.png" alt=""></a>

    <div class="admin__container">
        <?php echo flash_out() ?>
        <h1><?php echo $title?></h1>
        <a href="<?php echo URL ?>src">< Retour</a> 
        <div class="param__categ">
            <a class="lien" href="?action=password"></a>
            <a class="lien" href="?action=email">Changer d'email</a>
            <a class="lien" href="?action=user">Changer de nom d'utilisateur</a>
        </div>
        <?php if(isset($_SESSION['admin'])) {
            if (isset($_GET['action'])){
                if (isset($_GET['action']) && $_GET['action'] == 'email') { ?>
                    <p class="param__login">Login : <?php echo $_SESSION['admin']['login'] ?></p>
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Votre email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_POST['email'] ?? $_SESSION['admin']['email'] ?>">
                        </div>
                        <button type="submit" name="changemail" class="submit btn btn-primary">Modifier</button>
                    </form>
                <?php } ?>
                <?php if (isset($_GET['action']) && $_GET['action'] == 'password') { ?>
                    <h3>Changer le mot de passe</h3>
                    <form method="post">
                        <div class="form-group position-relative">
                            <label for="mdp">Mot de passe actuel</label> <i class="far fa-eye voirmdp"></i> <!-- <i class="far fa-eye-slash"></i>-->
                            <input type="password" class="form-control" id="mdp" name="mdp">
                        </div>
                        <div class="form-group position-relative">
                            <label for="newmpd">Nouveau mot de passe</label> <i class="far fa-eye voirmdp"></i> 
                            <input type="password" class="form-control" id="newmdp" name="newmdp">
                        </div>
                        <div class="form-group position-relative">
                            <label for="confirmationpassword">Confirmation</label> <i class="far fa-eye voirmdp"></i> 
                            <input type="password" class="form-control" id="confirmationpassword" name="confirmationpassword">
                        </div>
                        <button type="submit" name="changemdp" class="submit btn btn-primary">Modifier</button>
                    </form>
                <?php } ?>
                <?php if (isset($_GET['action']) && $_GET['action'] == 'user') { ?>
                    <h3>Changer le nom d'utilisateur</h3>
                    <form method="post">
                        <div class="form-group position-relative">
                            <label for="user">Nom d'utilisateur</label> <i class="far fa-eye voirmdp"></i> 
                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $_POST['user'] ?? $_SESSION['admin']['login'] ?>">
                        </div>
                        <button type="submit" name="changeuser" class="submit btn btn-primary">Modifier</button>
                    </form>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</body>
</html>