$( document ).ready(function() {

  function scripts(){

    $(".royalslider").royalSlider({
      keyboardNavEnabled: true,
      imageScaleMode : 'fill',
      imageScalePadding: 0,
      transitionType: 'fade',
      controlNavigation: 'bullets',
      autoHeight: true,
      autoPlay: {
        // autoplay options go gere
        enabled: true,
        pauseOnHover: true
      },
      block: {
        delay: 400
      }
    });

    $(".tabbed").tabber();

    $("#product-slideshow").royalSlider({
      keyboardNavEnabled: true,
      imageScaleMode : 'fill',
      imageScalePadding: 0,
      transitionType: 'fade',
      controlNavigation: 'none',
      autoScaleSlider: true,
      autoScaleSliderWidth: 800,
      autoScaleSliderHeight: 800,
      block: {
        delay: 400
      },
      arrowsNav: false,
      arrowsNavAutoHide: false,
    });

    if ( $('#head').length ) {
    var sticky = new Waypoint.Sticky({
      element: $('#head')[0],
      wrapper: '<div class="header-wrapper"/>',
    });
    }

    if ( $('#toolbar.events, #store-bar').length ) {
    var eventSticky = new Waypoint.Sticky({
      element: $('#toolbar.events, #store-bar')[0],
      wrapper: '<div class="event-bar-wrapper"/>',
      offset: 50,
    });
    }



    $window = $(window);

  $('.page-header, .simple-header, .simple-header .inner').each(function(){
    var $bgobj = $(this);
    $(window).scroll(function() {
      var yPos = ($window.scrollTop() / $bgobj.data('speed'));
      var coords = '50% '+ yPos + 'px';
      $bgobj.css({ backgroundPosition: coords });
    });

  });

    $('.toolbar .search').click(function(event){
      event.preventDefault();
      $('#search-footer').fadeIn(300);
    });

    $('#search-footer .close').click(function(event){
      event.preventDefault();
      $('#search-footer').fadeOut(300);
    });

    var swiper = new Swiper('.swiper-container', {
      // pagination: '.swiper-pagination',
      // nextButton: '.swiper-button-next',
      // prevButton: '.swiper-button-prev',
      effect: 'cube',
      grabCursor: false,
      allowSwipeToNext : false,
      allowSwipeToPrev : false,
      simulateTouch: false,
      cube: {
          shadow: false,
          slideShadows: true,
          shadowOffset: 20,
          shadowScale: 0.94
      }
    });

    setTimeout(function(){
      swiper.slideTo(1);
    },500);

    function hoverEffect(){
      $( "#logo" ).mouseenter(function() {
      //n += 1;
      swiper.slideTo(0);
      }).mouseleave(function() {
      swiper.slideTo(1);
      });
    }

    hoverEffect();

    //$('#accordion ul').accordion();

    $('.popup').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

    $('.popup-with-form').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#name',
    modal: true,

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      beforeOpen: function() {
        if($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#contactFormName';
        }
      }
    }
  });

    $(document).on('click', '.popup-modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
  });

  $('#product-slideshow').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'image-slideshow-bg',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      // titleSrc: function(item) {
      //   return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
      // }
    }
  });

  }

  scripts();

  // Quick Look Modal

  $('.quicklook').magnificPopup({
    type: 'ajax',
    mainClass: 'quicklook-modal gridlock-fluid',
    ajax: {
      settings: null,
      cursor: 'mfp-ajax-cur',
      tError: '<a href="%url%">The content</a> could not be loaded.'
    },
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('#product');
        console.log('Ajax content loaded:', mfpResponse);
      },
      ajaxContentAdded: function() {
        console.log(this.content);
        scripts();
      },
    }
  });

  // Formstone Stuffs
  $(".selector-wrapper select").selecter({
    customClass: '',
    //cover: true,
    label: 'Make a selection'
  });

});