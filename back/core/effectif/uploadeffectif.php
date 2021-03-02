<?php


require_once('../../../config/settings.php');

var_dump($_POST, $_FILES);

if(empty($_POST) || !isset($_SESSION['admin'])){
	
	flash_in('error', 'Action impossible. Try again');
	
	header('Location: '.URL.'src');
	exit();
}
$errors = 0 ;
if (!empty($_POST)) {
    // J'ai soumis le formulaire

    // Assainissement (sanitize)
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(trim($value));
    }

	if ($errors == 0) {

		require_once('../imagesettings.php');

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
	header('Location: '.URL.'src');
	exit();
}