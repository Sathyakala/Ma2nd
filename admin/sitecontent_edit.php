<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");
 include_once("fckeditor/fckeditor.php");
$page=basename(__FILE__);
if($_POST['submit']=="Update"){
   $chg=$db->query("update ".SITECONTENT." set title='".mysql_real_escape_string($_POST['title'])."', description='".mysql_real_escape_string($_POST['elm1'])."'  where id=".$_GET['id']);
    if($chg){
	$_SESSION['suss']="Updated Successfully";
	echo "<script>location.href='sitecontent_list.php'</script>";
	}else{
	$_SESSION['error']="Failed to Updated, Please Try After Some Time";
	}
	}
if($_GET['id']!=''){
$val = $db->getRow('SELECT * FROM '.SITECONTENT.' WHERE id= ?', array($_GET['id']));
}else{
header("location:sitecontent_list.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Site Content Edit || Sreekara Green City Developers</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/editor.php"); ?>
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
		<div class="test" id="box" >
                	<h3 id="adduser">Edit Site content</h3>
                    <form name="colorname" id="form" action="" method="post"  onsubmit="return validate()">
                      <fieldset id="personal">
                        <legend>Change Site content</legend>
                        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="form_table">
                        <tr class="form_bg">
                        <td align="right" width="100px" style="padding:5px"><label>Page Name:<span style="color:#FF0000">*</span></label></td>
                        <td align="left" style="padding:5px"><input type="text" id="title" name="title" value="<?php echo $val['title']; ?>"  style="width:200px"/>
                        </td>
                      </tr>
					  <tr class="form_bg">
                        <td align="right"  style="vertical-align:top; padding:5px"><label>Description:<span style="color:#FF0000">*</span></label></td>
                        <td align="left" id="texteditor" style="padding:5px">
						<!--<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 80%"><?php //echo stripslashes($val['description']); ?></textarea>-->
						<?php
							$oFCKeditor = new FCKeditor('elm1', '750', '550') ;
							$oFCKeditor->BasePath	= 'fckeditor/' ;
							$oFCKeditor->Value		=  stripslashes($val['description']);
							$oFCKeditor->Create() ; 
			    		?>
                        </td>
                      </tr>
                      <tr class="form_bg">
                        <td align="center"><center>
                        </center></td>
                        <td height="20" align="center" style="padding:5px">
						<input type="submit" name="submit" id="submit" value="Update" />
                       <input type="button" name="back" value="Back" onclick="window.history.back();" />
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
function validate(){
	var d = document.colorname;
	if(d.title.value == ""){
		alert("Title is required");
		d.title.focus();
		return false;
	}	
 return true;
}
</script>
