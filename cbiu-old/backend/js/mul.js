 
var li=links();



$(function() {
	
	
    function split( val ) {
      return val.split( /,\s*/ );
    }
	
    function extractLast( term ) {
      return split( term ).pop();
    }
	
	
	
	$( "#tag" )
      .keyup(function(){
		  
		  var v=$("#tag").val();
		  
		    if(v != '')
		   $('#tag').addClass('ac_loading');
		  
		  
	  })
      .autocomplete({
        source: function( request, response ) {
		  
		   $.ajax({
				type: "POST",
                url: li+"admin/autocomplete_view",
				 
                dataType: "json",
                data: {
                    term : request.term,
					id : $("#tag").val(),
                },
                success: function(data) {
                    response(data);
					
				 $('#tag').removeClass('ac_loading');	
					
					
					
                }
            });
		  
		  
		  
		  
		  
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
         this.value = terms.join( "" );
          return false;
        }
      });
	  
	

$( "#supplier" )
      .keyup(function(){
		  
		  var v=$( "#supplier" ).val();
		  
		  if(v != '')
		   $('#supplier').addClass('ac_loading');
		 // $('#supplier').addClass('ac_results');
	  })
      .autocomplete({
        source: function( request, response ) {
		  
		  
		  
		   $.ajax({
				type: "POST",
                url: li+"admin/getSupplierList",
				 
                dataType: "json",
                data: {
                    term : request.term,
                    id : $("#supplier").val(),
                },
                success: function(data) {
					
					
					  $('#supplier').removeClass('ac_loading');
					
                    response(data);
                },
				error:function(xhr, status)
					{
						
					 $('#supplier').removeClass('ac_loading');	
						
						}
            });
		  
		  
		  
		  
		  
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
         this.value = terms.join( " " );
          return false;
        }
      });

	
	
	
	$( "#product" )
      .keyup(function(){
		  
		  var v=$( "#product" ).val();
		  
		  if(v != ''){
			  
			  $('#product').addClass('ac_loading');
			  $('#price').addClass('ac_loading');

			  
		  }
	  })
      .autocomplete({
        source: function( request, response ) {
		  
		   $.ajax({
				type: "POST",
                url: li+"jquery_data/getProductList",
				 
                dataType: "json",
                data: {
                    term : request.term,
                    id : $("#product").val(),
                },
                success: function(data) {
					
					
					 $('#product').removeClass('ac_loading');
					 $('#price').removeClass('ac_loading');
					
                    response(data);
                }
            })
			
		  
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
         this.value = terms.join( " " );
          return false;
        }
      });
	
	
	
	
	$( "#product_raw" )
      .keyup(function(){
		  

			

		  var v=$( "#product_raw" ).val();
		  
		  if(v != '')
		   $('#product_raw').addClass('ac_loading');
	  })
      .autocomplete({
        source: function( request, response ) {
		  
		   $.ajax({
				type: "POST",
                url: li+"jquery_data/getProductList",
				 
                dataType: "json",
                data: {
                    term : request.term,
                    id : $("#product_raw").val(),
                },
                success: function(data) {
					
					
					 $('#product_raw').removeClass('ac_loading');
					
                    response(data);
                }
            })
			
		  
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
         this.value = terms.join( " " );
          return false;
        }
      });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$( "#customer" )
      .keyup(function(){
		  
		  var v=$( "#customer" ).val();
		  
		  if(v != '')
		   $('#customer').addClass('ac_loading');
	  })
      .autocomplete({
        source: function( request, response ) {
		  
		   $.ajax({
				type: "POST",
                url: li+"jquery_data/getCustomer",
				 
                dataType: "json",
                data: {
                    term : request.term,
                    id : $("#customer").val(),
                },
                success: function(data) {
                    response(data);
					
					
					 $('#customer').removeClass('ac_loading');
                }
            });
		  
		  
		  
		  
		  
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
         this.value = terms.join( " " );
          return false;
        }
      });
	
	
	
	
	
	
	
	
	
	
	  
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  