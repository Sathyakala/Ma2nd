<link href="css/datepicker.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.validate.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.validation.js"></script> 

<script type="text/javascript"> 
$(function() { 
	$('#date').datepick({ 
   maxDate: +0, showTrigger: '<img src="images/calendar.gif" alt="Popup" class="trigger">'});
    $('#form').validate({ 
        errorPlacement: $.datepick.errorPlacement 
    }); 
}); 
</script>