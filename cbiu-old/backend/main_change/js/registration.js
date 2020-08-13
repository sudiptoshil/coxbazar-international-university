


$("#singlebutton").click(function() {
	
	var li=links();
	
	
	var email=$("#email").val();
	var pass=$("#pass").val();
	var con_pass=$("#con_pass").val();
	var f_name=$("#f_name").val();
	var l_name=$("#l_name").val();
	var company=$("#company").val();
	var phone_number=$("#phone_number").val();
	var address1=$("#address1").val();
	var address2=$("#address2").val();
	var city=$("#city").val();
	var country=$("#country").val();
	var state=$("#state").val();
	var zip=$("#zip").val();
	

	if(typeof email == 'undefined')
		var is="";
	else if(email != '' && email != 0 && pass == con_pass && pass != '' && con_pass != '' && pass != 0 && con_pass != 0)
	{
		
		$.ajax({
			type:'POST',
			dataType:'json',
       		url: li+"mains/registration/",
			data:{email:email,pass:pass,con_pass:con_pass,f_name:f_name,l_name:l_name,company:company,phone_number:phone_number,address1:address1,address2:address2,city:city,country:country,state:state,zip:zip},
					success:function(data)
						{
			
			
			
			if(data.id ==0)
				alert('already inserted');
			else
				window.location=li;
					
		
			
						},
					error:function(error)
						{

							alert('Please check your internet connection');
						}
				});
		
		
	}
	else
		alert('information incomplete');
	
	




});
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}