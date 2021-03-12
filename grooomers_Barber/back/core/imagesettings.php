<?php



$errors=0;

$types_autorises = array('image/jpeg', 'image/png', 'image/webp');

	if (!empty($_FILES['file']['name'])) {

		if (!in_array($_FILES['file']['type'], $types_autorises)) {
			flash_in('error', "le format de l'image est incorrect. Format JPEG, PNG ou WEBP autorisé");
			$errors++;
		} else {

			$nomfichier = uniqid() . '_' . $_FILES['file']['name'];
			$chemin = $_SERVER['DOCUMENT_ROOT'] . URL . 'public/data/';
			move_uploaded_file($_FILES['file']['tmp_name'], $chemin . $nomfichier);
		}
	} elseif (!empty($_POST['datapreview'])) {

		// data:image/jpeg;base64,AHhua4154...
		list($type, $data) = explode(';', $_POST['datapreview']);
		list(, $typemime) = explode(':', $type);
		if (!in_array($typemime, $types_autorises)) {
			flash_in('error', "le format de l'image est incorrect. Format JPEG, PNG ou WEBP autorisé");
			$errors++;
		} else {
			list(, $donnees) = explode(',', $data);
			list(, $extension) = explode('/', $typemime);
			$nomfichier = uniqid() . '_' . time() . '.' . $extension;
			$chemin = $_SERVER['DOCUMENT_ROOT'] . URL . 'public/data/';
			// création du fichier à partir de datapreview
			file_put_contents($chemin . $nomfichier, base64_decode($donnees));
		}
	} else {
		$nomfichier = $_POST['couverture_actuelle'];
	}
