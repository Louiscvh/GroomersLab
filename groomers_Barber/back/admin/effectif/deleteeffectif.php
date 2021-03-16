<?php

require_once('../../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être administrateur pour supprimer un barber de la team groomers');
	header('Location: '.URL);
	exit();

}

$req = executeSQL("SELECT * FROM team WHERE id=:id", array('id' => $_GET['teamid']));
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
	executeSQL("DELETE FROM team WHERE id = :id", array('id' => $_GET['teamid']));
	flash_in('success', "Barber supprimé");
} else {
	flash_in('error', 'Barber inexistant');
}

header('Location: '.URL);
exit();