<?php

require_once('../../../config/settings.php');



if(empty($_POST) || !isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible. Try again');
    
	header('Location: '.URL.'src');
	exit();
}

$error = false;
$_POST = array_map('trim', $_POST);

if(!empty($_FILES['fichier']['name']) || !empty($_POST['datapreview'])){

	
	$modify = executeSQL("SELECT * FROM haircut WHERE id=:id", array('id' => $_POST['id']));


	if ($modify->rowCount() == 1) {

		// Suppression de la photo
		$infos = $modify->fetch();
		$couverture = $infos['file'];
		$chemin = $_SERVER['DOCUMENT_ROOT'] . URL . 'public/data/';
		if (!empty($couverture) && file_exists($chemin . $couverture)) {
			// Supprime le fichier
			unlink($chemin . $couverture);
		}
	}
}

$errors = 0 ;
if ($errors == 0) {
	
	require_once('../imagesettings.php');
	

	if( empty($_POST['description']) ){
		$_POST['description'] = null;
	}
	if( empty($_POST['auteur']) ){
		$_POST['auteur'] = null;
	}
	if($errors == 0){
		$add = $pdo->prepare('UPDATE haircut SET file = :file, description = :description, title = :title, author = :author WHERE id = :id');
		$add->execute([
			':id' => $_POST['id'],
			':file' => $nomfichier,
			':description' => $_POST['description'],
			':title' => $_POST['titre'],
			':author' => $_POST['auteur']
		]);

		header('Location: '.URL.'src/index.php?success');
		exit();
	}
}