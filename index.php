<?php

require_once('config/settings.php');

if(isset($_GET['action']) && $_GET['action'] == 'deco'){
    unset($_SESSION['admin']);
    // header('location:' . $_SERVER['PHP_SELF']);
    header('location:' . URL);
    exit();
}

$themes = executeSQL("SELECT DISTINCT theme FROM hair ORDER BY theme");
if( $themes->rowCount() > 0){
    $infos_themes = $themes->fetchAll();
}

$title = 'Page d\'accueil';
$url = URL."index.php";
$path = 'style';
$i = 0;
?>

<?php require_once('public/includes/head.php')?>

    <div class="loading__page">
        <div class="counter">
            <p>0%</p>
            <h2>GROOMERS LAB</h2>
        </div>
    </div>

    <div class="minimenu">
        <div class="minimenu__close">
            <p class="lien">< Fermer</p>
        </div>
        <div class="minimenu__container">
            <ul class="ancres ancres2">       
                <li><a class="lien"  href="#">Galerie</a></li>     
                <?php if(strpos($url,'coffee') !== false) { ?>
                    <li><a class="lien"  href="#">La carte</a></li>
                <?php }else{?>
                    <li><a class="lien"  href="#">Tarifs</a></li>
                    <li><a class="lien"  href="#">Barbers   </a></li>
                <?php } ?>
                <?php
                if (isset($_SESSION['admin'])) { ?>
                    <li><a class="lien" href="<?php echo URL?>groomers_Barber/back/admin/parametre.php" class="btn btn-primary">Admin</a></li>
                    <li><a class="lien" href="?action=deco" class="btn btn-primary">Se déconnecter</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="scroll" data-scroll-container>
            <div class="sepa__Block">
                <div class="sepa"></div>
                <div class="sepa"></div>
                <div class="sepa"></div>
            </div>
        <div class="container block" data-scroll-section>
            
            <section id="home">
                <div  class="carouselData">
                    <img class="carousel carousel1" src="groomers_ui/src/img/carousel1.jpeg" alt="">
                    <img class="carousel carousel2" src="groomers_ui/src/img/carousel2.jpeg" alt="">
                    <img class="carousel carousel3" src="groomers_ui/src/img/carousel3.jpeg" alt="">
                </div>

                <?php require_once('public/includes/header.php'); ?>
                
                <div  class="home__content">
                    <h1>GROOMERS LAB BARBER SHOP</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Amet, sit tincidunt aliquam in. </p><br>
                </div>
                <div class="absoelement">
                    <div data-aos="fade-left" class="burger__home">
                        <div class="burger__container">
                            <div class="burger__content">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div data-aos="fade-up" class="controls">
                        <div class="controls__container">
                            <p class="lien">Précédent</p>
                            <p class="lien">Suivant</p>
                        </div> 
                    </div>
                    <div data-aos="fade-up" class="scroll__info">
                        <div class="scroll__container">
                            <p>Scroll</p>
                            <div class="scroll__sepa"></div>
                        </div>
                    </div>
                    <div data-aos="fade-up" class="social">
                        <div class="social__container">
                            <div class="compteurSlide">
                            <div class="compteurNumber">
                                <span>1</span>
                                <span>2</span>
                                <span>3</span>
                            </div>
                            <span class="maxCompteur"> - 3</span>
                            </div>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="coiffures">
                <?php require_once('public/includes/galeriesection.php'); ?>
            </section>
        </div>
        <section data-scroll-section class="block">
            <div class="slider__wrapper">
                <ul class='slider__list'>
                    <li class='listitem'>
                        <span>Nos tarifs</span>
                    </li>
                    <li class='listitem'>
                        <span>Nos tarifs</span>
                    </li>
                    <li class='listitem'>
                        <span>Nos tarifs</span>
                    </li>
                    <li class='listitem'>
                        <span>Nos tarifs</span>
                    </li>
                    <li class='listitem'>
                        <span>Nos tarifs</span>
                    </li>
                </ul>
                </div>
        </section>
        <div class="container block" data-scroll-section>
            <section id="tarifs">
                <div data-scroll data-scroll-speed="2" class="tarifs__controller">
                    <?php foreach($infos_themes as $theme) { 
                        $i++;?>
                        <h3 data-theme="<?php echo $theme['theme'] ?>" class="select<?php echo $i?>"><?php echo $theme['theme'] ?></h3>
                    <?php } ?>
                </div>
                <div class="tarifs__content">
                    <div class="table__container">
                        <div class="table__header">
                            <h3></h3>
                            <h3>Prix Homme</h3>
                            <h3>Prix Femme</h3>
                            <h3>Prix Enfants</h3>
                        </div>
                        <div id="tarif">
                        </div>
                        <?php
                        if(isset($_SESSION['admin'])){ ?>
                            <a class="addTarif" href="<?php echo URL ?>groomers_Barber/back/admin/tarif/addtarif.php?action=choose">Ajouter un tarif</a>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
        <section data-scroll-section class="block">
            <div class="slider__wrapper2">
                <ul class='slider__list2'>
                    <li class='listitem'>
                        <span>la team groomers lab</span>
                    </li>
                    <li class='listitem'>
                        <span>la team groomers lab</span>
                    </li>
                    <li class='listitem'>
                    <span>la team groomers lab</span>
                    </li>
                    <li class='listitem'>
                    <span>la team groomers lab</span>
                    </li>
                    <li class='listitem'>
                    <span>la team groomers lab</span>
                    </li>
                </ul>
                </div>
        </section>
        <div data-scroll-section class="block">
            <section id="barber">
                <?php require_once('public/includes/effectifsection.php'); ?>
            </section>
        </div>
    
        <section id="footer" class="endSection block" data-scroll-section>
            <footer>
                <div class="footer__left">
                    <h2  data-scroll data-scroll-speed="1">Grommers Lab</h2>
                    <div class="footer__infos">
                        <div class="footer__infosLeft">
                            <h3>ADRESSE</h3>
                            <p>22 RUE SAINT SAUVEUR, 75002, PARIS</p>
                        </div>
                        <div class="footer__infosRight">
                            <h3>HORAIRES D’OUVERTURE</h3>
                            <p>DU MARDI AU SAMEDI DE 11H A 20H</p>
                        </div>
                    </div>
                    <a href="tel:0142335894" class="footer__numTel lien">01 42 33 58 94</a>

                </div>
                <div class="footer__right">
                    <div class="map__gradient"></div>
                    <div id="map">
                    </div>
                </div>
            </footer>
            <div class="mentions">
                <h4 class="lien">Politique de confidentialité</h4>
                <h4>© 2021 Groomers Lab</h4>
                <h4 class="lien">Mentions légales</h4>
            </div>
        </section>
    </div>
    <!-- Lib scroll Locomotive Scroll -->
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.0/dist/locomotive-scroll.min.js"></script>
    <!-- AOS Transition -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <!-- Plugin GSAP ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>
    <!-- Plugin GSAP TweenMax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Js main -->
    <script type="module" src="groomers_ui/src/js/index.js"></script>
    <!-- Bouton réserver -->
    <script src="//widget.simplybook.it/v2/widget/widget.js"></script>
    <script>var widget = new SimplybookWidget({"widget_type":"button","url":"https:\/\/groomerslab.simplybook.it","theme":"simple_beauty_theme","theme_settings":{"sb_base_color":"#396f53","header_color":"#ffffff","timeline_hide_unavailable":"0","timeline_show_end_time":"0","timeline_modern_display":"as_slots","display_item_mode":"block","body_bg_color":"#ffffff","sb_review_image":"","dark_font_color":"#000000","light_font_color":"#ffffff","sb_company_label_color":"#333333","hide_img_mode":"0","show_sidebar":"1","sb_busy":"#000000","sb_available":"#e6e6e6"},"timeline":"flexible","datepicker":"top_calendar","is_rtl":false,"app_config":{"allow_switch_to_ada":0,"predefined":[]},"button_title":"R\u00e9server","button_background_color":"#000000","button_text_color":"#ffffff","button_position":"bottom"});</script>     
    <script>
        AOS.init();
    </script>
    <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  


</body>

</html>