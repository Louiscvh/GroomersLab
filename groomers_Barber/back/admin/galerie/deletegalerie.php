<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être administrateur pour supprimer une photo');
	header('Location: '.URL);
	exit();

}


$req = executeSQL("SELECT * FROM haircut WHERE id=:id", array('id' => $_GET['haircutid']));
if ($req->rowCount() == 1) {

	// Suppression de la photo
	$infos = $req->fetch();
	$couverture = $infos['file'];
	$chemin = $_SERVER['DOCUMENT_ROOT'].'/public/data/';
	if (!empty($couverture) && file_exists($chemin . $couverture)) {
		// Supprime le fichier
		unlink($chemin . $couverture);
	}
	// Suppression en BDD
	executeSQL("DELETE FROM haircut WHERE id = :id", array('id' => $_GET['haircutid']));
	flash_in('success', "Photo supprimée");
} else {
	flash_in('error', 'Photo inexistante');
}

header('Location: '.URL);
exit();