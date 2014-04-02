<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");
include_once("FCKeditor/fckeditor.php");
$page=basename(__FILE__);
if($_POST['submit']=="Edit"){

$chg=$db->query("update ".PLOT." set  
	title='".$_POST['title']."', 
	plot_number='".$_POST['number']."',
	area='".$_POST['area']."' 
	 where id=".$_GET['id']);	  

    if($chg){
	$_SESSION['suss']="Updated Successfully";
	}else{
	$_SESSION['error']="Filed to Updated, Please try after some time";
	}
	 
	 
}
$value=$db->getRow('select * from '.PLOT.' where id='.$_GET['id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once("includes/header.php"); ?>
<?php include_once("includes/datepicker.php"); ?>
</head>
<script language="javascript">
function valid()
	{
		if(document.userdetails.title.value=="")
			{
				alert("Title Required");
				document.userdetails.title.focus();
				return false;
			}
		if(document.userdetails.number.value=="")
			{
				alert("Phone Plot Number");
				document.userdetails.number.focus();
				return false;
			}
		if(isNaN(document.userdetails.number.value))
		   {
				alert("Please Enter Number only");
				document.userdetails.number.focus();
				return false;
		   }
		if(document.userdetails.area.value=="")
		   {
				alert("Please Enter Number");
				document.userdetails.area.focus();
				return false;
		   }
		if(isNaN(document.userdetails.area.value))
		   {
				alert("Please Enter Number only");
				document.userdetails.area.focus();
				return false;
		   }
		else
		   {
				return true;	
		   }
	}
</script>
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
                	<h3 id="adduser"><a href="user_list.php" style="color:#FFFFFF; text-decoration:underline;">User List</a> >> Edit User</h3>
                    <form name="userdetails" id="form" action="" method="post"  enctype="multipart/form-data">
                      <fieldset id="personal">
                        <legend>Enter Plot Details</legend>
							<Table border="0" width="100%">
								<tr>
									<td>Plot Title</td>
									<td width="10">:</td>
									<td><input type="text" name="title" style="width:195px;" value="<?php echo $value['title'];?>" /></td>
								</tr>
								<tr>
									<td>Plot Number</td>
									<td width="10">:</td>
									<td><input type="text" name="number" style="width:195px;" value="<?php echo $value['plot_number'];?>" /></td>
								</tr>								
								<tr>
									<td>Area</td>
									<td width="10">:</td>
									<td><input type="text" name="area" style="width:195px;" value="<?php echo $value['area'];?>" /></td>
								</tr>
								<tr>
									<td colspan="3" style="padding-left:290px;">
										<input type="submit" name="submit" value="Edit" onclick="return valid();" />
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
