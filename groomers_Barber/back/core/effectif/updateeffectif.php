<?php

require_once('../../../../config/settings.php');


if(empty($_POST) || !isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible. Try again');
    
	header('Location: '.URL);
	exit();
}

$_POST = array_map('trim', $_POST);

if(!empty($_FILES['fichier']['name']) || !empty($_POST['datapreview'])){

	
	$teammodify = executeSQL("SELECT * FROM team WHERE id=:id", array('id' => $_POST['id']));


	if ($teammodify->rowCount() == 1) {

		// Suppression de la photo
		$infos = $teammodify->fetch();
		$couverture = $infos['file'];
		$chemin = $_SERVER['DOCUMENT_ROOT'] . URL . 'public/data/';
		if (!empty($couverture) && file_exists($chemin . $couverture)) {
			// Supprime le fichier
			unlink($chemin . $couverture);
		}
	}
}

$errors = 0 ;
if (!empty($_POST)) {
    // J'ai soumis le formulaire
	if (empty(trim($_POST['description'])) || empty(trim($_POST['nom'])) || empty(trim($_POST['pseudo']))) {
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
				
				$add = $pdo->prepare('UPDATE team SET file = :file, description = :description, name = :name, pseudo = :pseudo, link = :link  WHERE id = :i');
				$add->execute([
					':i' => $_POST['id'],
					':file' => $nomfichier,
					':description' => $_POST['description'],
					':name' => $_POST['nom'],
					':pseudo' => $_POST['pseudo'],
					':link' => $_POST['lien']
				]);
			}
		}

		header('Location: '.URL. 'index.php?success');
		flash_in('success', 'Barber modifié');
		exit();
	}
}