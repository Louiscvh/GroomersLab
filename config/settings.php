<?php
// Définition du fuseau horaire
date_default_timezone_set('Europe/Paris');

// Ouverture de session
session_start();

// Connexion BDD
$pdo = new PDO(
    'mysql:host=localhost;charset=utf8;dbname=groomers',
    'root',
    'root',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    )
);
/*
PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
Mode d'affichage des erreurs (Avertissements)
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
Définition du mode de fetch par défaut
*/

// Définition de constante
define('URL', '/GroomersLab/');

// Fonctions
function flash_in($type, $message)
{

    if (empty($_SESSION['message'])) $_SESSION['message'] = array();
    array_push($_SESSION['message'], array($type, $message));
}

function flash_out()
{
    $errors = array();
    $success = array();

    if(!empty($_SESSION['message'])){
       foreach($_SESSION['message'] as $message){
        if($message[0] == 'error') $errors[] = $message[1];
        if($message[0] == 'success') $success[] = $message[1];
       }       
    }
    $messages = '';
    if(!empty($errors)){
        $messages .= '<p class="alert alert-danger">'.(implode('<br>',$errors)).'</p>';
    }
    if(!empty($success)){
        $messages .= '<p class="alert alert-success">'.(implode('<br>',$success)).'</p>';
    }
    unset($_SESSION['message']); // On retire les messages qui étaient en attente d'affichage
    return $messages;
}

function executeSQL ( $requete, $params = array()){

    global $pdo; // on accède une variable de l'espace global

    if(!empty($params)){
        foreach($params as $key => $value){
            // les balises html sont neutralisées
            $params[$key] = htmlspecialchars($value);
        }
    }
    $query = $pdo->prepare($requete);
    $query->execute($params);

    return $query;
}

function getUserByLogin($login){
    $infosuser = executeSQL("SELECT * FROM users WHERE login=:login",array('login' => $login));
    if($infosuser->rowCount() == 1){
        return $infosuser->fetch();
    }
    else{
        return false;
    }
}
