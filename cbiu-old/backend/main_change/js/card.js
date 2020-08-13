

var li=links();


$(document).ready(function(){
	
	
	
	
	
	



	/*$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/getCurrentData',
		data:{},
		success:function(data)
		{
			
		
			
			//card_view(data);
			
			
			
	
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
	
	
});


function loads(){
	
	
	
		$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/getCurrentData',
		data:{},
		success:function(data)
		{
			
		
			
			card_view(data);
			
			
	
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
	
	
	//document.getElementById("add").innerHTML="<h1>sljfsdf</h1>";
//	document.getElementById("add2").innerHTML="<h1>sljfsdf2222</h1>";
	//document.getElementById("sub_total").innerHTML="<h1>sljfsdf2222</h1>";
}

$("input:checkbox").on('click',function()
{
	var get_value=$(this).val();
	
	
	 var li=links();

	
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
		
		$("#con_code").focus();
	}
	else{
		$("#div").hide();
	}
	
	
});

function process_drop(id)
	{
	
	
	var li=links();
	
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


$("#cmodify button").click(function(){
	
	
	var li=links();
	
	var id=$(this).attr('data-id');
	var type=$(this).attr('data-type');
	var q=parseInt($("#"+id+"qq").text());
	
	//alert(q);
	
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
	
	
	
	document.getElementById(id+"qq").innerHTML=q;
	
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




function card_view(data){
	
	
	var stuff="";
	var product=0;
	var i=0;
	var total=0;
	
	var svgStyleHeader="display: block;width: 30px;height: 20px;color: #AAA;cursor: pointer;opacity: .35;";
	var svgStyleFooter="width: 15px;height: 15px;margin-top: 2px;";
	var svgQuantityStyle="text-align: left; margin-left: 4px;font-size: 14px;";
	var liStyleE="padding: 3px;width: 20%;text-align: left;";
	var liStyleS="margin-top: 10px";
	
	
	$.each(data.posts,function(key,val){
		
	

var svg="<svg data-id='"+val.id+"' data-type='a' version='1.1' x='0px' y='0px' viewBox='0 0 100 100'><polygon points='46.34,39.003 46.34,39.003 24.846,60.499 29.007,64.657 50.502,43.163 71.015,63.677 75.175,59.519 50.502,34.844'></polygon></svg>";
var svgDown="<svg data-id='"+val.id+"' data-type='e' version='1.1' x='0px' y='0px' viewBox='0 0 100 100'><polygon points='53.681,60.497 53.681,60.497 75.175,39.001 71.014,34.843 49.519,56.337 29.006,35.823 24.846,39.982   49.519,64.656'></polygon></svg>";
var svgRemove="<svg data-id='"+val.id+"' data-type='d' version='1.1' x='0px' y='0px' viewBox='0 0 100 100'><rect x='19.49' y='46.963' transform='matrix(-0.7071 0.7071 -0.7071 -0.7071 121.571 49.0636)' width='62.267' height='5.495'></rect><rect x='18.575' y='47.876' transform='matrix(-0.7071 -0.7071 0.7071 -0.7071 49.062 121.5686)' width='62.268' height='5.495'></rect></svg>";

	/*i++;
		product++;
		total=total+(val.qun * val.price);
		
		stuff=stuff+"<tr class='"+val.root+"del'>"
		
		
					+"<td>"+val.product_name+"</td>"
					+"<td id='"+val.root+"q'>"+val.qun+"</td>"
					+"<td id='"+val.root+"p'>"+val.price+"</td>"
					+"<td id='"+val.root+"t'>"+(val.qun * val.price)+"</td>"
		+"<td><i data-id='"+val.root+"' data-type='a' style='cursor: pointer;' class='fa fa-cart-plus' aria-hidden='true'></i></td>"
		+"<td><i data-id='"+val.root+"' data-type='e' style='cursor: pointer;' class='fa fa-minus-circle' aria-hidden='true'></i></td>"
		+"<td><i data-id='"+val.root+"' data-type='d' style='cursor: pointer;' class='fa fa-trash-o' aria-hidden='true'></i></td>"
		
					+"</tr>";
		
		
		*/
		
		total=total + (val.qun * val.price);
		product++; 			
		
	/*	stuff=stuff+"<div class='row or_row' style=''>"
		
					+"<ul class='ul_list "+val.id+"d' style='list-style:none;margin: 0; padding: 0;overflow:hidden'><li style='"+style+"'>"+svg+"<span class='"+val.id+"qun_up'>"+val.qun+"</span>"+svgDown+"</span></li><li><span><img src='"+li+"file_upload/"+val.root+"_sp.jpg'></span></li><li>"+val.product_name+"</li><li class='"+val.id+"am1_up'>"+(val.qun * val.price)+"</li><li><a onclick=addsing("+val.root+","+val.id+") id='"+val.root+"sss' data-hd='remove' data-role="+val.price+" href='#'><span class='glyphicon glyphicon-trash'></span></a></li></ul>"
					
		           +"</div>";		
		*/
		
		
		stuff=stuff+"<div class='row or_row'>"
		
					+"<div class='orderItem "+val.id+"d'>"
					
					+"<div class='div_quntity'><div style='width:30px;text-align:center;padding:0px' class='div_head'><div style='"+svgStyleFooter+"' class='svg_head'>"+svg+"</div><div class='' style='"+svgQuantityStyle+"'><span data-qunTitle='qinc' id='"+val.id+"q'>"+val.qun+"</span></div><div class='svg_down' style='"+svgStyleFooter+"'>"+svgDown+"</div></div></div>"
					+"<div class='div_pic'><span><img src='"+li+"file_upload/"+val.root+"_sp.jpg'></span></div>"
					+"<div class='div_product' >"+val.product_name+"<div class='subText'><span class='price_title'>tk</span><span id='"+val.id+"p'>"+val.price+"</span></div></div>"
					//+"<div class='div_price' style='"+liStyleE+" "+liStyleS+"'>s</div>"
					//+"<div class='div_amount "+val.id+"am1_up'>"+(val.qun * val.price)+"</div>"
					+"<div class='div_amount'><section><div class='div_total'><span>tk</span><span id='"+val.id+"t'>"+(val.qun * val.price)+"</span></div></section><div class='div_remove div_head'>"+svgRemove+"</div></div>"
					
					+"</div>"
		
					+"</div>";
		
		
		
	});
	
	/*stuff=stuff+"<tr>"
	
				+"<td><strong>Total</strong></td>"
				+"<td></td>"
				+"<td></td>"
				+"<td><strong class='sub_total'>"+total+"</strong></td>"
				+"<td></td>"
	
				+"</tr>";
	
	*/
	
	/*document.getElementById("add").innerHTML=stuff;
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
	*/
	
	//$(".card_body").html(stuff);
	//$(".titem").text(i);
	
	
	document.getElementById("add").innerHTML=stuff;
	
	//document.getElementById("add2").innerHTML=stuff;
	//document.getElementById("sub_total").innerHTML=total;
	
	var s="<button type='submit' class='btn btn-info o-btn'>Place Order</button>";
	
	if(total > 0){
				$(".foote").show();

			document.getElementById("dataAdd").innerHTML=s;

	}
	
	
	document.getElementById("sum").innerHTML=total;
	document.getElementById("t").innerHTML=total;
	document.getElementById("item").innerHTML=product;
	
	
	 $('#sum').animateNumber(
    {
	
	number: total,
    //numberStep: comma_separator_number_step
	
	
	},
    500
	)
	
	
}




