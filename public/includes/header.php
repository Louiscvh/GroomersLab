<header  data-aos="fade-down">
    <a style="padding: 0px;"href="">
    <img class="logo" src="img/logo_white.png" alt="">
</a>
    <p>10AM_8PM</p>
    <ul>
        <a class="lien" href="#"><li>Tarifs</li></a>
        <a class="lien" href="#"><li>Rendez-vous</li></a>
        <a class="lien"href="#"><li>Galerie</li></a>
        <?php
        if (isset($_SESSION['admin'])) { ?>
            <a class="lien" href="?action=deco" class="btn btn-primary"><li>Se déconnecter</li></a>
        <?php } ?>
    </ul>
</header>
<?php echo flash_out() ?>