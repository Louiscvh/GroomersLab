<?php

require_once('../../../../config/settings.php');

$_POST = array_map('trim', $_POST);

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible.');
    
	header('Location: '.URL. '/coffee.php');
	exit();
}

$error = false;
$_POST = array_map('trim', $_POST);

if(!empty($_FILES['fichier']['name']) || !empty($_POST['datapreview'])){

	
	$modify = executeSQL("SELECT * FROM coffee_gallery WHERE id=:id", array('id' => $_POST['id']));


	if ($modify->rowCount() == 1) {

		// Suppression de la photo
		$infos = $modify->fetch();
		$couverture = $infos['file'];
		$chemin = $_SERVER['DOCUMENT_ROOT'].'/public/data/';
		if (!empty($couverture) && file_exists($chemin . $couverture)) {
			// Supprime le fichier
			unlink($chemin . $couverture);
		}
	}
}

$errors = 0 ;
if (!empty($_POST)) {
    // J'ai soumis le formulaire
	if (empty(trim($_POST['description'])) || empty(trim($_POST['titre'])) || empty(trim($_POST['auteur']))) {
        flash_in('error', 'Merci de remplir tous les champs');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		// Assainissement (sanitize)
		foreach ($_POST as $key => $value) {
			$_POST[$key] = htmlspecialchars(trim($value));
		}

		if ($errors == 0) {

			require_once('../../../../public/includes/imagesettings.php');
		
			if ($errors == 0) {
				
				$add = $pdo->prepare('UPDATE coffee_gallery SET file = :file, description = :description, title = :title, author = :author WHERE id = :id');
				$add->execute([
					':id' => $_POST['id'],
					':file' => $nomfichier,
					':description' => $_POST['description'],
					':title' => $_POST['titre'],
					':author' => $_POST['auteur']
				]);
			}
		}
		header('Location: '.URL.'coffee.php?success');
		flash_in('success', 'Photo modifiée');
		exit();
	}
	
}