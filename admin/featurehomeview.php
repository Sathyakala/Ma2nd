<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
$id=$_GET['id'];
$sel = $db->getRow("select * from priority_futurehome where f_id=".$id);
?>
<style type="text/css">
.pop_text{
font-family:Verdana, Arial, Helvetica, sans-serif;
color:#333333;
font-size:12px;
text-align:left;
}
.pop_text_left{
font-family:Verdana, Arial, Helvetica, sans-serif;
color:#000;
font-size:12px;
text-align:right;
padding-right:6px;
}

</style>
<table border="0" width="100%" cellpadding="3" cellspacing="3">
	<tr>
		<td colspan="5" align="center"><b>Featured Home Lists</b></td>
	</tr>
	<tr>
		<td width="50%" class="pop_text_left">Featured Home Title</td>
		<td width="2%">:</td>
		<td class="pop_text" width="60%"><?php echo ucwords($sel['f_title']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Property class</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_propertyclass']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Address</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_address']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">City</td>
		<td>:</td>
		<td class="pop_text">
			<?php 
				$cid=$sel['f_city'];
				$val=mysql_fetch_array(mysql_query("select * from citys where id='$cid'"));	
			?>
			<?php echo ucwords($val['citys']);?>
		</td>
	</tr>
	<tr>
		<td class="pop_text_left">Price</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_price']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Beds</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_beds']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Baths</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_baths']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Floors</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_floors']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Annual Tax</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_annual_tax']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Lot Size</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_lotsize']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Year Date</td>
		<td>:</td>
		<td class="pop_text"><?php echo ucwords($sel['f_yearbuilt']);?></td>
	</tr>
	<tr>
		<td class="pop_text_left">Home Image</td>
		<td>:</td>
		<td><img src="../homeimages/<?php echo ucwords($sel['f_image']);?>" width="100" height="100" /></td>
	</tr>
	<tr>
		<td class="pop_text_left">Description</td>
		<td>:</td>
		<td class="pop_text" style="text-align:justify">
			<?php 
				echo $descr=$sel['f_description'];
			?>
		</td>
	</tr>

</table>
