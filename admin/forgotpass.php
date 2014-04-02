<?php 
ob_start();
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
if(isset($_SESSION['new_admin'])){
header('location:index.php');
}
if($_POST['submit']=='sendpass'){
  $select=$db->query("select * from bsa_register where username='".$_POST['username']."'");
  $rows=mysql_fetch_array($select);
  
if($_POST['username']==$rows['bsa_email']){
function createRandomPassword() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 5) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;

    }
    return $pass;
}
$password = createRandomPassword();

  $select=$db->query("select * from bsa_register where username='".$_POST['username']."'");
  $rows=mysql_fetch_array($select);
  $to='bodiya123@gmail.com';
  $mail=$rows['bsa_email']; 
  $subject="Password Details";

  $body=$body."Your random password is:&nbsp;".$password.'<br>';
  $body = $body."Please click the following link for change the password: <br>";
  $body = $body."<a href='http://www.projectssearch.com/demo/4gby3gnew/admin/changepassword.php?email=$mail&pass=".md5($password)."'>fgdgdfgdfgdfgdgcvcbcbcbdfdfgsdfsfsfshfsdhsddfsdgsdgsdtvsd</a><br>"; 

$headers = "From:info@3gglobal.com\n";
$headers .= "Return-Path: <".$_POST['email'].">\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: text/HTML; charset=ISO-8859-1\n"; 

   if(mail($to,$subject,$body,$headers))
   {
  //$update = $db->query("update bsa_register set password='".md5($password)."' where username='".$_POST['username']."'");
  header('location:forgotpass.php?mail=succ');
  }
  }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>welcome to 4gby3g</title>
<link rel="stylesheet" href="css/adminstyle.css" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" class="bg"><table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="181" align="left" valign="top" class=""><table width="970" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="114" align="center" valign="top"><img src="images/4glogo.png"  height="112" /></td>
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
            <td align="left" valign="top" class="forgotpass"><table width="471" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="168" height="90">&nbsp;</td>
                <td width="303" height="90">&nbsp;</td>
              </tr>
              <tr>
                <td height="78">&nbsp;</td>
                <td height="78" align="left" valign="top">
				
				<table width="242" height="57" border="0" cellpadding="0" cellspacing="0" style="padding-top:20px;" >
				  <?php if($_GET['mail']=='succ') { ?>
					 <tr>
                    <td height="33" align="left" valign="middle" ><?php echo 'Password sent to your email please check your email..'; ?></td>
                  </tr>
				  <?php } else { ?>
                  <tr>
                    <td height="33" align="left" valign="middle"  class="logininput"><input type="text" name="username" value="User Name" onfocus="if (this.value == 'User Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'User Name';}" class="logininput" /></td>
                  </tr>
				  <?php } ?>
                  <tr>
                    <td height="12" align="left" valign="middle"></td>
                  </tr>
                </table>
				</td>
              </tr>
              <tr>
                <td height="100" align="left" valign="middle" style="padding-left:20px;"><a href="login.php" class="forgetpwss">Back to Login</a></td>
                <td height="100" align="right" valign="middle" style="padding-right:25px;" >
				<input type="image" name="submit" value="sendpass" src="images/submit.png" onclick="return valid();"/>
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