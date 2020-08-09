$( document ).ready(function() {

 /*======================================================
  EQUAL HEIGHTS
  ========================================================*/
  $(window).load(function() {
    equalheight('.single_solution');
    equalheight('.listing-product-text');
    equalheight('.w-col .funnel');
    equalheight('.listing-category-text .listing-category-shortdesc');
  });


  $(window).resize(function(){
    equalheight('.single_solution');
    equalheight('.listing-product-text');
    equalheight('.w-col .funnel');
    equalheight('.listing-category-text .listing-category-shortdesc');
  });

/*======================================================
STICKY MENU
========================================================*/

  $(function() {
    var header = $("#masthead");
    var hero = $("#home_hero");
    $(window).scroll(function() {    
      var scroll = $(window).scrollTop();
  
      if (scroll >= 30) {
        header.addClass("mini-header");
        hero.addClass("hidden");
      } else {
        header.removeClass("mini-header");
        hero.removeClass("hidden");
      }
    });
  });

/* END OF FILE*/
});
