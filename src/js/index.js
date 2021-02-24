
const scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    multiplier: 0.8
});

   //Slider Tarifs
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
    
    //TimelineMax
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
    

    //Slider équipe
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
    
    //TimelineMax
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
    
   
 
// Sélecteur tarifs 


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

$(".coiffeur").hover(function(){
    
});