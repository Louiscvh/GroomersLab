<?php

require_once('../config/settings.php');

if(isset($_GET['action']) && $_GET['action'] == 'deco'){
    unset($_SESSION['admin']);
    // header('location:' . $_SERVER['PHP_SELF']);
    header('location:' . URL . 'src');
    exit();
}

$title = 'Page d\'accueil'
?>

<?php require_once('../public/includes/head.php')?>

<body>
    <div class="sepa"></div>
    <div class="sepa"></div>
    <div class="sepa"></div>
    <div class="scroll" data-scroll-container>
        <div class="container">
            <section id="home" data-scroll-section>
                <?php require_once('../public/includes/header.php'); ?>
                <div class="home__content">
                    <h1>GROOMERS LAB BARBER SHOP</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Amet, sit tincidunt aliquam in. </p><br>
                    <a href="#">Réserver</a>
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
                            <p>Précédent</p>
                            <p>Suivant</p>
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
                            <div>
                                <p>1 - 2</p>
                            </div>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <section data-scroll-section>
            
                <?php require_once('../public/includes/galerie.php'); ?>
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
                </ul>
                </div>
        </section>
        <div class="container container__slider">
            <section data-scroll-section>
                <main>
                    <div class="coiffeur__container">
                      <div class="coiffeurs">
                        <div class="coiffeur" style="margin-left:50%;">
                          <div class="coiffeur__cube" style="background-image: url(img/coiffeur_1.jpg);">
                            <div class="coiffeur__title">
                              <h3 class="coiffeur__name">Justin K.AK Mat</h3>
                              <h2 class="coiffeur__social">@JustinK</h2>
                            </div>
                          </div>
                        </div>
                        <div class="coiffeur">
                            <div class="coiffeur__cube" style="background-image: url(img/coiffeur_2.jpg);">
                              <div class="coiffeur__title">
                                <h3 class="coiffeur__name">Justin K.AK Mat</h3>
                                <h2 class="coiffeur__social">@JustinK</h2>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>            
                      <div class="slider">
                        <div class="slider__progress">
                      </div>
                    </div>
                  </main>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.0/dist/locomotive-scroll.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="module" src="js/index.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>