$(".checkout").click(function(){
	
	var li=links();
	
	window.location=li+"mains/card_process";
	
	
});



$(document.body).on('click', '.div_head svg', function(){
	
	
	var id=$(this).attr("data-id");
	var t=$(this).attr("data-type");
	
	var qun=tqun=parseFloat($("#"+id+"q").text());
	var price=parseFloat($("#"+id+"p").text());
	
	var checkDel=0;
	
	if(t == 'a')
		qun++;
	else if(t == 'e' && qun > 1)
		qun=qun - 1;
	
	if(t == 'd')
	{
		
		var c=confirm("Are you sure to delete  ?");
		if(c == false){
			
			checkDel=1;
			
		}
		
	}
	
	if(tqun == 1 && t == 'e')
		notWorking();
	else if((checkDel == 0)){
		
		
			$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/updateCard',
		data:{id:id,qun:qun,t:t,price:price},
		success:function(data)
		{
			
			
			
			card_view(data);
			
	
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


$("#add").on('click',"i",function(){
	
	
	
	
	var li=links();
	
	var t=$(this).attr('data-type');
	var id=$(this).attr('data-id');
	var qun=parseFloat($("#"+id+"q").text());
	var price=parseFloat($("#"+id+"p").text());
	
	if(t == 'a')
	{
		
		$("#"+id+"q").text(qun+1);
		$("#"+id+"t").text((qun+1)*price);
		
		var curr_amount=(qun * price);
		var sub=parseFloat($(".sub_total").text()) - curr_amount ;
		
		var total=sub+((qun+1)*price);
		
		$(".sub_total").text(total);
	}
	else if(t == 'e' && qun > 1)
	{
		
		$("#"+id+"q").text(qun-1);
		$("#"+id+"t").text((qun-1)*price);
		
		
		
		var curr_amount=(qun * price);
		var sub=parseFloat($(".sub_total").text()) - curr_amount ;
		
		var total=sub+((qun-1)*price);
		
		$(".sub_total").text(total);
		
	}
	else if(t == 'd')
	{
		var c=confirm('Are you sure to delete ?');
		
		if(c == true)
		{
			var sub=parseFloat($(".sub_total").text());
		$("."+id+"del").remove();
		var tt=(price * qun);
		var total=sub-(tt);
		
		$(".sub_total").text(total);
		
		
		var item=parseInt($(".titem").text());
		
		$(".titem").text(item - 1);
		
			
		}
		
		//alert(sub);
		
		
		
	}
	
	
	$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/updateCard',
		data:{id:id,price:price,qun:qun,t:t},
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


/*$(".card_body").on('click',"tr td i",function(){
	
	var li=links();
	
	var t=$(this).attr('data-type');
	var id=$(this).attr('data-id');
	var qun=parseFloat($("#"+id+"q").text());
	var price=parseFloat($("#"+id+"p").text());
	
	if(t == 'a')
	{
		
		$("#"+id+"q").text(qun+1);
		$("#"+id+"t").text((qun+1)*price);
		
		var curr_amount=(qun * price);
		var sub=parseFloat($(".sub_total").text()) - curr_amount ;
		
		var total=sub+((qun+1)*price);
		
		$(".sub_total").text(total);
	}
	else if(t == 'e' && qun > 1)
	{
		
		$("#"+id+"q").text(qun-1);
		$("#"+id+"t").text((qun-1)*price);
		
		
		
		var curr_amount=(qun * price);
		var sub=parseFloat($(".sub_total").text()) - curr_amount ;
		
		var total=sub+((qun-1)*price);
		
		$(".sub_total").text(total);
		
	}
	else if(t == 'd')
	{
		var c=confirm('Are you sure to delete ?');
		
		if(c == true)
		{
			var sub=parseFloat($(".sub_total").text());
		$("."+id+"del").remove();
		var tt=(price * qun);
		var total=sub-(tt);
		
		$(".sub_total").text(total);
		
		
		var item=parseInt($(".titem").text());
		
		$(".titem").text(item - 1);
		
			
		}
		
		//alert(sub);
		
		
		
	}
	
	
	$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/updateCard',
		data:{id:id,price:price,qun:qun,t:t},
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
*/

$(".cart-btn button").click(function(){
	
	var li=links();
	
	var id=$(this).attr('data-id');
	
	var c_update=$("#"+id+"q").text();
	

	
	/*if(typeof c_update == 'undefined' || c_update == '')
	{
		
		
		
	}
	else
	{
		//alert('updated');
		
		
	}*/		
	
	
	var price=$(this).attr('data-price');
	var qun=1;
	
	$(this).text("Wait Some Moment......");
	$(this).css({"font-size":"12px"});
	$(this).attr("disabled",true);
	
	var i=(this);
	
	var color=$("#pcolor").val();
	var size=$("#psize").val();
	
	
	
	if(typeof color == 'undefined')
	{
		
		color="";
		size="";
		
	}
	
	//data_update
	
	$.ajax({
		type:'POST',
		dataType:'json',
		url:li+'addCard/AddProduct',
		data:{color:color,size:size,id:id,price:price,qun:qun},
		success:function(data)
		{
			
			$(i).text('');
			
			$(i).text("Add To Card");
			$(i).css({"font-size":"15px"});
			
			
			
			card_view(data);
			
			
			
	
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
	
	$(this).attr("disabled",false);
	
	
});