<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible.');
    
	header('Location: '.URL.'/coffee.php');
	exit();
}

$_POST = array_map('trim', $_POST);

$errors = 0 ;

if (!empty($_POST)) {
    if (empty(trim($_POST['name'])) || empty(trim($_POST['standard'])) || empty(trim($_POST['theme']))) {
        flash_in('error', 'Merci de remplir tous les champs');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else { //sinon
        if( empty($_POST['little']) )
            $_POST['little'] = null;

        if( empty($_POST['big']) )
            $_POST['big'] = null;

        if ($errors == 0) {
            $add = $pdo->prepare('UPDATE coffee_table SET name = :name, standard = :standard, little = :little, big = :big, theme = :theme WHERE id = :i');
            $add->execute([
                ':i' => $_POST['id'],
                ':name' => $_POST['name'],
                ':standard' => $_POST['standard'],
                ':little' => $_POST['little'],
                ':big' => $_POST['big'],
                ':theme' => $_POST['theme']
            ]);   
        }
        header('Location: '.URL.'coffee.php?success');
        flash_in('success', 'Tarfi modifié');
        exit();
    }
}