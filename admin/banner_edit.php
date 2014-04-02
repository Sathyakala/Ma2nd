<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
if($_POST['click']=="2"){
    $id=$_GET['id'];

	$select=$db->query("select * from banner where title='".mysql_real_escape_string($_POST['title'])."' and id!=$id");
    if(mysql_num_rows($select)==0)
	{
		if(!empty($_FILES['image']['name']))    
	    {
	    $size = 100;	
		$img_dir = '../banner/';
		$thumb_dir = '../banner/thumb/';
		$img_name = time().'_'.$_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$img_path = $img_dir . $img_name;
		$thumb_path = $thumb_dir . $img_name;
		move_uploaded_file($tmp_name, $img_path);
		generate_thumb($img_path,$thumb_path,188,140,100);
		$image=$img_name;
   }
   
   if($image) {
   $chg=$db->query("update banner set title='".mysql_real_escape_string($_POST['title'])."', url='".mysql_real_escape_string($_POST['url'])."', image= '$image', status='1' where id=".$_GET['id']);
   }
   else
   {
 $chg=$db->query("update banner set title='".mysql_real_escape_string($_POST['title'])."', url='".mysql_real_escape_string($_POST['url'])."', status='1' where id=".$_GET['id']);
  }
    if($chg){
	$_SESSION['suss']="Updated Successfully";
	}else{
	$_SESSION['error']="Filed to Updated, Please try after some time";
	}
	}else{
	$_SESSION['warning']="Title Already Exist";
	}
	}
	
if($_GET['id']!=''){
$val = $db->getRow('SELECT * FROM banner WHERE id= ?', array($_GET['id']));
}else{
//header("location:futurehome.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/lightbox.php"); ?>
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
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:15px">

		
		<div id="box" class="test">
			<form class="cmxform" id="form2" action="" method="post" enctype="multipart/form-data" name="form1">
				<table class="formtable" width="100%"  cellpadding="5">
				<tr style="vertical-align:top">
				  <td align="left">Banner Title<span style="color:#FF0000"> *</span></td><td align="left" width="2">:</td><td align="left"><input id="title" name="title" value="<?php echo $val['title'];?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Image<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><div id="filetypeid"><input type="file" name="image" id="previewField" value="" onChange="return preview(this)"></div></td></tr>
				
				<tr style="vertical-align:top">
					<td align="left">Previous Image<span style="color:#FF0000">*</span></td>
					<td align="left" width="2">:</td><td align="left"><div id="filetypeid">
						<img src="../banner/thumb/<?php echo $val['image'];?>" />
					</div>
					</td>
				</tr>
				<tr style="vertical-align:top">
				  <td align="left">Banner URL<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="url" name="url" size="25" value="<?php echo $val['url'];?>"/></td></tr>
				<tr><td colspan="3" style="padding-left:320px;">
					<input type="hidden" name="click" value="2" />
					<input name="submit" type="submit" value="Edit" onclick="return validate()"/></td></tr>
				</table>
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
