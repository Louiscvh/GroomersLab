<header  data-aos="fade-down">
    <a style="padding: 0px;" href="">
    <img class="logo" src="img/logo_white.png" alt="">
</a>
    <p>10AM_8PM</p>
    <nav>
        <ul>
            <li><a class="lien" href="#">Tarifs</a></li>
            <li><a class="lien" href="#">Rendez-vous</a></li>
            <li><a class="lien"href="#">Galerie</a></li>
            <?php
            if (isset($_SESSION['admin'])) { ?>
                <li><a class="lien" href="<?php echo URL?>back/admin/parametre.php" class="btn btn-primary">Admin</a></li>
                <li><a class="lien" href="?action=deco" class="btn btn-primary">Se déconnecter</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
<?php echo flash_out() ?>