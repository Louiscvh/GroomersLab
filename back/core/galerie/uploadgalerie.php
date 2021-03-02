<?php


require_once('../../../config/settings.php');

require_once('../imagesettings.php');

var_dump($_POST, $_FILES);

if(empty($_POST) || !isset($_SESSION['admin'])){
	
	flash_in('error', 'Action impossible. Try again');
	
	header('Location: '.URL.'src');
	exit();
}
$errors = 0 ;
if ($errors == 0) {
	
	require_once('../imagesettings.php');

	if($errors == 0){
			$add = $pdo->prepare('INSERT INTO haircut (file, description, title, author) VALUES (:file, :description, :title, :author)');
			$add->execute([
				':file' => $nomfichier,
				':description' => $_POST['description'],
				':title' => $_POST['titre'],
				':author' => $_POST['auteur']
			]);

			header('Location: '.URL.'src/index.php?success');
			exit();
	}
}