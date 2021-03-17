<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible.');
    
	header('Location: '.URL.'coffee.php');
	exit();
}

$errors = 0 ;

if (!empty($_POST)) {
    if (empty(trim($_POST['name'])) || empty(trim($_POST['standard'])) || empty(trim($_POST['theme']))) {
        flash_in('error', 'Merci de remplir tous les champs');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{

        $add = $pdo->prepare('INSERT INTO coffee_table (name, standard, little, big, theme) VALUES (:name, :standard, :little, :big, :theme)');
        $add->execute([
            ':name' => $_POST['name'],
            ':standard' => $_POST['standard'],
            ':little' => $_POST['little'],
            ':big' => $_POST['big'],
            ':theme' => $_POST['theme']
        ]);
       header('Location: '.URL.'coffee.php?success');
        flash_in('success', 'Tarif ajouté');
        exit();
    }
}