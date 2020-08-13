
$.fn.expose = function(options) {
	
  var $modal = $(this),
      $trigger = $("a[href=" + this.selector + "]");
  
  $modal.on("expose:open", function() {
    
    $modal.addClass("is-visible");
    $modal.trigger("expose:opened");
	
		
	
	

  });
  
  $modal.on("expose:closes", function() {
    
    $modal.removeClass("is-visible");
    $modal.trigger("expose:closed");
  });
  
  $trigger.on("click", function() {
    
    //e.preventDefault();
    $modal.trigger("expose:open");
	
	
	
  });
  
  $modal.add( $modal.find(".closes") ).on("click", function(e) {
    
    //e.preventDefault();
    
    // if it isn't the background or close button, bail
    if( e.target !== this )
      return;
    
  	$modal.trigger("expose:closes");
  });
  
  return;
}

$("#Popup").expose();
$("#pop2").expose();

// Example Cancel Button

$(".cancel").on("click", function() {
  

              


  $(this).trigger("expose:closes");

			


});



function process_p2(){
	
	
	var name=$("#wname").val();
	var theme=$("#wtheme").val();
	var address=$("#waddress").val();
	var phone=$("#wphone").val();

	var vat=$("#wvat").val();

	if(name == '')
	{
			alert('information incomplete');
	}
	else{

	$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'jquery_data/addwirehouse',
		data:{name:name,theme:theme,address:address,phone:phone,vat:vat},
		success:function(data)
		{
			
			
				
				alert('inserted');
				
	window.location=li+"admin/create_user";		
			
			
			
		},
		error:function(jqXHR, textStatus, errorThrown)
		{
			//alert("Server Error");
				if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found.');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error.');
                } else if (errorThrown === 'parsererror') {
                    alert('Requested JSON parse failed');
                } else if (errorThrown === 'timeout') {
                    alert('Time out error');
                } else if (errorThrown === 'abort') {
                    alert('Ajax request aborted ');
                } else {
                    alert('Uncaught Error.\n' + jqXHR.responseText);
                }

		}
		});
	
}
}




















