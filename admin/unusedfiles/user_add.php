<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");
include_once("FCKeditor/fckeditor.php");
$page=basename(__FILE__);
if($_POST['submit']=="Add"){
      $duplicate_user = $db->getOne('SELECT count(*) FROM '.USER.' WHERE first_name= ?', array(mysql_real_escape_string($_POST['fname'])));
	 if ( $duplicate_user > 0 ){
			 $_SESSION['warning']="User name already exist";
		}else{
	    $d=date("Y-m-d");
       $users_values = array(
					'first_name'	=> $_POST['fname'],
					'last_name'	=> $_POST['lname'],
					'phone'	=> $_POST['phone'],
					'mobile'	=> $_POST['mobile'],
					'email'	=> $_POST['email'],					
					'address'	=> $_POST['address'],				
					'address1'	=> $_POST['address1'],										
					'curDate'	=> $d,					
					'status'	=> "1");
					
					$db->insert(USER, $users_values);
				$_SESSION['suss']="User add successfully";	
      }
}
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
		if(document.userdetails.fname.value=="")
			{
				alert("Firstname Required");
				document.userdetails.fname.focus();
				return false;
			}
		if(document.userdetails.lname.value=="")
			{
				alert("Lastname Required");
				document.userdetails.lname.focus();
				return false;
			}
		if(document.userdetails.phone.value=="")
			{
				alert("Phone number Required");
				document.userdetails.phone.focus();
				return false;
			}
		if(isNaN(document.userdetails.phone.value))
		   {
				alert("Please Enter Number only");
				document.userdetails.phone.focus();
				return false;
		   }
		if(document.userdetails.mobile.value=="")
		   {
				alert("Mobile number Required");
				document.userdetails.mobile.focus();
				return false;
		   }
		if(isNaN(document.userdetails.mobile.value))
		   {
				alert("Please Enter Number only");
				document.userdetails.mobile.focus();
				return false;
		   }
		if(document.userdetails.email.value=="")
		   {
				alert("Email Required");
				document.userdetails.email.focus();
				return false;
		   }
		if(document.userdetails.address.value=="")
		   {
				alert("Address Required");
				document.userdetails.address.focus();
				return false;
		   }
		if(document.userdetails.address1.value=="")
		   {
				alert("Address1 Required");
				document.userdetails.address1.focus();
				return false;
		   }   		   
		else
		   {
				return true;	
		   }
	}
function emailInvalid(s)
{
	if(!(s.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i) ))
    {
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
                	<h3 id="adduser"><a href="user_list.php" style="color:#FFFFFF; text-decoration:underline;">User List</a> >> Add User</h3>
                    <form name="userdetails" id="form" action="" method="post"  enctype="multipart/form-data">
                      <fieldset id="personal">
                        <legend>Enter User Details</legend>
							<Table border="0" width="100%">
								<tr>
									<td>First Name</td>
									<td width="10">:</td>
									<td><input type="text" name="fname" style="width:195px;" /></td>
								</tr>
								<tr>
									<td>Last Name</td>
									<td width="10">:</td>
									<td><input type="text" name="lname" style="width:195px;" /></td>
								</tr>								
								<tr>
									<td>Phone</td>
									<td width="10">:</td>
									<td><input type="text" name="phone" style="width:195px;" /></td>
								</tr>
								<tr>
									<td>Mobile Number</td>
									<td width="10">:</td>
									<td><input type="text" name="mobile" style="width:195px;" /></td>
								</tr>								
								<tr>
									<td>Email</td>
									<td width="10">:</td>
									<td><input type="text" name="email" style="width:195px;" /></td>
								</tr>								
								<tr>
									<td>Address 1</td>
									<td width="10">:</td>
									<td><textarea name="address" cols="22" rows="4"></textarea></td>
								</tr>
								<tr>
									<td>Address 2</td>
									<td width="10">:</td>
									<td><textarea name="address1" cols="22" rows="4"></textarea></td>
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
