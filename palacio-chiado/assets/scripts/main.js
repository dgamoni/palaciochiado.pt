/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // To be used in onImagesLoaded and interceptLinks.
  var fadeDuration = 1000;


  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Palacio = {
    // All pages
    'common': {
      init: function() {
        scrollLinkClick();
        onScrollMove();
        openMainMenu();
        openLangMenu();
        SetSelectedLang();
        changeSelectedLang();
        hideScrollLink();
        onImagesLoaded();
        interceptLinks();
      },

      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },


    // Home page
    'home': {
      init: function() {
        // Homepage slider
        $('.slider').bxSlider({
          mode: 'fade',
          onSlideAfter: function($slideElement, oldIndex, newIndex){
            var elem = $('.slider__item').get(newIndex);
            $('.slider__item').removeClass('active');
            $(elem).addClass('active');
          }
        });


        $('.js-menu').on('click', function(e) {
          $('.site-nav').toggleClass('site-nav--home');
        });

        homepageMenu();

      },
    },


    // Sala Multiusos page
    'salaquintela': {
      init: function() {
        $('input').on('focus', function() {
          $(this).parents('.form__block').addClass('active');
        });

        $('input').on('blur', function() {
          if(!$(this).val()) {
            $(this).parents('.form__block').removeClass('active');
          }
        });
      }
    },

    // Single restaurants and Bars page
    'single': {
      init: function() {
        $('.slider').bxSlider({
          mode: 'fade',
          onSlideAfter: function($slideElement, oldIndex, newIndex){
            var elem = $('.slider__item').get(newIndex);
            $('.slider__item').removeClass('active');
            $(elem).addClass('active');
          }
        });

        $('.js-tab-item .js-pager-container:first-child').addClass('active');
        $('.js-tab:nth-of-type(2)').addClass('active');
        initTabs();
      }
    },

    // History page
    'o_palacio_historia': {
      init: function() {
        scrollToElem();
        activateCenteredItem();
        historyItemsHover();

        $('.js-open-history-nav').on('click', function(e) {
          e.preventDefault();

          $(this).toggleClass('closed');
          $('.history-nav').toggleClass('history-nav--closed');
        });
      }
    },

    // Events page
    'sala_agenda': {
      init: function() {
        $('.js-event').on('click', function(e) {
          e.preventDefault();
          $(this).toggleClass('active');
        });
      }
    },

    'restaurantes': {
      init: function() {
        initTabs();
        $('.js-tab-item').first().addClass('active');
        $('.js-tab').first().addClass('active');
      }
    }
  };

  // Tabs
  //-----------------------------------------------------------------
  function initTabs() {
    // Change pager pages
    function changePager(pagerLink) {
      $(pagerLink).on('click', function(e) {
        e.preventDefault();
        var elemIndex = $(this).parent().index(),
            parentTabContext = '.js-tab-item.active .js-pager-container',
            containerToDisplay = $(parentTabContext)[elemIndex];

        $(this).parents('.menu__pager').find('li').removeClass('active');
        $(this).parent().addClass('active');
        $(parentTabContext).removeClass('active');
        $(containerToDisplay).addClass('active');
      });
    }

    // Show tab content based on active tab
    function showTabContent() {
      var activeTab = $('.js-tab.active').index(),
      activeTabContent = $('.js-tab-item')[activeTab];

      $('.js-tab-item').removeClass('active');
      $(activeTabContent).addClass('active');
    }

    // Change active tab on click and call function to change content
    function changeTabContent() {
      $('.js-tab a').on('click', function(e){
        e.preventDefault();
        $('.js-tab').removeClass('active');
        $(this).parent().addClass('active');

        // Change active content
        showTabContent();
      });
    }

    changePager('.js-menu-pager');
    showTabContent();
    changeTabContent();
  }
  //-----------------------------------------------------------------

  // On scroll down link click
  function scrollLinkClick() {
    $('.js-scroll').on('click', function(e) {
      e.preventDefault();
      var headerHeight = $(this).parents('.header').outerHeight(),
          offSet = headerHeight;

      $(this).css('animation-name', '');
      $('.scroll-down').addClass('active');

      setTimeout(scrollDown(offSet), 500);
    });
  }

  // Scroll window down with smoothly
  function scrollDown(offSet) {
    $('html, body').animate({scrollTop: offSet }, 900);
  }

  // Detect vertical scroll offset
  var yOffset;
  function detectScrollOffset() {
    yOffset = window.scrollY;
  }

  // Remove active class from scroll link
  function removeScrollActive() {
    detectScrollOffset();
    var headerHeight = $('.header').outerHeight();

    if(yOffset < headerHeight) {
      $('.scroll-down').removeClass('active');
    }
  }

  // Detect up direction scroll and do things
  function onScrollMove() {
    var lastScrollTop = 0;

    $(window).on('scroll', function(){
      var st = $(this).scrollTop();

      if (st < lastScrollTop){
        removeScrollActive();
      }

      if (st > lastScrollTop && st > 400){
        $('.site-nav').addClass('closed');
      } else {
        $('.site-nav').removeClass('closed');
      }

      lastScrollTop = st;
    });
  }

  // Hide scroll down link on scroll down
  function hideScrollLink() {
    var halfHeaderHeight = $('.header').outerHeight() / 2;

    $(window).on('scroll', function(){
      var scrollVal = $(this).scrollTop();

      if(halfHeaderHeight < scrollVal) {
        $('.scroll-down').addClass('active');
      } else {
        $('.scroll-down').removeClass('active');
      }
    });
  }

  // Open main menu
  function openMainMenu() {
    $('.js-menu').on('click', function(e) {
      e.preventDefault();
      $('.js-site-menu').slideToggle();
      $(this).toggleClass('site-nav__mobile--opened');
    });
  }

  // Open language menu
  function openLangMenu() {
    $('.js-lang').on('click', function(e) {
      e.preventDefault();
      $('.js-lang-list').slideToggle();
    });
  }

  // Change selected language on lang menu
  function changeSelectedLang() {
    $('.js-lang-list a').on('click', function(){
      SetSelectedLang();
    });
  }

  // Set language menu selected lang
  function SetSelectedLang() {
    var lang = $('.js-lang-list .active').text();
    $('.js-selected-lang').text(lang);
  }

  // Scroll to an in page element
  function scrollToElem() {
    windowHeight = $(window).height() / 3.5;
    $('.js-event-nav').on('click', function(e) {
      e.preventDefault();
      var href = $(this).attr('href');
      $("html, body").stop().animate({
          scrollTop: $(href).offset().top - windowHeight
      }, 1000);
    });
  }

  // Change Homepage top nav menu styles on scroll down
  function homepageMenu() {
    $(window).on('scroll', function(){
      var st = $(this).scrollTop();

      if(st > 50) {
        $('.site-nav').removeClass('site-nav--home');
        $('.js-lang').addClass('lang-menu--white');
      } else {
        $('.site-nav').addClass('site-nav--home');
        $('.js-lang').removeClass('lang-menu--white');
      }
    });
  }

  // Create object with elements id and top offset
  function getElemOffsetTop(elem, obj) {
    $(elem).each(function(){
      var id = $(this).attr('id'),
          offsetTop = $(this).offset().top;
      obj[id] = offsetTop;
    });
  }


  // Add class active to item on the center of screen
  function activateCenteredItem() {
    var historyElemTop = {},
        windowHeight = $(window).height() / 2;

    getElemOffsetTop('.js-history-item', historyElemTop);

    $(window).on('scroll', function(){
      var st = $(this).scrollTop(),
          windowOffsetTop = st + windowHeight,
          key;

      $('.js-history-item').removeClass('active');
      $('.js-history-nav').removeClass('active');
      $('.history-nav__content').removeClass('show');

      for(key in historyElemTop) {
        if(historyElemTop.hasOwnProperty(key)) {
          var offsetTop = historyElemTop[key],
              elemHeigh = $('#' + key).outerHeight(),
              elemOffsetBottom = offsetTop + elemHeigh;

          if(windowOffsetTop >= offsetTop && windowOffsetTop < elemOffsetBottom) {
            $('#' + key).addClass('active');
            $('.js-history-nav')
              .find('a[href="#'+ key +'"]')
              .parent().addClass('active')
              .find('.history-nav__content')
              .addClass('show');
          }
        }
      }
    });
  }

  function historyItemsHover() {
    $('.history-nav__item')
      .mouseover(function(){
        if(!$(this).hasClass('active')) {
          $('.history-nav__item.active').find('.history-nav__content').removeClass('show');
          $(this).find('.history-nav__content').addClass('show');
        }
      })
      .mouseout( function(){
        $('.history-nav__item.active').find('.history-nav__content').addClass('show');
        if(!$(this).hasClass('active')) {
          $(this).find('.history-nav__content').removeClass('show');
        }
      });
  }

  // Run imagesloaded plugin and fade in content when they're done.
  // Body has display none but as soon as the images are loaded it will fade in and
  // its style to display block.
  function onImagesLoaded() {
    $('body').imagesLoaded(function() {
      $('body').animate({ opacity: 1 }, fadeDuration);
    });
  }

  // Intercept clicked anchors and check if it was a site link.
  // If so, fade out the body and set the "location" to that value of the anchor.
  function interceptLinks() {
    var domain = document.domain;
    var regex = new RegExp(domain, 'g');

    $('a').on('click', function(e) {
      var href = $(this).attr('href');

      if (href.slice(0, 1) === '#') {
        return;
      }

      var matches = href.match(regex);

      if (matches && matches.length && matches[0] === domain) {
        e.preventDefault();
        $('body').fadeOut(fadeDuration, function() {
          window.location = href;
        });
      }
    });
  }

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Palacio;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.


