(function($){
$(document).ready(function(){

/* Google WebFonts
------------------------------------------------------------------- */
WebFontConfig = {
  google: { families: [ 'Open+Sans:300italic,300,400,600:latin' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

/* Topnav Superfish
------------------------------------------------------------------- */
var $menu = $('.topnav').mmenu({
  position: 'right'
}, {
  clone: true
});
$('.mobile-menu').on('click', function(e){
  e.preventDefault();
  var trigger_event = 'open';

  if( $('.topnav.mm-menu').hasClass('mm-opened') ) {
    trigger_event = 'close';
  }

  $('.topnav.mm-menu').trigger( trigger_event );
});

$('.main-container .topnav ul:first').addClass('sf-menu').superfish();

/* Slider Black Pattern
------------------------------------------------------------------- */
$('.slider-black-pattern .slider-wrap, .slider-with-background .slider-wrap').owlCarousel({
  singleItem: true,
  autoHeight: true,
  navigation: true,
  navigationText: ['<i class="icon-chevron-left"></i>', '<i class="icon-chevron-right"></i>']
});

/* Slider Light
------------------------------------------------------------------- */
$('.slider-light .slider-wrap').owlCarousel({
  singleItem: true,
  autoHeight: true,
  navigation: true,
  lazyLoad: true,
  navigationText: ['<i class="icon-chevron-left"></i>', '<i class="icon-chevron-right"></i>'],
  afterInit: function(a,b,c) {
    this.owlControls.addClass('container');
    this.owlControls.find('.owl-buttons').addClass('container').insertAfter( this.owlControls );
  }
});

/* Slider with Background
------------------------------------------------------------------- */
$('.slider-background').anystretch('', {
  positionX: 'right'
});

/* Portfolio Slider
------------------------------------------------------------------- */
$('.portfolio-slider').owlCarousel({
  singleItem: true,
  autoHeight: true,
  navigation: false,
  lazyLoad: true
});

/* Media Slider
------------------------------------------------------------------- */
if( $('.media-slider').length > 0 ) {
  $('.media-slider').owlCarousel({
    singleItem: true,
    autoHeight: true,
    navigation: true,
    navigationText: ['<i class="icon-chevron-left"></i>', '<i class="icon-chevron-right"></i>']
  });
}

/* Media Video
------------------------------------------------------------------- */
$('.media-video').fitVids();

/* Service Carousel
------------------------------------------------------------------- */
$('.service-carousel, .portfolio-carousel, .blog-carousel').owlCarousel({
  items: 4,
  // autoHeight: true,
  navigation: true,
  theme: 'enron-carousel',
  rewindNav: false,
  navigationText: ['<i class="icon-chevron-left"></i>', '<i class="icon-chevron-right"></i>'],
  itemsTablet: [768, 3]
});

/* Widget Contact Label
------------------------------------------------------------------- */
$('.widget-contact, .contact-details, .comment-form')

  // On form row clicked
  .on('click', '.form-row, .input-wrapper', function(e){
    $(this).addClass('focused');
  })

  .on('focus', ':text, textarea', function(e){
    $(this).parent('.form-row, .input-wrapper').addClass('focused');
  })

  // On input blurred
  .on('blur', ':text, textarea', function(e){
    if( $(this).val() == '' ) {
      $(this).parent('.form-row, .input-wrapper').removeClass('focused');
    }
  });

});


/* Widget Accordion
------------------------------------------------------------------- */
$('.widget-accordion').each(function(){
  var $accordion = $(this);

  $accordion.on('click', '.accordion-header', function(){
    var $this = $(this);

    $this
      .addClass('selected')
      .next('.accordion-panel').slideDown('fast')
      // .siblings('.accordion-header').removeClass('selected')
      .siblings('.accordion-panel').slideUp('fast')
      .siblings('.accordion-header').not($this).removeClass('selected');
  });

  $accordion.find('.accordion-header:first').trigger('click');
});

/* Pricing Table Title
------------------------------------------------------------------- */
$('.pricing-table .price-attribute .price-attr-list li').each(function(index){
  var $list = $(this),
      text = $list.find('.attr-inner').html(),
      $target_list = $('.pricing-table .price-grid .price-attr-list li').filter(':nth-child('+ (index+1) +')');

  $target_list.find('.attr-inner').attr('data-title', text);
});


/* Google Maps
------------------------------------------------------------------- */
function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initializeGMaps';
  document.body.appendChild(script);
}

window.initializeGMaps = function() {
  var $maps = $('.google-maps'),
      latitude = parseInt( $maps.data('latitude'), 10 ),
      longitude = parseInt( $maps.data('longitude'), 10 ),
      position = new google.maps.LatLng(latitude, longitude),
      mapOptions = {
        zoom: 8,
        center: position
      },
      markerOptions = {
        position: position    
      };

  var map = new google.maps.Map( $maps[0], mapOptions );

  markerOptions.map = map;
  if( $maps.data('marker-icon') ) {
    markerOptions.icon = $maps.data('marker-icon');
  }
  var marker = new google.maps.Marker( markerOptions );
};

$(window).load(function(){
  if( $('.google-maps').length > 0 ) {
    loadScript();
  }
});

})(jQuery);