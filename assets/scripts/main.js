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

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        /*
        $('input.morphsearch-input').focus(function(){
          $(this).attr('placeholder','Search');
        });
        $('input.morphsearch-input').focusout(function(){
          $(this).attr('placeholder','');
        });
        */
        function windowPopup(url, width, height) {
          // Calculate the position of the popup so
          // it’s centered on the screen.
          var left = (screen.width / 2) - (width / 2),
              top = (screen.height / 2) - (height / 2);

          window.open(
            url,
            "",
            "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left
          );
        }

        $(function(){
          $("#bgndVideo").YTPlayer();
        });

        $(window).on("scroll", function() {
          if($(window).scrollTop() > 100) {
              $("body>header").addClass("header-scroll");
              $(".brand-logo").addClass("brand-logo-scroll");
              $(".nav").addClass("nav-scroll");
              $(".navbar-header").addClass("navbar-header-scroll");
              //$("#menu-redt-main-menu li a").addClass("menu-font-scroll");
          } else {
              //remove the background property so it comes transparent again (defined in your css)
             $("body>header").removeClass("header-scroll");
             $(".brand-logo").removeClass("brand-logo-scroll");
             $(".nav").removeClass("nav-scroll");
             $(".navbar-header").removeClass("navbar-header-scroll");
             //$("#menu-redt-main-menu li a").removeClass("menu-font-scroll");
          }
        });

        $(".js-social-share").on("click", function(e) {
          e.preventDefault();

          windowPopup($(this).attr("href"), 500, 300);
        });

        $(".bctt-ctt-text a").on("click", function(e) {
          e.preventDefault();

          windowPopup($(this).attr("href"), 500, 300);
        });

        // Vanilla JavaScript
        var jsSocialShares = document.querySelectorAll(".js-social-share");
        if (jsSocialShares) {
          [].forEach.call(jsSocialShares, function(anchor) {
            anchor.addEventListener("click", function(e) {
              e.preventDefault();

              windowPopup(this.href, 500, 300);
            });
          });
        }

        var jsClicktoTweet = document.querySelectorAll(".bctt-ctt-text a");
        if (jsClicktoTweet) {
          [].forEach.call(jsClicktoTweet, function(anchor) {
            anchor.addEventListener("click", function(e) {
              e.preventDefault();

              windowPopup(this.href, 500, 300);
            });
          });
        }

        function leftSlide(tab){
         $(tab).addClass('animated slideInLeft');
          }

          function rightSlide(tab){
             $(tab).addClass('animated slideInRight');   
          }

          $('li[data-toggle="tab"]').on('shown.bs.tab', function (e) {  
              var url = e.target;
              var pieces = url.split('#');
              var seq=$(this).children('a').attr('data-seq');
              var tab=$(this).children('a').attr('href');
              if (pieces[1] === "profile"){       
               leftSlide(tab);        
              }
          });

      $(document).ready(function() { 
        var navbarToggle = '.navbar-toggler'; // name of navbar toggle, BS3 = '.navbar-toggle', BS4 = '.navbar-toggler'  
        $('.dropdown, .dropup').each(function() {
          var dropdown = $(this),
            dropdownToggle = $('[data-toggle="dropdown"]', dropdown),
            dropdownHoverAll = dropdownToggle.data('dropdown-hover-all') || false;
          
          // Mouseover
          dropdown.hover(function(){
            var notMobileMenu = $(navbarToggle).size() > 0 && $(navbarToggle).css('display') === 'none';
            if ((dropdownHoverAll === true || (dropdownHoverAll === false && notMobileMenu))) { 
              dropdownToggle.trigger('click');
            }
          });
        });
      });
            

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
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

/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );


