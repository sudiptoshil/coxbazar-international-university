  $(function() {
    $( "#date" ).datepicker({
      dateFormat:'yy-m-dd',showButtonPanel:true,showAnim:'slide'
    });
	 $( "#date_ex" ).datepicker({
      dateFormat:'yy-m-dd',showButtonPanel:true,showAnim:'slide'
    });
	 $( "#date_exm" ).datepicker({
      dateFormat:'yy-m-dd',showButtonPanel:true,showAnim:'slide'
    });
  });
 function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
