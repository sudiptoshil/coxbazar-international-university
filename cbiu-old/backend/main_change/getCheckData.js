
var li=links();






$("input:checkbox").on('click',function()
{
	var get_value=$(this).val();
	
	
	 

	
	$box=$(this);
	if($box.is(":checked")){
		

  
		$.ajax({
		type:'POST',
		dataType:'json',
		url: li+'mains/getCheckData/',
		data:{get_value:get_value},
		success:function(data)
		{
			
			$("#nam").val(data.first_name);
			$("#emai").val(data.email);
			$("#addre").val(data.address);
			$("#mobil").val(data.mobile);
			
			
			
			
		},
		error:function(error)
		{
			alert("You Are Unregistered.....");
		}
	});
		}
		else
		{


			$("#nam").val('');
			$("#emai").val('');
			$("#addre").val('');
			$("#mobil").val('');
		}
});
$("input:radio").on('click',function()
{
	var get_value=$(this).val();
	
	if(get_value == 'bKash')
	{
		$("#div").show();
	}
	else{
		$("#div").hide();
	}
	
	
});