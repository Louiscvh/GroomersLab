<?php


include('../../config/settings.php');

include('imagesettings.php');

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

	move_uploaded_file($_FILES['fichier']['tmp_name'], '../../public/data/'.$newName);

	$add = $pdo->prepare('INSERT INTO haircut (file, description, title, author) VALUES (:file, :description, :title, :author)');
	$add->execute([
		':file' => $newName,
		':description' => $_POST['description'],
		':title' => $_POST['titre'],
		':author' => $_POST['auteur']
	]);

	header('Location: '.URL.'src/index.php?success');
	exit();
}