<?php

require_once('../../config/settings.php');

if(isset($_SESSION['admin'])){

	header('location:' . URL . 'src');
	exit();
}

if ( !empty($_POST)){
    if(!empty($_POST['email'])){
        //vérifier le format de l'email
        if( filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //validité du format de l'email
            $user = executeSQL("SELECT * FROM users WHERE email=:email",array(
                'email' => $_POST['email']
            ));
            if( $user->rowCount() > 0){
                $infosUser = $user->fetch();
                $destinataire = $infosUser['email'];
                $expiration = time() + 30 * 60; //J'ajoute 30 minutes à partir de maintenant
                $token = uniqid() . uniqid() . uniqid();
                executeSQL("UPDATE users SET token=:token, expiration=:expiration WHERE id_user=:id_user",array(
                    'token' => $token,
                    'expiration' => $expiration,
                    'id_user' => $infosUser['id_user']
                ));
                $lien = 'http://localhost' . URL . 'back/admin/validreinit.php?email=' . $infosUser['email'] . '&token=' . $token;
                echo $lien;

                $message ='<p>Bonjour'.$infosUser['login'].'<br>
                Voici le lien à suivre afin de réinitialiser votre mot de passe. Ce lien est valide 30 minutes. Ne tardez pas !<p br>
                <a href="'.$lien.'">'.$lien.'</a>
                <br>
                A bientot sur notre site</p>';
                $headers[] = 'MIME-Version:1.0';
                $headers[] = 'Content-type:text/html; charset=iso-8859-1';
                $headers[] = 'From: noreply@notresite.com';
                $sujet = '[Groomers] Demande de réinitialisation de mot de passe';
                mail($infosUser['email'],$sujet,$message,implode(PHP_EOL,$headers));
            }
            flash_in('success','Si cette adresse est trouvée dans notre base, un email vous permettant de réinitialiser votre mot de passe vous sera envoyé dans quelques instants');
            header('Location:'.URL.'back/admin.php');
            exit();
        }
        else{
            flash_in('error','Adresse mail invalide');
        }
    }
    else{
        flash_in('error','Merci de renseigner votre adresse');
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
        <h1>Demande de réinitialisation de mot de passe</h1>
        <hr>
        <p>Merci de renseigner l'adresse mail avec laquelle vous êtes inscrit(e) sur ce site</p>
        <?php echo flash_out() ?>
        <form method="post">
            <div class="form-group">
                <label for="email">Adresse mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="<?php echo URL ?>back/admin.php" class="btn btn-warning">Retour</a>
        </form>
    </div>
</body>
</html>