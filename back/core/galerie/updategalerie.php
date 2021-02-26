<?php


require_once('../../../config/settings.php');

require_once('../imagesettings.php');

var_dump($_POST, $_FILES);


if(empty($_POST) || !isset($_SESSION['admin'])){

	flash_in('error', 'Action impossible. Try again');
    
	header('Location: '.URL.'src');
	exit();
}

$error = false;
$_POST = array_map('trim', $_POST);

if($error){

    header('Location: '.URL.'src/index.php?error');

	exit();
}else {

	if( empty($_POST['description']) ){
		$_POST['description'] = null;
	}
	if( empty($_POST['auteur']) ){
		$_POST['auteur'] = null;
	}

	$newName = 'pic-'.time().'.'.$extFile;
	
	move_uploaded_file($_FILES['fichier']['tmp_name'], '../../../public/data/'.$newName);

	$add = $pdo->prepare('UPDATE haircut SET file = :file, description = :description, title = :title, author = :author WHERE id = :i');
	$add->execute([
		':i' => $_POST['id'],
		':file' => $newName,
		':description' => $_POST['description'],
		':title' => $_POST['titre'],
		':author' => $_POST['auteur']
	]);

	header('Location: '.URL.'src/index.php?success');
	exit();
}