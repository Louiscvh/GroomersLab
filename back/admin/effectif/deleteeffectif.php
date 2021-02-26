<?php

require_once('../../../config/settings.php');

if(!isset($_SESSION['admin'])){

	flash_in('error', 'Vous devez être administrateur pour supprimer un membre de la team groomers');
	header('Location: '.URL.'src');
	exit();

}

$req = $pdo->prepare('DELETE FROM team WHERE id = :i');

$req->execute([':i' => $_GET['teamid']]);

flash_in('success', 'Supprimé');

header('Location: '.URL.'src/index.php?success');

exit();