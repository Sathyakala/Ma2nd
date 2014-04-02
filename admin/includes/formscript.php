<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
 <script language="JavaScript" type="text/javascript" src="js/jquery.js"></script>
 <script language="JavaScript" type="text/javascript" src="js/jVal.js"></script>
 <script type="text/javascript">
$(document).ready(function() {
$('#form').submit(function () {
if ( $('#form').jVal({style:'cover',padding:3,border:1,wrap:true}) )
return true;
else
return false;
});

});
</script>
<link rel="stylesheet" type="text/css" href="js/jVal.css">