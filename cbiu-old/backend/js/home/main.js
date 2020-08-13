$(document).ready(function () {

    var carousel = $("#owl-demo");
    carousel.owlCarousel({
    items : 6,   
  	pagination: false,
    navigation:true,
    navigationText: [
     "<i class='fa fa-angle-left'></i>",
     "<i class='fa fa-angle-right'></i>"
      ],
    autoPlay : true,
  });

    $("#owl-main").owlCarousel({
 
      navigation:false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      autoPlay : true,
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
  
});