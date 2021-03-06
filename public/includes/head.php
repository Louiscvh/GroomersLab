<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="description" content="Site dans le cadre du projet site dynamique - DIGITAL CAMPUS"> 
    <meta name="viewport" content="width=device-width, initial-scale=0.6">
    <meta name="robots" content="index">
    <meta http-equiv="expires" content="43200"/>
    <!-- Title dynamique -->
    <title>Groomers | <?php echo $title ?></title>
    <!-- Authenticité de la page -->
    <link rel="canonical" href="https://www.barbierlab.fr/" />
    <!-- AOS Transition -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo URL ?>groomers_ui/src/css/<?php echo $path ?>.css">
    <!-- Locomotive CSS -->
    <link rel="stylesheet" href="<?php echo URL ?>groomers_ui/src/css/locomotive-scroll.css">
    <!-- Essonne FONT -->
    <link rel="stylesheet" href="https://use.typekit.net/rzj3zdq.css">
    <!-- API pour la carte -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Favicon optis pour tous les appareils -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL ?>groomers_ui/src/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo URL ?>groomers_ui/src/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL ?>groomers_ui/src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo URL ?>groomers_ui/src/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL ?>groomers_ui/src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo URL ?>groomers_ui/src/img/favicon/manifest.json">
    <!-- RGPD -->
    <script src="https://cookieconsent.popupsmart.com/src/js/popper.js"></script><script> window.start.init({Palette:"palette4",Mode:"floating right",Theme:"classic",Message:"Ce site Web utilise des cookies, en poursuivant votre navigation, vous acceptez leur utilisations.",ButtonText:"Accepter",LinkText:"Lire plus",Time:"5",})</script>
    <!-- Leaflet Map -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>