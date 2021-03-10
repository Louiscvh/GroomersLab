<?php

require_once('../config/settings.php');

if(isset($_GET['action']) && $_GET['action'] == 'deco'){
    unset($_SESSION['admin']);
    // header('location:' . $_SERVER['PHP_SELF']);
    header('location:' . URL . 'src');
    exit();
}

$title = 'Page d\'accueil';
$path = 'style'
?>

<?php require_once('../public/includes/head.php')?>

    <div class="loading__page">
        <div class="counter">
            <p>0%</p>
            <h2>GROOMERS LAB</h2>
        </div>
    </div>

    
    <div class="scroll" data-scroll-container>
            <div class="sepa__Block">
                <div class="sepa"></div>
                <div class="sepa"></div>
                <div class="sepa"></div>
            </div>
        <div class="container" data-scroll-section>
            
            <section id="home">
                <div class="carouselData">
                    <img class="carousel carousel1" src="img/carousel1.jpeg" alt="">
                    <img class="carousel carousel2" src="img/carousel2.jpeg" alt="">
                    <img class="carousel carousel3" src="img/carousel3.jpeg" alt="">
                </div>

                <?php require_once('../public/includes/header.php'); ?>
                <div class="home__content">
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
                <?php require_once('../public/includes/galeriesection.php'); ?>
            </section>
        </div>
        <section data-scroll-section>
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
        <div class="container" data-scroll-section>
            <section id="tarifs">
                <div class="tarifs__controller">
                    <h3 class="select1">Coupes</h3>
                    <h3 class="select2">Forfaits</h3>
                    <h3 class="select3">Extras</h3>
                    <h3 class="select4">Soins</h3>
                </div>
                <div class="tarifs__content"></div>
            </section>
        </div>
        <section data-scroll-section>
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
        <div data-scroll-section>
            <section id="barber">
                <?php require_once('../public/includes/effectifsection.php'); ?>
            </section>
        </div>
        <section id="footer" class="endSection" data-scroll-section>
            <footer>
                <div class="footer__left">
                    <h2>Grommers Lab</h2>
                    <div class="footer__infos">
                        <div class="footer__infosLeft">
                            <h3>Contact</h3>
                            <p>22 RUE SAINT SAUVEUR, 75002, PARIS</p>
                        </div>
                        <div class="footer__infosRight">
                            <h3>HORAIRES D’OUVERTURE</h3>
                            <p>DU MARDI AU SAMEDI DE 11h à 20h</p>
                        </div>
                    </div>
                    <a href="tel:0142335894" class="footer__numTel lien">01 42 33 58 94</a>

                </div>
                <div class="footer__right">
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
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.0/dist/locomotive-scroll.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="module" src="js/index.js"></script>
    <script src="//widget.simplybook.it/v2/widget/widget.js"></script>
    <script>var widget = new SimplybookWidget({"widget_type":"button","url":"https:\/\/groomerslab.simplybook.it","theme":"simple_beauty_theme","theme_settings":{"sb_base_color":"#396f53","header_color":"#ffffff","timeline_hide_unavailable":"0","timeline_show_end_time":"0","timeline_modern_display":"as_slots","display_item_mode":"block","body_bg_color":"#ffffff","sb_review_image":"","dark_font_color":"#000000","light_font_color":"#ffffff","sb_company_label_color":"#333333","hide_img_mode":"0","show_sidebar":"1","sb_busy":"#000000","sb_available":"#e6e6e6"},"timeline":"flexible","datepicker":"top_calendar","is_rtl":false,"app_config":{"allow_switch_to_ada":0,"predefined":[]},"button_title":"R\u00e9server","button_background_color":"#000000","button_text_color":"#ffffff","button_position":"bottom"});</script>     
    <script>
        AOS.init();
        
    </script>
    <script type="text/javascript">
		
	</script> 

</body>

</html>