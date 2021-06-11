jQuery(document).ready(function($){'use strict';

	// Sticky Nav
   $(window).on('scroll', function(){
      if ( $(window).scrollTop() > 100 ) {
         $('.site-navigation, .header-white').addClass('navbar-fixed');
      } else {
         $('.site-navigation, .header-white').removeClass('navbar-fixed');
      }
   });

  // Search
  $('.icon-search-btn').on('click', function(event) {
    event.preventDefault();
    var $sitesearch = $('.site-search');
    if ($sitesearch.hasClass('show')) {
      $sitesearch.removeClass('show');
      $sitesearch.fadeOut('fast');
    }else{
      $sitesearch.addClass('show');
      $sitesearch.fadeIn('slow');
    }
  });

  $('.icon-search-btn-close').on('click', function(event) {
    event.preventDefault();

    var $sitesearch = $('.site-search');
    $sitesearch.removeClass('show');
    $sitesearch.fadeOut('fast');
  });

    $('.woocommerce-product-gallery__image a').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });


   /* ----------------------------------------------------------- */
   /*  Back to top
   /* ----------------------------------------------------------- */

       $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
      // scroll body to 0px on click
      $('#back-to-top').on('click',function () {
          $('#back-to-top').tooltip('hide');
          $('body,html').animate({
              scrollTop: 0
          }, 800);
         
          return false;
      });

      $('#back-to-top').tooltip('hide');
     $('.nano').nanoScroller();

    /* HEADER TRIGGER HANDLER */
    $("#header-trigger").on('click',function(){
      var body = $('body');
      if (body.hasClass('display-header'))
      {
        body.removeClass('display-header');
      } else {
        body.addClass('display-header');
      }
    });

    /* ----------------------------------------------------------- */
    /*  Sticky Sidebar
    /* ----------------------------------------------------------- */
    jQuery('.stickys').theiaStickySidebar();

});