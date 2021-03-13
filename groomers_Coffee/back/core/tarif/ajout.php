<?php

require_once('../../../../config/settings.php');

// on va avoir ici un paramètre dans $_POST
$reponses = array();

// Traitement d'un changement de thème
if (!empty($_POST['theme'])) {

    if ($_POST['theme'] != '*') {
        $requete  = executeSQL("SELECT * FROM coffee_table WHERE theme=:theme", array('theme' => $_POST['theme']));
    } else {
        $requete = executeSQL("SELECT * FROM coffee_table");
    }
    $reponses['result'] = $requete->fetchAll();
}

if (isset($_SESSION['admin'])) {
    $reponses['admin'] = 'on'   ;
}
echo json_encode($reponses);