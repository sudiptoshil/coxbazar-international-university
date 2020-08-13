var xmlHttp=createXmlHttpRequest();


var li=links();

var j=0;
function createXmlHttpRequest(){
	var xmlHttp;
	if(window.XMLHttpRequest){
		xmlHttp=new XMLHttpRequest();
	}
	else{
		xmlHttp=new ActiveXObject();
	}
	return xmlHttp;
}



function loads(){




  var body='1';
  
  $.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/getCard',
		data:{body:body},
		success:function(data)
		{
			
				
				update_product(data);
	
		},
		error:function(jqXHR, textStatus, errorThrown)
		{
			//alert("Server Error");
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












function update_product(data)
{
	
	
	var stuff="";
	
	
	var product=0;
	var total=0;
	
	
	$.each(data.posts,function(key,val)
			{
	
	
	total=total + (val.qun * val.price);
	product++; 			
		stuff=stuff+"<div class='row or_row' style=''>"
		
					+"<ul class='ul_list "+val.id+"d' style='list-style:none;margin: 0; padding: 0;overflow:hidden'><li><span class='picture'><img src='"+li+"file_upload/"+val.root+"_sp.jpg'></span></li><li>"+val.product_name+"</li><li class='"+val.id+"qun_up'>x "+val.qun+"</li><li class='"+val.id+"am1_up'>"+(val.qun * val.price)+"</li><li><a onclick=addsing("+val.root+","+val.id+") id='"+val.root+"sss' data-hd='remove' data-role="+val.price+" href='#'><span class='glyphicon glyphicon-trash'></span></a></li></ul>"
					
		           +"</div>";			
					
					
					
					
					
	
			});
	
	document.getElementById("add").innerHTML=stuff;
	document.getElementById("add2").innerHTML=stuff;
	document.getElementById("sub_total").innerHTML=total;
	
	var s="<button type='submit' class='btn btn-info o-btn'>Place Order</button>";
	
	if(total > 0){
				$(".foote").show();

			document.getElementById("dataAdd").innerHTML=s;

	}
	
	
	document.getElementById("sum").innerHTML=total;
	document.getElementById("t").innerHTML=total;
	document.getElementById("item").innerHTML=product;
	
	
	$(".view_card").text(""+product+" items - "+total);
	
	

	 $('#sum').animateNumber(
    {
	
	number: total,
    //numberStep: comma_separator_number_step
	
	
	},
    500
	)
	
}


$("#cmodify button").click(function(){
	
	
	
	
	var id=$(this).attr('data-id');
	var type=$(this).attr('data-type');
	var q=parseInt($("#"+id+"q").text());
	var prices=parseFloat($("#"+id+"p").text());
	
	var tp=parseFloat($("#tp").text());
	var df=parseFloat($("#df").text());
	var vat=parseFloat($("#vat").text());
	
	if(type == "add" && q >0)
	{
		
		q = q + 1;

		tp=tp + prices;
		
	}
	else if(q > 1)
	{
		
		q = q - 1;

		tp=tp - prices;
		
	}
	
	var total= vat + tp + df;
	
	
	document.getElementById(id+"pp").innerHTML=q*prices;
	
	document.getElementById(id+"q").innerHTML=q;
	
	document.getElementById("tp").innerHTML=tp;
	
	document.getElementById("to").innerHTML=total;
	
	
	
	$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/data_update',
		data:{id:id,q:q,prices:prices},
		success:function(data)
		{
			
				
	
		},
		error:function(jqXHR, textStatus, errorThrown)
		{
			//alert("Server Error");
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
	
	
	
	
	
	
	
});



$(".buy button").click(function(){
	
	
	
	
	//$('#extruderRight').openMbExtruder(true);
	//$('#extruderRight').openPanel();
	
	
	var id=$(this).attr('data-id');
	
	var price=$(".buy i").text();
	
	var quns=$("#textinput").val();
	
	var size=$("#selectbasic").val();
	var color=$("#scolor").val();
	
	
	
	var ss=parseFloat($("#"+id+"p").text());

	if(ss > 0)
	{
		
		
		
		addsing2(id,1,1);
		
		
	}

	else{
		
		
		
		
	var qun=1;	
		
				
		if(quns > 0)
		 qun=parseInt(quns);
			
	
	
	var current_date=new Date();
	var now=current_date.getFullYear()+'-'+(current_date.getMonth()+1)+'-'+current_date.getDate();
		
	var hour    = current_date.getHours();
	var minute  = current_date.getMinutes();
	var second  = current_date.getSeconds();
		
	var time=hour+':'+minute+':'+second;
	
	
	
	
	
	$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/AddProduct',
		data:{id:id,price:price,now:now,time:time,qun:qun,size:size,color:color},
		success:function(data)
		{
			
				
				update_product(data);
	
		},
		error:function(jqXHR, textStatus, errorThrown)
		{
			//alert("Server Error");
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
	

	
	
	
	
});










function addsing2(id,t,c){
	
	
	
	
	
var more=parseInt($("#textinput").val());	
var price=parseFloat($("#"+id+"p").text());
var prices=parseFloat($("#"+id+"p").text());
var start=1;

var qun=parseInt($("#"+id+"q").text());

var totals=parseFloat($("#t").text())-(price * qun);
var s=parseFloat($("#t").text());

	var qq=1;
	var in_t=0;
	
	
if(more > 0 && t == 1 && c == 1)
{
	
	 qq=parseInt(more);
	 
	 price=(qq * price);
	 
	 
	
}
else{
	
	more=1;
	
	
}	
			
	
	if(t == 1){
		
var q=parseInt($("#"+id+"q").text())+1+(qq -1);

price=price+parseFloat($("#t").text());

			
			
			
	}
	else{
		
	var q=parseInt($("#"+id+"q").text())-1;
	
	
price=parseFloat($("#t").text())-price;	

		
	}
	
 
	
	
	if(q>0){
		
		
		
		
document.getElementById(id+"q").innerHTML=q;		
document.getElementById("t").innerHTML=price;
	

	
 $('#sum').animateNumber(
    {
	
	number: price,
    //numberStep: comma_separator_number_step
	
	
	},
    500
	)
	
	}	

	else
	q=1;

	
	
	
	
		$(".foote").show();
	
	
	
		
	
	
	
	
	

	$.ajax({
		type:'POST',
		//dataType:'json',
		url:li+'addCard/data_update',
		data:{id:id,q:q,prices:prices},
		success:function(data)
		{

			

		},
		error:function(jqXHR, textStatus, errorThrown)
		{
			//alert("Server Error");
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


function addsing(id,id2){
	
	
var total=parseFloat($("#"+id+"p").text())*parseInt($("#"+id+"q").text());

	
	
	var ids=$("#"+id+"sss").attr('data-role');
	var type=$("#"+id+"sss").attr('data-hd');
	
	
	var sub_amount=parseFloat($("#sub_total").text());
	var am=parseFloat($("."+id2+"am1_up").text());
	
	alert(sub_amount+" "+am);
	
	$("#sub_total").text(sub_amount);
	
	
	if(type == 'remove'){
		
		
		
		$("."+id2+"d").remove();
		
	}
	
	
	
	
	//var amount=$("."+id2+"qun").text();
	
	
	
	//alert(id2+"amount");
	
	
	/*var price=parseFloat($("#t").text()) - total;
	var qun=parseInt($("#item").text())-1;
	
	
	
	
		document.getElementById("t").innerHTML=price;
		document.getElementById("item").innerHTML=qun;

	
	if(price <1)
		$(".foote").hide();
	else
		$(".foote").show();

	
	

	  $('#sum').animateNumber(
     {
	
	 number: price,
	
	
	 },
     500
	)*/
	
	
	/*$.ajax({
		type:'POST',
		url:li+'addCard/data_delete',
		data:{id:id},
		success:function(data)
		{

			

		},
		error:function(jqXHR, textStatus, errorThrown)
		{
			//alert("Server Error");
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
	*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}



function handleXmlRequest_card()
{
	
	if(xmlHttp.readyState == 4){
		
		
		if(xmlHttp.status == 200){
			
			xmlResponse=xmlHttp.responseXML;
			price=xmlResponse.getElementsByTagName("pri");
			id=xmlResponse.getElementsByTagName("id");
			pro_name=xmlResponse.getElementsByTagName("product_name");				
			total=xmlResponse.getElementsByTagName("pric");
			qun=xmlResponse.getElementsByTagName("qun");
			total_price=xmlResponse.getElementsByTagName("sum");
			
			
			
			for(var i=0;i<price.length;i++)
							{
								
								$("#img").show();
								
							}
			
		
		}	
		
	}
	
}










function addCard_sceond(id,qun,tot,price,sp){
	
		
	
	
	var current_date=new Date();
		var now=current_date.getFullYear()+'-'+(current_date.getMonth()+1)+'-'+current_date.getDate();
		
		var hour    = current_date.getHours();
		var minute  = current_date.getMinutes();
		var second  = current_date.getSeconds();
		
		var time=hour+':'+minute+':'+second;
	
	
	
	
	var val=0;
	stuff="";
		
		if(qun == 1 && sp == 0){
			
			
		}
		
		else if(qun > 0){
		
		$(".img").show();
		
		
		
		$.ajax({
		type:'POST',
		dataType:'json',
        url: li+"main/send/decriment.php",
		data:{id:id,price:price,tot:tot,qun:qun,sp:sp},
		success:function(data)
		{
			var sub_total=0;
			$.each(data.posts,function(key,val)
				{
					
					stuff=stuff + "<tr>"
	+"<td>"+val.pro_name+"</td>"
	+"<td>"+val.price+"</td>"
	+"<td>"+(val.price * val.qun)+"</td>"
									
									
	+"<td><button type='button' class='btn btn-default o-btn'>"+val.qun+"</button>   <button type='button' class='btn btn-default o-btn' onclick=addCard_sceond("+val.root+","+val.qun+","+val.total+","+val.price+",1)><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>      <button type='button' class='btn btn-default o-btn' onclick=addCard_sceond("+val.root+","+val.qun+","+val.total+","+val.price+",0)><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button></td>"
									
									+"<td>"+now+"</td>"
									+"<td>"+time+"</td>"
									
									
									+"<td><button type='button' class='btn btn-default o-btn' onclick=process_drop("+val.root+")><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></td>"
										
								+"</tr>";
								
			sub_total=sub_total + + (val.price * val.qun);
					
				});	



						stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:18px;'>Total Product Price </td>"
								+"<td>"+sub_total+"</td>"
						+"</tr>";
						
						stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:18px;'>Delivery Fee </td>"
								+"<td>0</td>"
						+"</tr>";
						
						
						//var vat =((+total.item(0).firstChild.data/100)*+fees.item(0).firstChild.data);
							
							stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:18px;'>Vat(0%)</td>"
								+"<td>0</td>"
						+"</tr>";
						
					
						//var amount= +total.item(0).firstChild.data + +vat + +deli.item(0).firstChild.data;
						stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:18px;'>Total </td>"
								+"<td>"+sub_total+"</td>"
						+"</tr>";
						
						
				
				
		
			thed2=document.getElementById("trr");
			thed2.innerHTML=stuff;
					$(".img").hide();
					
				




						
								
						
							
							

					
					
				
			
		
		
		
		
		
				
			
			//thed=document.getElementById("pos");
			//thed.innerHTML=stuff;
			
		},
		error:function(error)
		{
			$(".img").hide();
			alert('Error');
		}
	});
						
}
	
}






/*function process(id,price,qun){
	
	
	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
		
		
		


		var current_date=new Date();
		var now=current_date.getFullYear()+'-'+(current_date.getMonth()+1)+'-'+current_date.getDate();
		
		var hour    = current_date.getHours();
		var minute  = current_date.getMinutes();
		var second  = current_date.getSeconds();
		
		var time=hour+':'+minute+':'+second;
		var text_value= "?id=" + id;
		
		if(qun == 0)
		{
			qun = document.getElementById("selectquantity").value;
			
			
			
			
			
			if(qun == '' || qun == 0 || qun<0){
				qun=1;
			}
			else
			{
				price=qun*price;

			}
			var color = document.getElementById("selectcolor").value;
			var size = document.getElementById("selectsize").value;

			
			
			
	text_value +=  "&price=" + price + "&qun=" + qun + "&now=" + now + "&time=" + time + "&color=" + color + "&size=" +size;
			xmlHttp.open("GET",""+li+"main/send/addCard.php" + text_value,true);
			xmlHttp.onreadystatechange=handleXmlRequest;
			xmlHttp.send(null);

		}
		else
		{
			text_value +=  "&price=" + price + "&qun=" + qun + "&now=" + now + "&time=" +time;
			xmlHttp.open("GET",""+li+"main/send/addCard.php" + text_value,true);
			xmlHttp.onreadystatechange=handleXmlRequest;
			xmlHttp.send(null);
		}

		
	
		
		
		//setTimeout('process()',1000);
	}
}*/


function process2(id){
	
	
	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4)
	{
			var text_value= "?id=" + id;
			
			xmlHttp.open("GET",""+li+"main/send/drop.php" + text_value,true);
			xmlHttp.onreadystatechange=handleXmlRequest;
			xmlHttp.send(null);
	}
	else
	{
		//alert('onload');
	}
}


function process_drop(id)
	{
	
	
		var con=confirm('Are you sure to delete ?');
	
		if(con == true){
			
			var pt=parseFloat($("#"+id+"pp").text());
		var t=parseFloat($("#to").text())-pt;
		var tp=parseFloat($("#tp").text())-pt;
	
	
	
	document.getElementById("tp").innerHTML=tp;
	document.getElementById("to").innerHTML=t;
	
	
		//$("#tp").val(tp);
		//$("#to").val(t);
	
	
	
		$("#"+id+"tr").remove();
		
		$.ajax({
		type:'POST',
		dataType:'json',
        url: li+"mains/product_delete",
		data:{id:id},
		success:function(data)
		{
		

			
			
		
		
		},
		error:function(error)
		{
			alert('server error');
		}
	});
			
			
		}
	
		
	
	}








/*function process_drop(id){
	
	
	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4)
	{
	
	$(".img").show();
	
	var current_date=new Date();
		var now=current_date.getFullYear()+'-'+(current_date.getMonth()+1)+'-'+current_date.getDate();
		
		var hour    = current_date.getHours();
		var minute  = current_date.getMinutes();
		var second  = current_date.getSeconds();
		
		var time=hour+':'+minute+':'+second;
	
	
	
	
	var val=0;
	stuff="";
		
		
		$.ajax({
		type:'POST',
		dataType:'json',
        url: li+"main/send/drop_process.php",
		data:{id:id},
		success:function(data)
		{
			var sub_total=0;
			$.each(data.posts,function(key,val)
				{
					
					stuff=stuff + "<tr>"
									+"<td>"+val.pro_name+"</td>"
									+"<td>"+val.price+"</td>"
									+"<td>"+val.total+"</td>"
									
									
									+"<td><button type='button' class='btn btn-default o-btn'>"+val.qun+"</button>   <button type='button' class='btn btn-default o-btn' onclick=addCard_sceond("+val.root+","+val.qun+","+val.total+","+val.price+",1)><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>      <button type='button' class='btn btn-default o-btn' onclick=addCard_sceond("+val.root+","+val.qun+","+val.total+","+val.price+",0)><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button></td>"
									
									+"<td>"+now+"</td>"
									+"<td>"+time+"</td>"
									
									
									+"<td><button type='button' class='btn btn-default o-btn' onclick=process_drop("+val.root+")><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></td>"
										
								+"</tr>";
								
								sub_total=sub_total + + val.total;
					
				});	



						stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:13px;'>Total Product Price </td>"
								+"<td>"+sub_total+"</td>"
						+"</tr>";
						
						stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:13px;'>Delivery Fee </td>"
								+"<td>0</td>"
						+"</tr>";
						
						
						//var vat =((+total.item(0).firstChild.data/100)*+fees.item(0).firstChild.data);
							
							stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:13px;'>Vat (0%)</td>"
								+"<td>0</td>"
						+"</tr>";
						
					
						//var amount= +total.item(0).firstChild.data + +vat + +deli.item(0).firstChild.data;
						stuff=stuff + "<tr>"
								+"<td colspan=3 style='text-align:right;font-weight:bold;font-size:13px;'>Total </td>"
								+"<td>"+sub_total+"</td>"
						+"</tr>";
				
				
		
			thed2=document.getElementById("trr");
			thed2.innerHTML=stuff;
					$(".img").hide();
					
				




						
								
						
							
							

					
					
				
			
		
		
		
		
		
				
			
			//thed=document.getElementById("pos");
			//thed.innerHTML=stuff;
			
		},
		error:function(error)
		{
			alert('lll');
		}
	});
	
	
	}
	else
	{
		//alert('onload');
	}
}

*/








function minu(id,qun,tot,price,sp)
{
	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
		
		
		
			var text_value= "?id=" + id;
			text_value +=  "&price=" + price + "&qun=" + qun + "&tot=" + tot + "&sp=" +sp;
			xmlHttp.open("GET",""+li+"main/send/dcrement_sc.php" + text_value,true);
			xmlHttp.onreadystatechange=handleXmlRequest;
			xmlHttp.send(null);
			
			
			
			
			
	}
	else
	{
		//alert('onload');
	}
}
function plus(id)
{
	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
		
	}
	else
	{
		//alert('onload');
	}

}

function handleXmlRequest(){
	if(xmlHttp.readyState == 4){
		if(xmlHttp.status == 200){
		
		
			
			xmlResponse=xmlHttp.responseXML;
			ids=xmlResponse.getElementsByTagName("pname");
			ids2=xmlResponse.getElementsByTagName("id");
			prices=xmlResponse.getElementsByTagName("pric");
			quns=xmlResponse.getElementsByTagName("qun");
			pris=xmlResponse.getElementsByTagName("pri");
			suma=xmlResponse.getElementsByTagName("sum");
			counts=xmlResponse.getElementsByTagName("coun");
			
			//ccs=xmlResponse.getElementsByTagName("cc");
			
			//alert(ccs.item(0).firstChild.data);
			//setTimeout('process()',500);
			
			if(suma.item(0).firstChild.data == 0)
			{
					var stuff="";
					thed=document.getElementById("add");
					thed.innerHTML=stuff;
					thed2=document.getElementById("sum");
					thed2.innerHTML=suma.item(0).firstChild.data;
					
					thed2=document.getElementById("item");
					thed2.innerHTML=counts.item(0).firstChild.data;
					
					var s="<button type='button' id='ordar' class='btn btn-info o-btn' onclick=pro()>Place Order</button>";
					thed2=document.getElementById("dataAdd");
					thed2.innerHTML="";
			}
			else
			{
				var stuff="";
				var del="Delete";
				for(var i=0;i<prices.length;i++){
							
					stuff=stuff + "<ul style='list-style:none;margin: 0; padding: 0;'>"
+"<li> <p style='color:white;'>Product Name : <span style='font-Weight:bold;font-Size:16px;color:white;'>"+ids.item(i).firstChild.data +"</span><p><span style='color:white;'> Quantity : </span> <span style='font-Weight:bold;font-Size:16px;color:white;'>"+quns.item(i).firstChild.data +"</span><span style='color:white'> Price :</span> <span style='font-Weight:bold;font-Size:16px;color:white;'>"+prices.item(i).firstChild.data+"</span></li>"
+"<li><button type='button' class='btn btn-info o-btn' onclick=process2("+ids2.item(i).firstChild.data+")>"+del+"</button>    <button type='button' class='btn btn-info o-btn' onclick=minu("+ids2.item(i).firstChild.data+","+quns.item(i).firstChild.data+","+prices.item(i).firstChild.data+","+pris.item(i).firstChild.data+",0)><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>      <button type='button' class='btn btn-info o-btn' onclick=minu("+ids2.item(i).firstChild.data+","+quns.item(i).firstChild.data+","+prices.item(i).firstChild.data+","+pris.item(i).firstChild.data+",1)><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button></li>"
					+"</ul>" + "<br>";
			}
			
	var s="<button type='submit' class='btn btn-info o-btn'>Place Order</button>";
			
					thed=document.getElementById("add");
					thed.innerHTML=stuff;
					thed2=document.getElementById("sum");
					thed2.innerHTML=suma.item(0).firstChild.data;
					thed2=document.getElementById("item");
					thed2.innerHTML=counts.item(0).firstChild.data;
					
					thed2=document.getElementById("dataAdd");
					thed2.innerHTML=s;
					
					
					
			}
			
			
			
			
			
							
					
		
					
			
		}
		else{
			alert('something went worng');
		}
	}
}