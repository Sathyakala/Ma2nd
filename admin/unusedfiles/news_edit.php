<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
 include_once("fckeditor/fckeditor.php");
if($_POST['submit']=="Update"){
	$da=strtotime($_POST['date1']);
	    $d=date("Y-m-d",$da);
        $chg=$db->query("update ".NEWS." set  n_title='".mysql_real_escape_string($_POST['title'])."', n_description='".mysql_real_escape_string($_POST['elm1'])."',n_date='$d' where n_id=".$_GET['id']);

    if($chg){
	$_SESSION['suss']="Updated Successfully";
	}else{
	$_SESSION['error']="Filed to Updated, Please try after some time";
	}
	}
if($_GET['id']!=''){
$val = $db->getRow('SELECT * FROM '.NEWS.' WHERE n_id= ?', array($_GET['id']));
}else{
header("location:news_list.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once("includes/header.php"); ?>
 <?php include_once("includes/editor.php"); ?>
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
                	<h3 id="adduser"><a href="../../zephase-old/admin/news_list.php" style="color:#FFFFFF; text-decoration:underline;">News List</a> >> Edit News <?php echo ucfirst($val['n_title']); ?></h3>
                    
                    <form name="colorname" id="form" action="" method="post"  onsubmit="return validate()" enctype="multipart/form-data">
                      <fieldset id="personal">
                        <legend>Change News Details</legend>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="form_table">
                        <tr class="form_bg">
                        <td align="right"><label>News Title:<span style="color:#FF0000">*</span></label></td>
                        <td align="left"><input type="text" id="title" name="title" value="<?php echo $val['n_title']; ?>"  style="width:200px"/>
                        </td>
                      </tr>
					  <tr class="form_bg" style="padding:5px">
                        <td align="right"><label>Date:</label></td>
					  <td><input type="text" id="date" name="date1" size="10" class="dpDate" value="<?php $date=date("m/d/Y", strtotime($val['n_date'])); echo $date; ?>"/></td>
					  </tr>
					   <tr class="form_bg">
                        <td align="right"  style="vertical-align:top; padding:5px"><label>Description:</label></td>
                        <td align="left" id="texteditor" style="padding:5px">
						
						<?php
							$oFCKeditor = new FCKeditor('elm1', '750', '550') ;
							$oFCKeditor->BasePath	= 'fckeditor/' ;
							$oFCKeditor->Value		=  stripslashes($val['n_description']);
							$oFCKeditor->Create() ; 
			    		?>
						
						
						
                        </td>
                      </tr>
					  
					   
					  
					  
                      <tr class="form_bg">
                        <td align="center"><center>
                        </center></td>
                        <td height="20" align="center">
						<input type="submit" name="submit" id="submit" value="Update" />
                        <input id="button2" type="reset" />
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
		alert("News title is required");
		d.title.focus();
		return false;
	}	
	
 return true;
}
</script>
