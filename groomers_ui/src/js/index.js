'use strict';

const URL = '/GroomersLab/groomers_Barber/';
const URLCOFFEE = '/GroomersLab/groomers_Coffee/';

$( document ).ready(function() {

   // Fonction pour déclarer les ancres
   let target;
   function ancres (li, section) {
     $(li).click(function(){
       target = document.querySelector(section);
       scroll.scrollTo(target);
     });
   }
   
   ancres(".ancres li:first-child", "#coiffures");
   ancres(".ancres li:nth-child(2)", "#tarifs");
   ancres('.ancres li:nth-child(3)', '#barber');
   ancres('.ancres li:nth-child(4)', '#footer');

  //Minimenu click
  $( ".miniburger__home, .ancres2 a" ).click(function() {
    $(".minimenu").toggleClass("--open");
  });
  $( ".minimenu__close, .ancres2 a" ).click(function() {
    $(".minimenu").toggleClass("--open");
  });
  $( ".ancres2 a" ).click(function() {
    $(".minimenu").toggleClass("--open");
  });

  //Leaflet map config
  var map = L.map('map', {
    center: [48.866350858938574, 2.3479970557850103],
    zoom: 17,
  });

  L.tileLayer('https://api.maptiler.com/maps/ch-swisstopo-lbm-dark/{z}/{x}/{y}.png?key=z7VZjPjowDhkEFyKoLzj', {
      attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a> © swisstopo <a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a> <a target="_blank" href="https://www.swisstopo.admin.ch/en/home.html">&copy; swisstopo</a>',
      zoom: 13
  }).addTo(map);

  var greenIcon = L.icon({
    iconUrl: 'groomers_ui/src/img/logo_white.png',
    iconSize:     [40, 40], // size of the icon
    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -50] // point from which the popup should open relative to the iconAnchor
  });

  var marker = L.marker([48.866350858938574, 2.3479970557850103], {
      title: 'GroomersLab',
      icon: greenIcon,
  }).addTo(map).bindPopup("Groomers Lab");;


  
  
  // Déclaration du scroll de Locomotive Scroll
  const scroll = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true,
      multiplier: 0.6,
      smoothMobile: true
  });

  scroll.destroy()

  setTimeout(function(){
  scroll.init()
  }, 100);


  // Animation du Slider Tarifs
  let $tickerWrapper = $(".slider__wrapper");
  let $list = $tickerWrapper.find("ul");
  let $clonedList = $list.clone();
  let listWidth = 10;
  
  $list.find("li").each(function (i) {
              listWidth += $(this, i).outerWidth(true);
  });
  
  let endPos = $tickerWrapper.width() - listWidth;
  
  $list.add($clonedList).css({
      "width" : listWidth + "px"
  });
  
  $clonedList.addClass("cloned").appendTo($tickerWrapper);
  
  //Branchement de la lib TimelineMax pour avoir le slider infini
  let infinite = new TimelineMax({repeat: -1, paused: true});
  let time = 30;
  
  infinite
    .fromTo($list, time, {rotation:0.01,x:0}, {force3D:true, x: -listWidth, ease: Linear.easeNone}, 0)
    .fromTo($clonedList, time, {rotation:0.01, x:listWidth}, {force3D:true, x:0, ease: Linear.easeNone}, 0)
    .set($list, {force3D:true, rotation:0.01, x: listWidth})
    .to($clonedList, time, {force3D:true, rotation:0.01, x: -listWidth, ease: Linear.easeNone}, time)
    .to($list, time, {force3D:true, rotation:0.01, x: 0, ease: Linear.easeNone}, time)
    .progress(1).progress(0)
    .play();

  // Animation du Slider équipe
  let $tickerWrapper2 = $(".slider__wrapper2");
  let $list2 = $tickerWrapper2.find("ul");
  let $clonedList2 = $list2.clone();
  let listWidth2 = 10;
  
  $list2.find("li").each(function (i) {
    listWidth2 += $(this, i).outerWidth(true);
  });
  
  let endPos2 = $tickerWrapper2.width() - listWidth2;
  
  $list2.add($clonedList2).css({
      "width" : listWidth2 + "px"
  });
  $clonedList2.addClass("cloned").appendTo($tickerWrapper2);
  
  //Branchement de la lib TimelineMax pour avoir le slider infini
  let infinite2 = new TimelineMax({repeat: -1, paused: true});
  let time2 = 55;
  
  infinite2
  .fromTo($list2, time2, {rotation:0.01,x:0}, {force3D:true, x: -listWidth2, ease: Linear.easeNone}, 0)
  .fromTo($clonedList2, time2, {rotation:0.01, x:listWidth2}, {force3D:true, x:0, ease: Linear.easeNone}, 0)
  .set($list2, {force3D:true, rotation:0.01, x: listWidth2})
  .to($clonedList2, time2, {force3D:true, rotation:0.01, x: -listWidth2, ease: Linear.easeNone}, time2)
  .to($list2, time2, {force3D:true, rotation:0.01, x: 0, ease: Linear.easeNone}, time2)
  .progress(1).progress(0)
  .play();
 
  // Sélecteur à puce des tarifs 
  /*selecteur('.select1',['.select2','.select3','.select4']);
  selecteur('.select2', ['.select1','.select3','.select4']);
  selecteur('.select3', ['.select1','.select2','.select4']);
  selecteur('.select4', ['.select1','.select2','.select3']);

  function selecteur (el,...args){
    $(el).click(function() {
      for(let ind of args){
        $(el).addClass("active");
        ind.forEach(element =>        
          $(element).removeClass("active")
        );
      }
  });
  }
  selecteur();*/
  

  // Slider équipe
  const slider = document.querySelector('.coiffeurs');

  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 1; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
  });

  

  //GSAP pour les anim lors du load de la page
 

  // Le Loader (bien mettre les variables en anglais pour éviter la corruption avec le carousel)
  let counter = 0;
  let c = 0;
  let i = setInterval(function () {
    $(".loading__page .counter p").html(c + "%");
    counter++;
    c++;

    if (counter == 101) {
      clearInterval(i);
      $(".loading__page").fadeOut("slow");
    }
  }, 10);

  // Compteur Slide
  let compteur = 1;
  let maxCompteur = 4;
  let hauteur = 0;
  let photo = document.querySelector(".carousel"+compteur);

  $( ".controls__container p:nth-child(2)" ).click(function() {
    compteur++;
    hauteur = hauteur - 23;
    $( ".compteurNumber span" ).css("transform",`translateY(${hauteur}px)`);
    if(compteur == maxCompteur) {
      hauteur = 0;
      compteur = 1;
      $( ".compteurNumber span" ).css("transform",`translateY(0px)`);
    }
    if(compteur == 1) {
      $(".carousel"+compteur).fadeIn("slow");
      $(".carousel2").fadeOut("slow");
      $(".carousel3").fadeOut("slow");
    }
    if(compteur == 2) {
      $(".carousel"+compteur).fadeIn("slow");
      $(".carousel1").fadeOut("slow");
      $(".carousel3").fadeOut("slow");
    }
    if(compteur == 3) {
      $(".carousel"+compteur).fadeIn("slow");
      $(".carousel1").fadeOut("slow");
      $(".carousel2").fadeOut("slow");
    }
    photo = document.querySelector(".carousel"+compteur);
  });

  $( ".controls__container p:nth-child(1)" ).click(function() {
    compteur--;
    if(compteur < 1) {
      $( ".compteurNumber span" ).css("transform",`translateY(0px)`);
      compteur = 1;
      fail;
    }
    if(compteur == 1) {
      $(".carousel"+compteur).fadeIn();
      $(".carousel2").fadeOut();
      $(".carousel3").fadeOut();
    }
    if(compteur == 2) {
      $(".carousel"+compteur).fadeIn();
      $(".carousel1").fadeOut();
      $(".carousel3").fadeOut();
    }
    if(compteur == 3) {
      $(".carousel"+compteur).fadeIn();
      $(".carousel1").fadeOut();
      $(".carousel2").fadeOut();
    }
    hauteur = hauteur + 23;
    $( ".compteurNumber span" ).css("transform",`translateY(${hauteur}px)`);
    photo = document.querySelector(".carousel"+compteur);
  });
  if(compteur == 1) {
    $(".carousel"+compteur).fadeIn();
    $(".carousel2").fadeOut();
    $(".carousel3").fadeOut();
  }

  // Animation du carousel de la section Home
  let currentMousePos = {};
  $( "#home" ).on( "mousemove", function(event) {
    currentMousePos.x = event.pageX;
    currentMousePos.y = event.pageY;

    photo.style.left = ((window.innerWidth * 0.5*1.05)+-currentMousePos.x/7) + "px";
    photo.style.top = ((window.innerHeight * 0.5*1.1)+-currentMousePos.y/7) + "px";
  });
  
  // Bouton réservation
  $(".simplybook-widget-button").appendTo(".home__content");


  if(window.location.toString().includes("coffee.php")) {
    if ($('.tarifs__controller h3').length > 0) {

      $('.tarifs__controller h3').each(function () {

          let sectionchoisie = $(this);

          sectionchoisie.on('click', function (e) {
              e.preventDefault();
              let section = $(this).data('theme'); /* recup de l'attribut data-theme */
              $('.tarifs__controller h3').removeClass('active');
              sectionchoisie.addClass('active');

              /* AJAX */
              /* destination, paramètres sous forme d'objet, fonction qui traite la réponse, format */
              $.post(URLCOFFEE + 'back/core/tarif/ajout.php', { "theme": section}, function (reponse) {


                  let html = '<div class="tarif__container">';
                  
                  for (let i = 0; i < reponse.result.length; i++) {
                  reponse.result[i].standard = number_format(reponse.result[i].standard, 2, ',', '.' );
                      html += `
                      <div class="table__ligne">
                        <p>${reponse.result[i].name}</p>

                        <p>${reponse.result[i].standard}€</p>`;

                        if(!reponse.result[i].little){
                            html += `<p>-</p>`;
                        }else{
                            reponse.result[i].little = number_format(reponse.result[i].little, 2, ',', '.' );
                            html += `<p>${reponse.result[i].little}€</p>`;
                        }

                        if(!reponse.result[i].big){
                            html += `<p>-</p>`;
                        }else{
                            reponse.result[i].big = number_format(reponse.result[i].big, 2, ',', '.' );
                            html += `<p>${reponse.result[i].big}€</p>`;
                        }

                      html += `</div>`;
                      if (reponse.admin == 'on'){
                          html += `<a href="${URLCOFFEE}back/admin/tarif/updatetarif.php?tarifid=${reponse.result[i].id}">Modifier</a>`;
                      }
                  }
                  $('#tarif').html(html);
              }, 'json');
          });
      });
      $('.select1').trigger('click');
    }
  }else {
    if ($('.tarifs__controller h3').length > 0) {

      $('.tarifs__controller h3').each(function () {

          let sectionchoisie = $(this);

          sectionchoisie.on('click', function (e) {
              e.preventDefault();
              let section = $(this).data('theme'); /* recup de l'attribut data-theme */
              $('.tarifs__controller h3').removeClass('active');
              sectionchoisie.addClass('active');

              /* AJAX */
              /* destination, paramètres sous forme d'objet, fonction qui traite la réponse, format */
              $.post(URL + 'back/core/tarif/ajout.php', { "theme": section}, function (reponse) {


                  let html = '<div class="tarif__container">';
                  
                  for (let i = 0; i < reponse.result.length; i++) {
                  reponse.result[i].men = number_format(reponse.result[i].men, 2, ',', '.' );
                      html += `
                      <div class="table__ligne">
                        <p>${reponse.result[i].name}</p>

                        <p>${reponse.result[i].men}€</p>`;

                        if(!reponse.result[i].women){
                            html += `<p>-</p>`;
                        }else{
                            reponse.result[i].women = number_format(reponse.result[i].women, 2, ',', '.' );
                            html += `<p>${reponse.result[i].women}€</p>`;
                        }

                        if(!reponse.result[i].kid){
                            html += `<p>-</p>`;
                        }else{
                            reponse.result[i].kid = number_format(reponse.result[i].kid, 2, ',', '.' );
                            html += `<p>${reponse.result[i].kid}€</p>`;
                        }

                      html += `</div>`;
                      if (reponse.admin == 'on'){
                          html += `<a href="${URL}back/admin/tarif/updatetarif.php?tarifid=${reponse.result[i].id}">Modifier</a>`;
                      }
                  }
                  $('#tarif').html(html);
              }, 'json');
          });
      });
      $('.select1').trigger('click');
    }
  }

  //Burger menu redirection
  $(".burger__container").click(function(){
    $("body").fadeOut(800);
    if(window.location.toString().includes("coffee.php")) {
      setTimeout(function(){
        document.location.href="index.php"; 
    },800);
    }else {
      setTimeout(function(){
        document.location.href="coffee.php"; 
      },800);
    }
  });

  // Format Euros
  function number_format(number, decimals, decPoint, thousandsSep){
    decimals = decimals || 0;
    number = parseFloat(number);

    if(!decPoint || !thousandsSep){
        decPoint = '.';
        thousandsSep = ',';
    }

    var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
    var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
    var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
    var formattedNumber = "";

    while(numbersString.length > 3){
        formattedNumber += thousandsSep + numbersString.slice(-3)
        numbersString = numbersString.slice(0,-3);
    }

    return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '' + '€');
  }


    // TEST GSAP

    // TEST GSAP
    var anim1 = document.querySelector('.header__1');
    anim1.innerHTML = anim1.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline()
    .add({
        targets: '.header__1 .letter',
        translateY: [100,0],
        translateZ: 0,
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 1500,
        delay: (el, i) => 2000 + 50 * i
    });

    var anim2 = document.querySelector('.header__2');
    anim2.innerHTML = anim2.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline()
    .add({
        targets: '.header__2 .letter',
        translateY: [100,0],
        translateZ: 0,
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 1500,
        delay: (el, i) => 2000 + 50 * i
    });

    var anim3 = document.querySelector('.home__content p');

    anime.timeline()
    .add({
        targets: '.home__content p',
        translateY: [100,0],
        translateZ: 0,
        opacity: [0,0.3],
        easing: "easeOutExpo",
        duration: 1500,
        delay: 2600
    });

    var anim4 = document.querySelector('.simplybook-widget-button');

    anime.timeline()
    .add({
        targets: '.simplybook-widget-button',
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 500,
        delay: 3000
    });

    var anim4 = document.querySelectorAll('header, .absoelement');

    anime.timeline()
    .add({
        targets: 'header, .absoelement',
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 1500,
        delay: 3000
    });
      
});