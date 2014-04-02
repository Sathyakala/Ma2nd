<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
if($_POST['submit']=='Update')
	{
	 $password=md5($_POST['password']);
	 $chg=$db->query("update ".ADMIN." set password='$password' where id =".$_SESSION['new_admin']['id']);
	  if($chg){
	$_SESSION['suss']="Password updated Successfully";
	}else{
	$_SESSION['error']="Filed to Updated, Please try after some time";
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Change Password || Sreekara Green City Developers</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php include_once("includes/header.php"); ?>
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
                	<h3 id="adduser">Change Password</h3>
                    <form name="chgpassword" action="" method="post"  onsubmit="return validate()">
                      <fieldset id="personal">
                        <legend>Enter New Password Details</legend>
                        <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" class="form_table">
                        <tr class="form_bg">
                        <td align="right"><label>New Password:<span style="color:#FF0000">*</span></label></td>
                        <td align="left"><input type="password" id="password" name="password"  style="width:200px"/>
                        </td>
                      </tr>
                      <tr class="form_bg">
                        <td align="right"><label>Confirm Password:<span style="color:#FF0000">*</span></label></td>
                        <td align="left"><input type="password" id="confirm_password" name="confirm_password" style="width:200px"/></td>
                      </tr> 
                      <tr class="form_bg">
                        <td align="center"><center>
                          </center></td>
                        <td height="20" align="center">
						<input type="submit" name="submit" id="submit" value="Update" />
                   
						</td>
                      </tr>
                    </table>
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
function checkPassword (strng) {
 var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers
   if (illegalChars.test(strng)) {
      return true;
    }
}
function validate(){
	var d = document.chgpassword;
	if(d.password.value == ""){
		alert("Password is required");
		d.password.focus();
		return false;
	}
		if(d.password.value.length < 5)
	{
	alert("Password must be atleast 5 characters");
	d.password.focus();
	return false;
	}
	if(d.password.value.length >= 5)
	{
	if(checkPassword(d.password.value)){
	alert("Password contains illegal characters");
	d.password.focus();
	return false;
	} 
	}
	if(d.confirm_password.value == ""){
		alert("Confirm Password is required");
		d.confirm_password.focus();
		return false;
	}
	if(d.confirm_password.value != d.password.value){
		alert("Confirm Password Should match password");
		d.confirm_password.focus();
		return false;
	}
	
 return true;
}

</script>
