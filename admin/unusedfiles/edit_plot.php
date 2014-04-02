<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");
include_once("FCKeditor/fckeditor.php");
$page=basename(__FILE__);

if($_POST['submit']) {

$chg=$db->query("update ".PLOTS." set  
	section='".$_POST['section']."', 
	actual_dimesion='".$_POST['dimesion']."',
	corrected_dimension='".$_POST['corrected']."',
	area1='".$_POST['area1']."',	
	facing='".$_POST['facing']."',	
	status='".$_POST['status']."'	
	 where id=".$_GET['id']);	  

    if($chg){
	$_SESSION['suss']="Updated Successfully";
	}else{
	$_SESSION['error']="Filed to Updated, Please try after some time";
	}
}


$id = $_GET['id'];
$val = $db->getRow("select * from  plots where id = '$id'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once("includes/header.php"); ?>
<?php include_once("includes/datepicker.php"); ?>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" class="bg"><table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="181" align="left" valign="top" class="hadderbg12">
			  <?php include_once("includes/menu.php"); ?>
		</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:15px;">
		<?php include_once("errormessage.php"); ?>
		<div id="box" class="test">
                	<h3 id="adduser"><a href="user_list.php" style="color:#FFFFFF; text-decoration:underline;">Plot List</a> >> Add Plot</h3>
                    <form name="userdetails" id="form" action="" method="post"  enctype="multipart/form-data">
                      <fieldset id="personal">
                        <legend>Enter Plot Details</legend>
							<Table border="0" width="100%">
								<tr>
									<td>Section</td>
									<td width="10">:</td>
									<td><input type="text" name="section" style="width:195px;" value="<?php echo $val['section'];?>" /></td>
								</tr>
								<tr>
									<td>Plot Number</td>
									<td width="10">:</td>
									<td><input type="text" name="number" style="width:195px;" value="<?php echo $val['plot_no'];?>" /></td>
								</tr>
								<tr>
									<td>Actual Dimesion</td>
									<td width="10">:</td>
									<td><input type="text" name="dimesion" style="width:195px;" value="<?php echo $val['actual_dimesion'];?>" /></td>
								</tr>								
								<tr>
									<td>Area</td>
									<td width="10">:</td>
									<td><input type="text" name="area1" style="width:195px;" value="<?php echo $val['area1'];?>"/></td>
								</tr>
								<tr>
									<td>Corrected Dimension</td>
									<td width="10">:</td>
									<td><input type="text" name="corrected" style="width:195px;" value="<?php echo $val['corrected_dimension'];?>"/></td>
								</tr>								
																
								<tr>
									<td>Facing</td>
									<td width="10">:</td>
									<td><input type="text" name="facing" style="width:195px;" value="<?php echo $val['facing'];?>"/></td>
								</tr>								
								<tr>
									<td>Status</td>
									<td width="10">:</td>
									<td>
										<select name="status">
											<option value="" selected="selected">Select Status</option>
											<option value="OPEN" <?php if($val['status']=="OPEN") { echo "selected"; }?>>Open</option>
											<option value="BOOKED" <?php if($val['status']=="BOOKED") { echo "selected"; } ?>>Booked</option>
											<option value="BLOCKED" <?php if($val['status']=="BLOCKED") { echo "selected"; } ?>>Blocked</option>
										</select>
									</td>
								</tr>	
								<tr>
									<td colspan="3" style="padding-left:290px;">
										<input type="submit" name="submit" value="Edit"/>
									</td>
								</tr>						
							</Table>
                      </fieldset>
                    </form>
                </div>
				</td>
      </tr>
    
    </table></td>
  </tr>
  <?php include_once("includes/footer.php"); ?>
</table>
</body>
</html>
<script language="javascript">
function validate(){
	var d = document.colorname;
	if(d.title.value == ""){
		alert("News is required");
		d.title.focus();
		return false;
	}	
	
 return true;
}
</script>
