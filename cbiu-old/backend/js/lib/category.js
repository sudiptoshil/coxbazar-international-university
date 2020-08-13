      
var li=links();




	$("#edit a").click(function(){
		
		
		var id=$(this).attr('data-id');
		var name=$("#"+id).text();
		
		
		var stuff="<input class='form-control' value='"+name+"' id='"+id+"s'>";
		
		document.getElementById(id).innerHTML=stuff;
		
		
		
		
		$("#"+id+"s").focus();
		
	});




		$(".f span").focusout(function(){
			
			
			var id=$(this).attr('id');
			var table=$(this).attr('data-table');
			
			var val=$("#"+id+"s").val();
			
			
			   $.ajax({
		         type:'POST',
		         url:li+'jquery_data/update_category',
		         data:{id:id,val:val,table:table},
		         success:function(data)
		           {
			
			
		
		document.getElementById(id).innerHTML=val;
			
			
			
                   },
		       error:function(jqXHR, textStatus, errorThrown)
		{
			//alert("Server Error");
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
			
			
			
		});


	function subcategories(v){
		
		var cate=$(v).val();
		
		
		                      $.ajax({
		                    type:'POST',
		                    dataType:'json',
		                    url:li+'admin/getSubCategory',
		                    data:{cate:cate},
		                    success:function(data)
		                        {
									
									
										var stuff="";

                                         $.each(data.posts,function(key,val)
			                                           {

											stuff=stuff+"<option value="+val.id+">"+val.name+"</option>";
                                  
                                                                                       

                                                        });

									//document.getElementById("sub").innerHTML=stuff;

									
									$("#subcate").html(stuff);

                                            },
		                     error:function(error)
		                          {
			                       alert("Server Error");
		                       }
	});
	
	
	
		
		
	}

	  function categories()
        {

                        var cate=$("#cate").val();

                      $.ajax({
		                    type:'POST',
		                    dataType:'json',
		                    url:li+'admin/getSubCategory',
		                    data:{cate:cate},
		                    success:function(data)
		                        {




                                    var stuff="";
									stuff=stuff+"<option value='0'></option>";

                                     $.each(data.posts,function(key,val)
			                              {

                                               stuff=stuff+"<option value="+val.id+">"+val.name+"</option>";
                                  
                                                                                       

                                          });



							document.getElementById("sub").innerHTML=stuff;





                                },
		                     error:function(error)
		                          {
			                       alert("Server Error");
		                       }
					});


         }