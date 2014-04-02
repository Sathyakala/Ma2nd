<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");
include_once("FCKeditor/fckeditor.php");
$page=basename(__FILE__);
if($_POST['submit']=="Add"){

	    $d=date("Y-m-d");
        $users_values = array(
					'section' => $_POST['section'],
					'plot_no'	=> $_POST['number'],
					'actual_dimesion'	=> $_POST['dimesion'],
					'corrected_dimension'	=> $_POST['corrected'],
					'area1'	=> $_POST['area1'],
					//'area'	=> $_POST['area1'],
					'facing'	=> $_POST['facing'],					
					'status'	=> $_POST['status']);
					
					$db->insert(PLOTS, $users_values);
				$_SESSION['suss']="Plot List add successfully";	

}
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
									<td><input type="text" name="section" style="width:195px;" /></td>
								</tr>
								<tr>
									<td>Plot Number</td>
									<td width="10">:</td>
									<td><input type="text" name="number" style="width:195px;" /></td>
								</tr>
								<tr>
									<td>Actual Dimesion</td>
									<td width="10">:</td>
									<td><input type="text" name="dimesion" style="width:195px;" /></td>
								</tr>								
								<tr>
									<td>Area</td>
									<td width="10">:</td>
									<td><input type="text" name="area1" style="width:195px;" /></td>
								</tr>
								<tr>
									<td>Corrected Dimension</td>
									<td width="10">:</td>
									<td><input type="text" name="corrected" style="width:195px;" /></td>
								</tr>								
																
								<tr>
									<td>Facing</td>
									<td width="10">:</td>
									<td><input type="text" name="facing" style="width:195px;" /></td>
								</tr>								
								<tr>
									<td>Status</td>
									<td width="10">:</td>
									<td>
										<select name="status">
											<option value="" selected="selected">Select Status</option>
											<option value="Open">Open</option>
											<option value="Booked">Booked</option>
											<option value="Blocked">Blocked</option>
										</select>
									</td>
								</tr>	
								<tr>
									<td colspan="3" style="padding-left:290px;">
										<input type="submit" name="submit" value="Add" onclick="return valid();" />
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
