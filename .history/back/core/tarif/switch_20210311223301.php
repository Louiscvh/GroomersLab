<?php

require_once('../../../config/settings.php');

// on va avoir ici un paramètre dans $_POST
$reponses = array();

// Traitement d'un changement de thème
if (!empty($_POST['theme'])) {

    $requete = executeSQL("SELECT DISTINCT theme FROM hair ORDER BY theme");
    if( $requete->rowCount() > 0){
        $reponses = $requete->fetchAll();
    }
    $reponses['result'] = $requete->fetchAll();
}

echo json_encode($reponses);