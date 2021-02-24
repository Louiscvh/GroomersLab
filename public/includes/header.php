<header  data-aos="fade-down">
    <a style="padding: 0px;"href=""><img class="logo" src="img/logo_white.png" alt=""></a>
    <p>10AM_8PM</p>
    <ul>
        <a href="#"><li>Tarifs</li></a>
        <a href="#"><li>Rendez-vous</li></a>
        <a href="#"><li>Galerie</li></a>
        <?php
        if (isset($_SESSION['admin'])) { ?>
            <a href="?action=deco" class="btn btn-primary"><li>Se deconnecter</li></a>
        <?php } ?>
    </ul>
</header>
<?php echo flash_out() ?>