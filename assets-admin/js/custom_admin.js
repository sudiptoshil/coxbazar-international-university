$(document).ready(function(){
    var link = "https://tecn.gov.bd/";
    
	///$(".datepicker").datepicker();
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd",
		changeYear: true,
		changeMonth: true,
		yearRange: "c-90:c-0"
	});
	$('#add_datatable').DataTable({
        select: true
    });
	$('#all_notice').DataTable({
        select: true
    });
	$('#all_teacher').DataTable({
        select: true
    });
	$('#table_all_data').DataTable({
        select: true
    });
    
    ClassicEditor
    /*.create( document.querySelector( '.editor' ) )
    .catch( error => {
        console.error( error );
    } );*/
    var allEditors = document.querySelectorAll('.editor');
    for (var i = 0; i < allEditors.length; ++i) {
      ClassicEditor.create(allEditors[i]);
    }
    
    
	
	/* dept_teacher */
	function dept_teacher(){
	    var dept_id = $(this).val();
	    alert(dept_id);
	}
	
    $('#dept_teacher').on('change',function(){
        var dept_id = $(this).val();
        //alert(dept_id);
        
       $.ajax({
            type: 'post',
            dataType: 'json',
            url: link + 'admin/teacher_list_on_change',
            data: {dept_id: dept_id},
            success: function(data){
                if(data.success == 1){
                    $('#teachers').empty();
                    $('#teachers').append(
                        '<option value="0">Select Teacher</option>'
                    );
                    for(var item in data.teacher_list){
                        $('#teachers').append(
    
                            '<option value="'+data.teacher_list[item].id+'">'+data.teacher_list[item].name+'</option>'
    
                        );
                    }
                }
            },error: function (jqXHR, textStatus, errorThrown) {
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
    $('#service_box').on('change',function(){
        var service_id = $(this).val();
        //alert(service_id);
        
       $.ajax({
            type: 'post',
            dataType: 'json',
            url: link + 'admin/service_box_list_on_change',
            data: {service_id: service_id},
            success: function(data){
                if(data.success == 1){
                    $('#service_box_list').empty();
                    $('#service_box_list').append(
                        '<option value="0">Select Service Box List</option>'
                    );
                    for(var item in data.service_box_list){
                        $('#service_box_list').append(
    
                            '<option value="'+data.service_box_list[item].id+'">'+data.service_box_list[item].title+'</option>'
    
                        );
                    }
                }
            },error: function (jqXHR, textStatus, errorThrown) {
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
	
	/* end service_box*/
});