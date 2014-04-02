				<script type="text/javascript">
					$(document).ready(function() {
						$(".close-message").click(function() {
							$(this).hide("slow");
						});
					});
				</script>
		        <?php if($_SESSION['warning']!=''){?> 
				<div id="message-yellow" class="close-message">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left"><?php echo $_SESSION['warning']; ?></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				 <!--  end message-yellow -->
			     <?php } unset($_SESSION['warning']);
            	 if($_SESSION['suss']!=''){
	             ?>
			   	 <!--  start message-green -->
				 <div id="message-green" class="close-message">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo $_SESSION['suss']; ?></td>
					<td class="green-right"><a class="close-green"><img src="images/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				 <!--  end message-green -->
				 <?php } unset($_SESSION['suss']);
           	     if($_SESSION['error']!=''){ ?>
			 	 <!--  start message-red -->
				 <div id="message-red" class="close-message">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left"><?php echo $_SESSION['error']; ?></td>
					<td class="red-right"><a class="close-red"><img src="images/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				 <!--  end message-red -->
				 <?php } unset($_SESSION['error']); ?>
				 
				<!--  start message-blue -->
				<!--<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="images/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>-->
				<!--  end message-blue -->
			
			
				
				
				
				