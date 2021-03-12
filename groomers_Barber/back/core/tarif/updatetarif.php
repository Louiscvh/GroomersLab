<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible. Try again');
    
	header('Location: '.URL);
	exit();
}

$_POST = array_map('trim', $_POST);

$errors = 0 ;

if (!empty($_POST)) {
    if (empty(trim($_POST['coupe'])) || empty(trim($_POST['homme'])) || empty(trim($_POST['theme']))) {
        flash_in('error', 'Merci de remplir tous les champs');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else { //sinon
        if( empty($_POST['enfant']) )
            $_POST['enfant'] = null;

        if( empty($_POST['femme']) )
            $_POST['femme'] = null;

        if ($errors == 0) {
            $add = $pdo->prepare('UPDATE hair SET name = :name, men = :men, women = :women, kid = :kid, theme = :theme WHERE id = :i');
            $add->execute([
                ':i' => $_POST['id'],
                ':name' => $_POST['coupe'],
                ':men' => $_POST['homme'],
                ':women' => $_POST['femme'],
                ':kid' => $_POST['enfant'],
                ':theme' => $_POST['theme']
            ]);   
        }
        header('Location: '.URL.'index.php?success');
        exit();
    }
}