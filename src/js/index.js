$( document ).ready(function() {
  
  // Déclaration du scroll de Locomotive Scroll
  const scroll = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true,
      multiplier: 0.8
  });

  // Animation du Slider Tarifs
  var $tickerWrapper = $(".slider__wrapper");
  var $list = $tickerWrapper.find("ul");
  var $clonedList = $list.clone();
  var listWidth = 10;
  
  $list.find("li").each(function (i) {
              listWidth += $(this, i).outerWidth(true);
  });
  
  var endPos = $tickerWrapper.width() - listWidth;
  
  $list.add($clonedList).css({
      "width" : listWidth + "px"
  });
  
  $clonedList.addClass("cloned").appendTo($tickerWrapper);
  
  //Branchement de la lib TimelineMax pour avoir le slider infini
  var infinite = new TimelineMax({repeat: -1, paused: true});
  var time = 30;
  
  infinite
    .fromTo($list, time, {rotation:0.01,x:0}, {force3D:true, x: -listWidth, ease: Linear.easeNone}, 0)
    .fromTo($clonedList, time, {rotation:0.01, x:listWidth}, {force3D:true, x:0, ease: Linear.easeNone}, 0)
    .set($list, {force3D:true, rotation:0.01, x: listWidth})
    .to($clonedList, time, {force3D:true, rotation:0.01, x: -listWidth, ease: Linear.easeNone}, time)
    .to($list, time, {force3D:true, rotation:0.01, x: 0, ease: Linear.easeNone}, time)
    .progress(1).progress(0)
    .play();
  

  // Animation du Slider équipe
  var $tickerWrapper2 = $(".slider__wrapper2");
  var $list2 = $tickerWrapper2.find("ul");
  var $clonedList2 = $list2.clone();
  var listWidth2 = 10;
  
  $list2.find("li").each(function (i) {
              listWidth2 += $(this, i).outerWidth(true);
  });
  
  var endPos2 = $tickerWrapper2.width() - listWidth2;
  
  $list2.add($clonedList2).css({
      "width" : listWidth2 + "px"
  });
  $clonedList2.addClass("cloned").appendTo($tickerWrapper2);
  
  //Branchement de la lib TimelineMax pour avoir le slider infini
  var infinite2 = new TimelineMax({repeat: -1, paused: true});
  var time2 = 55;
  
  infinite2
  .fromTo($list2, time2, {rotation:0.01,x:0}, {force3D:true, x: -listWidth2, ease: Linear.easeNone}, 0)
  .fromTo($clonedList2, time2, {rotation:0.01, x:listWidth2}, {force3D:true, x:0, ease: Linear.easeNone}, 0)
  .set($list2, {force3D:true, rotation:0.01, x: listWidth2})
  .to($clonedList2, time2, {force3D:true, rotation:0.01, x: -listWidth2, ease: Linear.easeNone}, time2)
  .to($list2, time2, {force3D:true, rotation:0.01, x: 0, ease: Linear.easeNone}, time2)
  .progress(1).progress(0)
  .play();
    
   
 
  // Sélecteur à puce des tarifs 
  $( ".select1").click(function() {
      $(".select1").addClass("active");
      $(".select2").removeClass("active");
      $(".select3").removeClass("active");
      $(".select4").removeClass("active");
  });

  $( ".select2").click(function() {
      $(".select1").removeClass("active");
      $(".select2").addClass("active");
      $(".select3").removeClass("active");
      $(".select4").removeClass("active");
  });

  $( ".select3").click(function() {
      $(".select1").removeClass("active");
      $(".select2").removeClass("active");
      $(".select3").addClass("active");
      $(".select4").removeClass("active");
  });

  $( ".select4").click(function() {
      $(".select1").removeClass("active");
      $(".select2").removeClass("active");
      $(".select3").removeClass("active");
      $(".select4").addClass("active");
  });

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
    const walk = (x - startX) * 0.8; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
  });


  // Le Loader (bien mettre les variables en anglais pour éviter la corruption avec le carousel)
  var counter = 0;
  var c = 0;
  var i = setInterval(function () {
    $(".loading__page .counter p").html(c + "%");
    counter++;
    c++;

    if (counter == 101) {
      clearInterval(i);
      $(".loading__page").fadeOut("slow");
    }
  }, 10);



  // Compteur Slide

  var compteur = 1;
  var maxCompteur = 4;
  var hauteur = 0;
  var photo = document.querySelector(".carousel"+compteur);

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
  var currentMousePos = {};

  $( "#home" ).on( "mousemove", function(event) {
          currentMousePos.x = event.pageX;
          currentMousePos.y = event.pageY;

          photo.style.left = ((window.innerWidth * 0.5*1)+-currentMousePos.x/7) + "px";
          photo.style.top = ((window.innerHeight * 0.5*1.1)+-currentMousePos.y/7) + "px";
  });

});