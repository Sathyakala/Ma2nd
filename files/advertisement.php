<?php
require_once("includes/common.inc.php"); 
$page=basename(__FILE__);
$get_img = $db->getRow("select * from banner where status='1'");
?>
 <div class="advertisesec">
 	
 	<!--<img src="images/advertise.jpg" />-->
 	<a href="<?php echo $get_img['url'];?>" target="_blank">
		<img src="banner/thumb/<?php echo $get_img['image'];?>?>"  title="<?php echo $get_img['title'];?>"/>
	</a>
 </div>