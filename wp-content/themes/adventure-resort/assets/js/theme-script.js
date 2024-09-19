function adventure_resort_openNav() {
  jQuery(".sidenav").addClass('show');
}
function adventure_resort_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function adventure_resort_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const adventure_resort_nav = document.querySelector( '.sidenav' );

      if ( ! adventure_resort_nav || ! adventure_resort_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...adventure_resort_nav.querySelectorAll( 'input, a, button' )],
        adventure_resort_lastEl = elements[ elements.length - 1 ],
        adventure_resort_firstEl = elements[0],
        adventure_resort_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && adventure_resort_lastEl === adventure_resort_activeEl ) {
        e.preventDefault();
        adventure_resort_firstEl.focus();
      }

      if ( shiftKey && tabKey && adventure_resort_firstEl === adventure_resort_activeEl ) {
        e.preventDefault();
        adventure_resort_lastEl.focus();
      }
    } );
  }
  adventure_resort_keepFocusInMenu();
} )( window, document );

var adventure_resort_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    adventure_resort_btn.addClass('show');
  } else {
    adventure_resort_btn.removeClass('show');
  }
});

adventure_resort_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
    var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
    margin: 0,
    nav:false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: false,
    dots: false,
    navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      },
      1200: {
        items: 1
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery('.header-search-wrapper .search-main').click(function(){
  jQuery('.search-form-main').toggleClass('active-search');
  jQuery('.search-form-main .search-field').focus();
});

jQuery(".featured h3.main-heading").html(function(){
    var text2 = jQuery(this).text().trim().split(" ");
    var numWords = 3; // Number of words to style

    if(text2.length > numWords){
        var lastWords = text2.slice(-numWords).join(" ");
        var updatedLastWords = `<span class='last_slide_head'>${lastWords}</span>`;
        var remainingText = text2.slice(0, -numWords).join(" ");
        return remainingText + " " + updatedLastWords;
    } else {
        var updatedTex2 = `<span class='last_slide_head'>${text2.join(" ")}</span>`;
        return updatedTex2;
    }
});

jQuery(".navbar-brand a").html(function(){
    var text2 = jQuery(this).text().trim().split(" ");
    var lastWord = text2.pop(); // Remove and store the last word

    if(text2.length > 0) {
        var remainingText = text2.join(" ");
        return `${remainingText} <span class='last_slide_head'>${lastWord}</span>`;
    } else {
        return `<span class='last_slide_head'>${lastWord}</span>`;
    }
});

