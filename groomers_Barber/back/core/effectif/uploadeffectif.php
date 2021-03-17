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
	if ($_FILES['fichier']['size'] == 0 || empty(trim($_POST['description'])) || empty(trim($_POST['nom'])) || empty(trim($_POST['pseudo']))) {
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
				$add = $pdo->prepare('INSERT INTO team (file, description, name, pseudo, link) VALUES (:file, :description, :name, :pseudo, :link)');
				$add->execute([
					':file' => $nomfichier,
					':description' => $_POST['description'],
					':name' => $_POST['nom'],
					':pseudo' => $_POST['pseudo'],
					':link' => $_POST['lien']
				]);
			}
		}
		header('Location: '.URL);
		flash_in('success', 'Barber ajouté');
		exit();
	}
}