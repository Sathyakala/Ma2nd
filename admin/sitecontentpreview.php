<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
$id=$_GET['id'];
$sel = $db->getRow("select * from ".SITECONTENT." where id=".$id);
?>
<table><tr valign="top"><td align="left">
<table align="left" style="vertical-align:top">
<tr style="vertical-align:top"><td width="80px"><b style="color:#333333; font-size:11px;">Page Name:</b></td><td style="color:#990000"><?php echo $sel['title']; ?></td></tr>
</table>
</td></tr>
<tr valign="top"><td colspan="1"><div align="left"><b style="color:#333333">Description:</b> <span><?php echo stripslashes($sel['description']); ?></span><br><br></div></td></tr>
</table>