$(function(){

  //header top fix when scrolling down
  const offTop = $(".gnb").offset().top;
  let fixHeader = function(){
    $(window).scroll(function(){
      let scroll = $(window).scrollTop();
      let winWidth = $(window).width();
      if(winWidth <= 480 && offTop <= scroll){
        $(".gnb").css({"position":"fixed"});
      } else {
        $(".gnb").css({"position":"relative"});
      }
    });
  }

  fixHeader();

  $(window).resize(function(){  
    fixHeader();
  });

  //mobile menu click and show and hide menu
  $(".mobileMenu").click(function(){
    $(this).toggleClass("on");
    if($(this).hasClass("on")){
      $(this).find("i").attr("class", "fa fa-times");
      $(this).prev("ul").slideDown("fast");
    } else {
      $(this).find("i").attr("class", "fa fa-bars");
      $(this).prev("ul").slideUp("fast");
    }
  });

  let fitHeight = function(){
    $(window).resize(function(){
      let imgHeight = $(".arrivalCon>img").height();
      $(".arrivalCon").height(imgHeight);
    });   
  }

  fitHeight();

  $(".productImg").click(function(){
    let index = $(this).index();

    $(".productTxt").hide();
    $(".productTxt").eq(index).show();
  });

  $(".productImg").eq(0).trigger("click");
});