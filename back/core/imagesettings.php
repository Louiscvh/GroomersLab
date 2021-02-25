<?php


var_dump($_POST, $_FILES);




$error = false;

if($_FILES['fichier']['error'] != 0){

	$error = true;
}

$tExtOk = ['png', 'jpg', 'jpeg'];

$tFilename = explode('.', $_FILES['fichier']['name']);

$extFile = array_pop($tFilename);

if( !in_array($extFile, $tExtOk)){

	$error = true;
}
