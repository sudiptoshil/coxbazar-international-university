$(document).ready(function(){
	
	
	//var limit=2;
	//var start=1;
	
	//pagina(start,limit);
	

}


);




$("#search").click(function()
{


	var limit=1;
	var start=1;
	
	pagina(start,limit);
	
	/*var com_type=$("#com_type_val").val();
	var fun=$("#fun_type").val();
	var position=$("#pos_label").val();
	var country=$("#con").val();
	
	
	
	$.ajax({
		type:'POST',
		dataType:'json',
        url: "http://www.worldvacant.com/main/search_job/",
		data:{
			com_type:com_type,fun:fun,position:position,country:country
			},
		success:function(data)
		{
			
			
			
			stuff="";
			var jobs=0;
		$.each(data.posts,function(key,val)
			{





				
				
				jobs=jobs+1;

				
				stuff=stuff+"<a href=http://www.worldvacant.com/main/job_detail_view/"+val.id+"  target='_blank' style='text-decoration:none;'><div class='row' style='background:#DDDDDD;margin-top:10px;margin-bottom:10px;border:2px solid;padding:15px;'>"
							
							+"<p style='color:red;font-weight:bold'>"+val.com_name+"</p>"
							+"<p style='color:black;font-weight:bold;font-size:16px;'>"+val.position+"</p>"
							+"<p>Education :"+val.com_id+"</p>"
							+"<p>Experience :"+val.exp+"</p>"
							+"<p>Deadline :"+val.date+"</p>"
							
							
							+"</div><a/>";







                




  


                                                    
				
					
				
				
			});


            
				
			                                    
				thed=document.getElementById("jobs");
				thed.innerHTML=stuff;

				thed=document.getElementById("job_count");
				thed.innerHTML=jobs;
				
				
				
			
			
			
			
		},
		error:function(error)
		{
			//alert('Server Error....');
		}
	});*/
	
});