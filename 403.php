<?php 


require_once('config/settings.php');
$path = 'admin';
$title="Erreur 403";

?>


<?php require_once('public/includes/head.php')?>

    <div class="sepa__Block">
        <div class="sepa"></div>
        <div class="sepa"></div>
        <div class="sepa"></div>
    </div>
    <div class="container403">
        <div class="container403__content">
            <h1>Erreur 403</h1>
            <h2>Ooops !</h2>
            <p>On s'est peut-être perdu</p>
            <a class="lien" href="<?php echo URL ?>">Revenir à l'accueil</a>
        </div>
    </div>
</body>

</html>