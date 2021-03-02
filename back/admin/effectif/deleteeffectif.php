<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être administrateur pour supprimer un membre de la team groomers');
	header('Location: '.URL.'src');
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
	flash_in('success', "Le membre a été supprimé");
} else {
	flash_in('error', 'Membre inexistant');
}

header('Location: '.URL.'src');
exit();