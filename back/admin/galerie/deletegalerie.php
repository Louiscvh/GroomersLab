<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être administrateur pour supprimer une fiche');
	header('Location: '.URL.'src');
	exit();

}

$req = $pdo->prepare('DELETE FROM haircut WHERE id = :i');

$req->execute([':i' => $_GET['haircutid']]);

flash_in('success', 'Supprimé');

header('Location: '.URL.'src/index.php?success');

exit();