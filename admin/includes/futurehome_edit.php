<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
require_once('classes/tc_calendar.php');
if($_POST['submit']=="Update"){
    $id=$_GET['id'];

	$select=$db->query("select * from priority_futurehome where f_title='".mysql_real_escape_string($_POST['title'])."' and f_id!=$id");
    if(mysql_num_rows($select)==0)
	{
		if(!empty($_FILES['image']['name']))    
	    {
	    $size = 100;	
		$img_dir = '../homeimages/';
		$thumb_dir = '../homeimages/';
		$img_name = time().'_'.$_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$img_path = $img_dir . $img_name;
		$thumb_path = $thumb_dir . "thumb_" .$img_name;
		move_uploaded_file($tmp_name, $img_path);
		generate_thumb($img_path,$thumb_path,109,500,100);
		$image=$img_name;
		$thumb="thumb_" .$img_name;				  
		
   $chg=$db->query("update priority_futurehome set f_title='".mysql_real_escape_string($_POST['title'])."',f_propertyclass 	='".mysql_real_escape_string($_POST['property'])."',f_address='".mysql_real_escape_string($_POST['address'])."',f_country='".mysql_real_escape_string($_POST['country'])."',f_state='".mysql_real_escape_string($_POST['state'])."',f_city='".mysql_real_escape_string($_POST['city'])."',f_price='".mysql_real_escape_string($_POST['price'])."',f_beds='".mysql_real_escape_string($_POST['beds'])."',f_baths='".mysql_real_escape_string($_POST['baths'])."',f_floors='".mysql_real_escape_string($_POST['floors'])."',f_annual_tax='".mysql_real_escape_string($_POST['annualtax'])."',f_livingarea='".mysql_real_escape_string($_POST['leavingarea'])."',f_yearbuilt='".mysql_real_escape_string($_POST['yeardate'])."',f_image= '$image', f_thumb='$thumb',f_description='".mysql_real_escape_string($_POST['Editor1'])."' where f_id=".$_GET['id']);
   }
   else
   {
   $chg=$db->query("update priority_futurehome set f_title='".mysql_real_escape_string($_POST['title'])."',f_propertyclass 	='".mysql_real_escape_string($_POST['property'])."',f_address='".mysql_real_escape_string($_POST['address'])."',f_country='".mysql_real_escape_string($_POST['country'])."',f_state='".mysql_real_escape_string($_POST['state'])."',f_city='".mysql_real_escape_string($_POST['city'])."',f_price='".mysql_real_escape_string($_POST['price'])."',f_beds='".mysql_real_escape_string($_POST['beds'])."',f_baths='".mysql_real_escape_string($_POST['baths'])."',f_floors='".mysql_real_escape_string($_POST['floors'])."',f_annual_tax='".mysql_real_escape_string($_POST['annualtax'])."',f_livingarea='".mysql_real_escape_string($_POST['leavingarea'])."',f_yearbuilt='".mysql_real_escape_string($_POST['yeardate'])."',f_description='".mysql_real_escape_string($_POST['Editor1'])."' where f_id=".$_GET['id']);
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
$val = $db->getRow('SELECT * FROM priority_futurehome WHERE f_id= ?', array($_GET['id']));
}else{
header("location:futurehome.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function validate()
{
title1=document.form1.title.value;
if(title1==null || title1=='')
{
alert("Please Enter Title.");
document.form1.title.value='';
document.form1.title.focus();
return false;
}

return true;
}
</script>
<script src="ckeditor/_samples/sample.js" type="text/javascript"></script>
<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('editor1',{height:150,resize_enabled:false,scayt_autoStartup:true,disableNativeSpellChecker:false,skin:'kama',uiColor:'#e6edf3',toolbar:[['Source','-','Bold','Italic','Underline','-','Undo','Redo','-','Find','Replace','-','SelectAll','-','Scayt','-','About']]});
</script>
<script type="text/javascript">
/***** CUSTOMIZE THESE VARIABLES *****/
  // width to resize large images to
var maxWidth=100;
  // height to resize large images to
var maxHeight=100;
  // valid file types
var fileTypes=["jpg","gif","png","jpeg"];
  // the id of the preview image tag
var outImage="previewField";
  // what to display when the image is not valid
var defaultPic="spacer.gif";
/***** DO NOT EDIT BELOW *****/
function preview(what){
  var source=what.value;
  var ext=source.substring(source.lastIndexOf(".")+1,source.length).toLowerCase();
  // alert(ext);
  for (var i=0; i<fileTypes.length; i++)
  { if (fileTypes[i]==ext){  break; } }
  //globalPic=new Image();
  if (i>=fileTypes.length)
  {
	document.getElementById('filetypeid').innerHTML='<input type="file" name="ItemImage" id="previewField" value="" onChange="return preview(this)">';
    alert("THAT IS NOT A VALID FILE\nPlease load a file with an extention of one of the following:\n\n"+fileTypes.join(", "));
	return false;
  }
  }
  
</script>
<link href="calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar.js"></script>

<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }

pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color:#FF0000;  }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Priority Property Real Esate | Admin Panel</title>
<?php include_once("includes/commonscript.php"); ?>

<?php include_once("includes/warningscript.php"); ?>
<?php include_once("includes/leftmenuscript.php"); ?>
<?php include_once("includes/lightboxscript.php"); ?>
</head>
<body>
<div id="main_container">
<?php include_once('includes/header.php'); ?>
    <div class="main_content">
    <?php include_once('includes/topmenu.php'); ?>             
    <div class="center_content">
	<?php include_once('includes/leftmenu.php'); ?>

		    <div class="right_content">   
     <h2>Edit Featured Home </h2>
	 	<?php if($_SESSION['warning']!=''){?> 
    <div class="warning_box" id="alert">
      <?php echo $_SESSION['warning']; ?>
     </div>
	 <?php } unset($_SESSION['warning']);
	 if($_SESSION['suss']!=''){
	 ?>
     <div class="valid_box" id="success">
         <?php echo $_SESSION['suss']; ?>
     </div>
	 <?php } unset($_SESSION['suss']);
	 if($_SESSION['error']!=''){ ?>
     <div class="error_box" id="error">
        <?php echo $_SESSION['error']; ?>
     </div>
     <?php } unset($_SESSION['error']); ?>
         <div class="form">
         <form class="cmxform" id="form2" action="" method="post" enctype="multipart/form-data" name="form1">
				<table class="formtable" width="100%"  cellpadding="5">
				
				<tr style="vertical-align:top"><td align="left">Featured Home Title<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="title" name="title" value="<?php echo $val['f_title']; ?>" size="25"/></td></tr>
				
			    	<tr style="vertical-align:top"><td align="left">Property class<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="property" name="property" value="<?php echo $val['f_propertyclass']; ?>" size="25"/></td></tr>
					
						<tr style="vertical-align:top"><td align="left">Address<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="address" name="address" value="<?php echo $val['f_address']; ?>" size="25"/></td></tr>
						
							<tr style="vertical-align:top"><td align="left">Country<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="country" name="country" value="<?php echo $val['f_country']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">State<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="state" name="state" value="<?php echo $val['f_state']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">City<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="city" name="city" value="<?php echo $val['f_city']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Price<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="price" name="price" value="<?php echo $val['f_beds']; ?>" size="25"/></td></tr>
				
				
				<tr style="vertical-align:top"><td align="left">Beds<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="beds" name="beds" value="<?php echo $val['f_beds']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Baths<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="baths" name="baths" value="<?php echo $val['f_baths']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Floors<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="floors" name="floors" value="<?php echo $val['f_floors']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Annual Tax<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="annualreport" name="annualtax" value="<?php echo $val['f_annual_tax']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Leaving Area<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="leavingarea" name="leavingarea" value="<?php echo $val['f_livingarea']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Year Date<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><input id="yeardate" name="yeardate" value="<?php echo $val['f_yearbuilt']; ?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Image<span style="color:#FF0000">*</span></td><td align="left" width="2px">:</td><td align="left"><div id="filetypeid"><input type="file" name="image" id="previewField" value="" onChange="return preview(this)"></div></td></tr>

				
				<tr style="vertical-align:top"><td align="left" style="vertical-align:top">Description</td><td align="left" style="vertical-align:top">:</td><td colspan="1"> <textarea name="Editor1" class="ckeditor" id="editor1"><?php echo $val['f_description']; ?></textarea></td></tr>
				
				
				<tr><td colspan="2">&nbsp;</td><td align="left"><input name="submit" type="submit" value="Update" class="submit NFButton"/></td></tr>
				</table>
				</form>
         </div>  
      
     </div>
     </div><!-- end of right content-->
            
                    
          
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php include_once("includes/footer.php"); ?>
   
</div>		
</body>
</html>


