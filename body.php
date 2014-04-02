<?php
require_once("includes/common.inc.php"); 
$page=basename(__FILE__);
$val = $db->getRow("select * from ".SITECONTENT." where id='1'");
?>
<div class="welcomesec">
				<h5>Welcome To<span>&nbsp;&nbsp;<?php echo $val['title'];?></span></h5>
				<p><?php echo $val['description'];?></p>
</div>