<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
if($_GET['id']==''){
header("location:index.php");
}
$id=$_GET['id'];
$sel = $db->getRow("select * from ".NEWS." where n_id=".$id);
?>
<table align="left" width="100%"><tr valign="top">
<td align="left" width="100px">
<b style="color:#333333; font-size:11px;">News Title:</b></td><td style="color:#990000"><?php echo $sel['n_title']; ?></td></tr>
<tr style="vertical-align:top"><td><b style="color:#333333; font-size:11px;">Date:</b></td><td style="color:#990000"><?php echo date("d M, Y", strtotime($sel['n_date'])); ?></td></tr>
<tr valign="top"><td ><b style="color:#333333">Description:</b></td><td> <span><?php echo stripslashes($sel['n_description']); ?></span><br /><br></td></tr>
</table>