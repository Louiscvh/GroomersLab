<?php


require_once('../../../../config/settings.php');

$_POST = array_map('trim', $_POST);

if(!isset($_SESSION['admin'])){
	
	flash_in('error', 'Action impossible.');
	
	header('Location: '.URL);
	exit();
}
$errors = 0 ;
if (!empty($_POST)) {
    // J'ai soumis le formulaire
	if ($_FILES['fichier']['size'] == 0 || empty(trim($_POST['description'])) || empty(trim($_POST['titre'])) || empty(trim($_POST['auteur']))) {
        flash_in('error', 'Merci de remplir tous les champs');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{

		
		// Assainissement (sanitize)
		foreach ($_POST as $key => $value) {
			$_POST[$key] = htmlspecialchars(trim($value));
		}

		if ($errors == 0) {

			require_once('../../../../public/includes/imagesettings.php');

			if($errors == 0){
				$add = $pdo->prepare('INSERT INTO haircut (file, description, title, author) VALUES (:file, :description, :title, :author)');
				$add->execute([
					':file' => $nomfichier,
					':description' => $_POST['description'],
					':title' => $_POST['titre'],
					':author' => $_POST['auteur']
				]);
			}
		}
		header('Location: '.URL);
		flash_in('success', 'Photo ajoutée');
		exit();
	}
}