
$(window).on("load",function() {
	/* start fixed top header on scroll*/
	$(window).scroll(function() {
	    var scroll = $(window).scrollTop();

	    if (scroll > 250) {
	        $(".header-area-bottom").addClass("fixed-top animated fadeInDown");
	    } else {
	        $(".header-area-bottom").removeClass("fixed-top animated fadeInDown");
	    }
	});
	/* end fixed top header on scroll*/

	jQuery(".loading").fadeOut();
    jQuery(".loading-in").delay(2000).fadeOut("slow");

	//$('.loading').addClass('fadeOut');

	/* start home page slider */
	$('.flexslider').flexslider({
        animation: "slide",
        slideshowSpeed: 4000,
      });
	/*var target_flexslider = $('.flexslider');
       target_flexslider.flexslider({
           animation: "slide",  
           slideshow: false,
           controlsContainer: ".slider",

           start: function(slider) {
               target_flexslider.removeClass('loading');
           }
	});*/
   /* slider-notice-scroll */
   $("#scroller:first").simplyScroll({
   		orientation: 'vertical',
      	pauseOnHover: true
    });
   $("#breaking_news:first").simplyScroll({
   		orientation: 'horizontal',
      	pauseOnHover: true
    });
   /* end slider-notice-scroll */
   	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd",
		changeYear: true,
		changeMonth: true,
		yearRange: "c-90:c-0"
	});

	/*$('.flexslider').flexslider({
		animation: "slide"
	});*/
	/* end home page slider */

	/* start event*/
  	$(".event-body > .owl-carousel").owlCarousel({
	    items:2,
	    lazyLoad:true,
	    dots: false,
	    nav:true,
	    navText: ['<i class="fas fa-angle-left fa-3x"></i>','<i class="fas fa-angle-right fa-3x"></i>'],
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        400:{
	            items:2,
	            nav:true,
	    		marginleft:20,
	    		marginRight:20
	        },
	        768:{
	            items:3,
	            nav:true,
	    		marginleft:20,
	    		marginRight:20
	        },
	        1200:{
	            items:4,
	            nav:true,
	    		marginleft:20,
	    		marginRight:20
	        }
	    }
	});
	/* end event*/
	
	/* start department*/
  	$(".owl-carousel").owlCarousel({
	    items:4,
	    lazyLoad:true,
	    loop:true,
	    margin:50,
	    dots: false,
	    nav:true,
	    navText: ['<i class="fas fa-angle-left fa-3x"></i>','<i class="fas fa-angle-right fa-3x"></i>'],
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        400:{
	            items:2,
	            nav:true,
	    		marginleft:20,
	    		marginRight:20
	        },
	        768:{
	            items:3,
	            nav:true,
	    		marginleft:20,
	    		marginRight:20
	        },
	        1200:{
	            items:4,
	            nav:true,
	    		marginleft:20,
	    		marginRight:20
	        }
	    }
	});
	/* end department*/
	/*function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }*/
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });

	/* page notice-board */
	$(document).ready(function() {
		$('#notice-card-right-body-table').DataTable( {
	        select: true
	    });
		$('#all-notice').DataTable({
	        select: true
	    });
		$('.all_alumni').DataTable({
	        select: true
	    });
		$('.all-teachers').DataTable({
	    });
	});
	/* end page notice-board */
	
	/* start contact us area */
    	
    function contact_us_submit() {
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var subject = $('#subject').val();
        var description = $('#description').val();
        
        //alert(name);
        if(name == ''){
            $('.contact_error').html("<span class='text-danger text-bold animated fadeOut delay-2s'>Your name is required.</span>");
        }else if(email == ''){
            $('.contact_error').html("<span class='text-danger text-bold animated fadeOut delay-2s'>Your email is required.</span>");
        }else if(phone == ''){
            $('.contact_error').html("<span class='text-danger text-bold animated fadeOut delay-2s'>Your phone number is required.</span>");
        }else if(subject == ''){
            $('.contact_error').html("<span class='text-danger text-bold animated fadeOut delay-2s'>Subject is required.</span>");
        }else if(description == ''){
            $('.contact_error').html("<span class='text-danger text-bold animated fadeOut delay-2s'>Description is required.</span>");
        }else {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: li + 'home/contact_us_submit',
                data: {name:name, email:email, phone:phone,subject:subject,description:description},
                success: function(data){
                    //alert(data);
                    if(data == 1){
                        $('.contact_error').html('<span class="text-success animated fadeOut delay-2s">Successfully submitted.</span>');
                        $('#contact_us_form').trigger('reset');
                    }else{
                        $('.contact_error').html('<span class="text-danger animated fadeOut delay-2s">Not send.</span>');
                    }
                },error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 0) {
                        alert('Not connect.\n Verify Network.');
                    } else if (jqXHR.status == 404) {
                        alert('Requested page not found. [404] - Click \'OK\'');
                    } else if (jqXHR.status == 500) {
                        alert('Internal Server Error. [500] - Click \'OK\'');
                    } else if (errorThrown === 'parsererror') {
                        alert('Requested JSON parse failed - Click \'OK\'');
                    } else if (errorThrown === 'timeout') {
                        alert('Time out error - Click \'OK\' and try to re-submit your responses');
                    } else if (errorThrown === 'abort') {
                        alert('Ajax request aborted ');
                    } else {
                        alert('Uncaught Error.\n' + jqXHR.responseText + ' - Click \'OK\' and try to re-submit your responses');
                    }
                }
            });
        }
    }
	/* end contact us area */
});