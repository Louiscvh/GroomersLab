<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible. Try again');
    
	header('Location: '.URL);
	exit();
}

$errors = 0 ;

if (!empty($_POST)) {
    if (empty(trim($_POST['coupe'])) || empty(trim($_POST['homme'])) || empty(trim($_POST['theme']))) {
        flash_in('error', 'Merci de remplir tous les champs');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{

        $add = $pdo->prepare('INSERT INTO hair (name, men, women, kid, theme) VALUES (:name, :men, :women, :kid, :theme)');
        $add->execute([
            ':name' => $_POST['coupe'],
            ':men' => $_POST['homme'],
            ':women' => $_POST['femme'],
            ':kid' => $_POST['enfant'],
            ':theme' => $_POST['theme']
        ]);
        header('Location: '.URL.'index.php?success');
        flash_in('success', 'Tarif ajouté');
        exit();
    }
}