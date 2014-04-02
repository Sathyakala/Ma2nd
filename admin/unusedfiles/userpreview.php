<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
if($_GET['id']==''){
header("location:index.php");
}
$id=$_GET['id'];
$sel = $db->getRow("select * from ".USER." where id=".$id);
?>
<style type="text/css">
.right_text
{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
padding-left:10px;
}
</style>
<table border="0" width="60%" align="center" cellpadding="3" cellspacing="3">
	<tr>
		<td colspan="3" align="center">
			<?php $first = $sel['first_name']; $second = $sel['last_name']; $both= $first ."&nbsp;". $second; echo ucwords($both);?> Details </td>
	</tr>
	<tr><td colspan="3"></td></tr>
	<tr>
		<td>First Name</td>
		<td>:</td>
		<td class="right_text"><?php echo ucwords($sel['first_name']);?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td>:</td>
		<td class="right_text"><?php echo $sel['last_name'];?></td>
	</tr>	
	<tr>
		<td>Phone Number</td>
		<td>:</td>
		<td class="right_text"><?php echo $sel['phone'];?></td>
	</tr>
	<tr>
		<td>Mobile Number</td>
		<td>:</td>
		<td class="right_text"><?php echo $sel['mobile'];?></td>
	</tr>	
	<tr>
		<td>Email</td>
		<td>:</td>
		<td class="right_text"><?php echo $sel['email'];?></td>
	</tr>	
	<tr>
		<td>Address 1</td>
		<td>:</td>
		<td class="right_text"><?php echo $sel['address'];?></td>
	</tr>	
	<tr>
		<td>Address 2</td>
		<td>:</td>
		<td class="right_text"><?php echo $sel['address1'];?></td>
	</tr>	
</table>