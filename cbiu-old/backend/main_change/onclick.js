
 $("button").click(function() {
	 
	 
	var id= $(this).val();
	
	
	if(id == 'login' || id == 'modal')
	{
		
			

		
	}
	else{
		
		//$('#extruderRight').openMbExtruder(true);
	//$('#extruderRight').openPanel();
		
	}
	
	
		
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
          


