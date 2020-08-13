$(document).ready(function () {

    var carousel = $("#owl-demo");
    carousel.owlCarousel({
  	pagination: false,
    navigation:true,
    navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ],
  });

    var carousel = $("#owl-demo-one");
    carousel.owlCarousel({
  	pagination: false,
    navigation:true,
    navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ],
  });

  var carousel = $("#owl-demo-two");
    carousel.owlCarousel({
    pagination: false,
    navigation:true,
    navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ],
  });  

    $("#owl-main").owlCarousel({
 
      navigation:false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });

              var $tabs = $('#horizontalTab');
              $tabs.responsiveTabs({
                  rotate: false,
                  startCollapsed: 'accordion',
                  collapsible: 'accordion',
                  setHash: true,
                  activate: function(e, tab) {
                      $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                  },
                  activateState: function(e, state) {
                      //console.log(state);
                      $('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                  }
              });

              $('#start-rotation').on('click', function() {
                  $tabs.responsiveTabs('startRotation', 1000);
              });
              $('#stop-rotation').on('click', function() {
                  $tabs.responsiveTabs('stopRotation');
              });
              $('#start-rotation').on('click', function() {
                  $tabs.responsiveTabs('active');
              });
              $('#enable-tab').on('click', function() {
                  $tabs.responsiveTabs('enable', 3);
              });
              $('#disable-tab').on('click', function() {
                  $tabs.responsiveTabs('disable', 3);
              });
              $('.select-tab').on('click', function() {
                  $tabs.responsiveTabs('activate', $(this).val());
              });



              ( function( $ ) {
              $( document ).ready(function() {
              $('.menu li.sub>a').on('click', function(){
              $(this).removeAttr('href');
              var element = $(this).parent('li');
              if (element.hasClass('open')) {
              element.removeClass('open');
              element.find('li').removeClass('open');
              element.find('ul').slideUp();
              }
              else {
                    element.addClass('open');
              element.children('ul').slideDown();
              element.siblings('li').children('ul').slideUp();
              element.siblings('li').removeClass('open');
              element.siblings('li').find('li').removeClass('open');
              element.siblings('li').find('ul').slideUp();
                    }
              });

              $('.menu>ul>li.sub>a').append('<span class="holder"></span>');

              (function getColor() {
                    var r, g, b;
                    var textColor = $('.menu').css('color');
              textColor = textColor.slice(4);
              r = textColor.slice(0, textColor.indexOf(','));
              textColor = textColor.slice(textColor.indexOf(' ') + 1);
              g = textColor.slice(0, textColor.indexOf(','));
              textColor = textColor.slice(textColor.indexOf(' ') + 1);
              b = textColor.slice(0, textColor.indexOf(')'));
              var l = rgbToHsl(r, g, b);
              if (l > 0.7) {
                    $('.menu>ul>li>a').css();
              $('.menu>ul>li>a>span').css('border-color', 'rgba(0, 0, 0, .35)');
              }
              else
              {
                    $('.menu>ul>li>a').css();
              $('.menu>ul>li>a>span').css('border-color', 'rgba(255, 255, 255, .35)');
                          }
                    })();

                    function rgbToHsl(r, g, b) {
                        r /= 255, g /= 255, b /= 255;
                        var max = Math.max(r, g, b), min = Math.min(r, g, b);
                        var h, s, l = (max + min) / 2;

                        if(max == min){
                            h = s = 0;
                        }
                        else {
                            var d = max - min;
                            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                            switch(max){
                                case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                                case g: h = (b - r) / d + 2; break;
                                case b: h = (r - g) / d + 4; break;
                            }
                            h /= 6;
                        }
                        return l;
                    }
              });

              })( jQuery )


              $(document).ready(function() {
            // Test for placeholder support
              $.support.placeholder = (function(){
                  var i = document.createElement('input');
                  return 'placeholder' in i;
              })();

              // Hide labels by default if placeholders are supported
              if($.support.placeholder) {
                  $('.form-label').each(function(){
                      $(this).addClass('js-hide-label');
                  });  

                  // Code for adding/removing classes here
                  $('.form-group').find('input, textarea').on('keyup blur focus', function(e){
                      
                      // Cache our selectors
                      var $this = $(this),
                          $parent = $this.parent().find("label");

                      if (e.type == 'keyup') {
                          if( $this.val() == '' ) {
                              $parent.addClass('js-hide-label'); 
                          } else {
                              $parent.removeClass('js-hide-label');   
                          }                     
                      } 
                      else if (e.type == 'blur') {
                          if( $this.val() == '' ) {
                              $parent.addClass('js-hide-label');
                          } 
                          else {
                              $parent.removeClass('js-hide-label').addClass('js-unhighlight-label');
                          }
                      } 
                      else if (e.type == 'focus') {
                          if( $this.val() !== '' ) {
                              $parent.removeClass('js-unhighlight-label');
                          }
                      }
                  });
              } 
          });

              
  
});