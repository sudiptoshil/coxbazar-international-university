	function links()
		{
	
	
				var li="http://www.cursorbd.com/dawah/";
			//var li="http://localhost/hirakraja/";
	
	
	
			return li;
	
		}
	
	
	function update_color(id){
		
		
		

		
		
		
		
		
		var type=$("#"+id).attr('data-id');
		var ids=$("#"+id).val();
		
		
		
		
		
			if(type == 1)
				col="color";
			else
				col="size";
		
		
		
		$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'admin/color_update',
		data:{id:id,ids:ids,col:col},
		success:function(data)
		{
			
			
			
			
		},
		error:function(jqXHR, textStatus, errorThrown)
		{
				
			if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error');
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
		
		
		
		
		
		
		
		
	
	
	function colors_s(data,id){
		
		
		$("#colors").empty();
		
		var stuff="";
					$.each(data.posts,function(key,val)
					{
	
							stuff=stuff+"<tr class='success'>"
								+"<td></td>"
								+"<td></td>"
								+"<td><input onkeyup='update_color("+val.id+")' class='form-control' data-id='1' id="+val.id+" value="+val.color+"></td>"
								+"<td><input onkeyup='update_color("+val.id+")' class='form-control' data-id='2' id="+val.id+" value="+val.size+"></td>"
								+"<td><a href='#' data-id="+id+" onclick=delete_color("+val.id+","+id+")>X</a></td>"
							
							+"</tr>";
	
					});
					
			document.getElementById("colors").innerHTML=stuff;
	}

	
	function delete_color(id,root){
		
		var c=confirm('Are you sure to delete ?');
		
		
	
		if(c == true){
			
			$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'admin/color_deletes',
		data:{id:id,root:root},
		success:function(data)
		{
			
			
			colors_s(data,root);
			
			
		},
		error:function(jqXHR, textStatus, errorThrown)
		{
				
			if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error');
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
	
$(".cpro button").click(function(){
			
			
			var id=$(this).attr('data-id');
			var color=$(".c").val();
			var size=$(".s").val();
			
			if(id != '' && color != '' && size != ''){
				
		$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'admin/add_color',
		data:{id:id,color:color,size:size},
		success:function(data)
		{
			
			
			colors_s(data,id);
			
					
					
					
					
		},
		error:function(jqXHR, textStatus, errorThrown)
		{
				
			if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error');
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
			else{
				
				alert('incomplete');
				
				
				
			}
			
			
			
});
