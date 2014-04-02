<?php
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to Admin Panel || Sreekara Green City Developers</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <td align="left" valign="top" bgcolor="#FFFFFF" height="429px"><h2  align="center" style="color:#3A793A; padding-top:30px;">Welcome to Adminpanel</h2></td>
      </tr>
  
    </table></td>
  </tr>
  
  <?php include_once("includes/footer.php"); ?>
</table>
</body>
</html>
