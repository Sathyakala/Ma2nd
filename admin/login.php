<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
if(isset($_SESSION['new_admin'])){
header('location:index.php');
}
if($_POST['username']!='' && $_POST['password']!=''){
$li = $cls->login($_POST['username'], $_POST['password'],'new_admin','index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Landmark Developers</title>
<link rel="stylesheet" href="css/adminstyle.css" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" class="bg"><table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="181" align="left" valign="top" class=""><table width="970" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="114" align="center" valign="top"><img src="<?php echo LOGO; ?>"  height="110"/></td>
          </tr>
          <tr>
            <td height="34" align="left" valign="top"></td>
          </tr>
          <tr>
            <td height="33" align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    <tr>
        <td align="center" valign="middle" style="padding-top:15px;">
		
				<form name="loginform" action="" method="post" >
		<table width="471" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top" class="loginbg"><table width="471" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="168" height="90">&nbsp;</td>
                <td width="303" height="90">&nbsp;</td>
              </tr>
              <tr>
                <td height="78">&nbsp;</td>
                <td height="78" align="left" valign="top">
				
				<table width="303" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="33" align="left" valign="middle" style="padding-left:10px;"><input type="text" name="username" value="User Name" onfocus="if (this.value == 'User Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'User Name';}" class="logininput" /></td>
                  </tr>
                  <tr>
                    <td height="12" align="left" valign="middle"></td>
                  </tr>
                  <tr>
                    <td height="33" align="left" valign="middle" style="padding-left:10px;"><input name="password" type="password" value="password" onfocus="if (this.value == 'password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'password';}" class="logininput" /></td>
                  </tr>
                </table>
				</td>
              </tr>
              <tr>
                <td height="100" align="left" valign="middle" style="padding-left:20px;"><a href="forgotpass.php" class="forgetpwss">Forgot Password?</a></td>
                <td height="100" align="right" valign="middle" style="padding-right:25px;" >
				<input type="image" name="submit" value="" src="images/signin_img.gif" onclick="return valid();"/>
				<input type="hidden" name="sub" value="1" />
				<!--<a href="#"><img src="images/signin_img.gif" width="126" height="35"  border="0"/></a>-->
				</td>
              </tr>
            </table>
			
		
			
			</td>
          </tr>
        </table>
		        </form>
		</td>
      </tr>
     
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
       <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <?php include_once("includes/footer.php"); ?>
  
</table>
</body>
</html>
<script type="text/javascript">
function valid(){
var d = document.loginform;
	if(d.username.value == "" || d.username.value == "User Name"){
		alert("Username is required");
		d.username.focus();
		return false;
	}
	if(d.password.value == "" || d.password.value == "password"){
		alert("Password is required");
		d.password.focus();
		return false;
	}
	
	
}
</script>