<?php


require_once('../../../config/settings.php');

require_once('../imagesettings.php');

var_dump($_POST, $_FILES);

if(empty($_POST) || !isset($_SESSION['admin'])){
	
	flash_in('error', 'Action impossible. Try again');
	
	header('Location: '.URL.'src');
	exit();
}

if($error){

	header('Location: '.URL.'src/index.php?error');

	exit();
}else {

	$newName = 'pic-'.time().'.'.$extFile;

	move_uploaded_file($_FILES['fichier']['tmp_name'], '../../../public/data/'.$newName);

	$add = $pdo->prepare('INSERT INTO team (file, description, name, pseudo, link) VALUES (:file, :description, :name, :pseudo, :link)');
	$add->execute([
		':file' => $newName,
		':description' => $_POST['description'],
		':name' => $_POST['nom'],
		':pseudo' => $_POST['pseudo'],
		':link' => $_POST['lien']
	]);

	header('Location: '.URL.'src/index.php?success');
	exit();
}