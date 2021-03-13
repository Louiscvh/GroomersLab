<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être administrateur pour supprimer une fiche');
	header('Location: '.URL. '/coffee.php');
	exit();

}


$req = executeSQL("SELECT * FROM coffee_gallery WHERE id=:id", array('id' => $_GET['galerieid']));
if ($req->rowCount() == 1) {

	// Suppression de la photo
	$infos = $req->fetch();
	$couverture = $infos['file'];
	$chemin = $_SERVER['DOCUMENT_ROOT'] . URL . 'public/data/';
	if (!empty($couverture) && file_exists($chemin . $couverture)) {
		// Supprime le fichier
		unlink($chemin . $couverture);
	}
	// Suppression en BDD
	executeSQL("DELETE FROM coffee_gallery WHERE id = :id", array('id' => $_GET['galerieid']));
	flash_in('success', "La photo a été supprimé");
} else {
	flash_in('error', 'Photo inexistante');
}

header('Location: '.URL. '/coffee.php');
exit();