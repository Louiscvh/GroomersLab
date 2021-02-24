<?php 

require_once('../../config/settings.php');


if(isset($_SESSION['admin'])){

	header('location:' . URL . 'src');
	exit();
}

//Contrôles
if(!empty($_GET['email']) && !empty($_GET['token'])){
    $user = executeSQL('SELECT * FROM users WHERE email=:email AND token=:token AND expiration>:expiration', array(
        'email' => $_GET['email'],
        'token' => $_GET['token'],
        'expiration' => time()
    ));
    if($user->rowCount() == 0){
        flash_in('error','Le lien utilisé est invalide ou a expiré');
        header('Location:' . URL . 'back/admin.php');
        exit();
    }
    else{
        $infosUser = $user->fetch();
    }
}
else{
    flash_in('error','ce lien est invalide');
    header('Location:' . URL . 'back/admin.php');
    exit();
}

//En plaçant le traitement du post ici, je profite des controles précèdents pour vérifier  que j'ai toujours affaire à un lien valide( email, token et expiration non atteinte)

if(!empty($_POST)){
    if(!empty($_POST['newmdp']) && !empty($_POST['confirmation'])){
        if( $_POST['newmdp'] === $_POST['confirmation']){
            //les deux champs sont remplis et identiques
            executeSQL("UPDATE users SET password=:newmdp, token=NULL WHERE id_user=:id_user", array(
                'newmdp' => password_hash($_POST['newmdp'],PASSWORD_DEFAULT),
                'id_user' => $_POST['id_user']
            ));
            flash_in('success','le mot de passe a été changé avec succés');
            header('Location:'.URL.'back/admin.php');
            exit();
        }   
        else{
            flash_in('error','Le nouveau mot de passe et la confirmation ne concordent pas');
        }
    }
    else{
        flash_in('error','Merci de remplir tous les champs');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <link rel="stylesheet" href="../../src/css/admin.css">
</head>
<body>
    <div class="sepa__block">
        <div style="left:25%;" class="sepa --sepa1"></div>
        <div style="left:50%;" class="sepa --sepa2"></div>
        <div style="left:75%;" class="sepa --sepa3"></div>
    </div>
    <div class="container">
        <h1>Réinitialiser votre mot de passe</h1>
        <hr>
        <?php echo flash_out() ?>
        <form method="post">
            <input type="hidden" name="id_user" value="<?php echo $infosUser['id_user'] ?>">
            <div class="form-group">
                <label for="newmdp">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="newmdp" name="newmdp">
            </div>
            <div class="form-group">
                <label for="confirmation">Confirmation</label>
                <input type="password" class="form-control" id="confirmation" name="confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Valider la modification du mot de passe</button> 
        </form>
    </div>
</body>
</html>