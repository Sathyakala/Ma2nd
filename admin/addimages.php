<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
$uid=$_GET['userid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/lightbox.php"); ?>
 <?php include_once("includes/checkbox.php"); ?>
</script>
<?php

$uid = $_GET['userid'];




if(isset($_POST['submit'])) {

if(!empty($_FILES['images']['name']))    
	   {
	   // $size = 100;	
		$img_dir = '../homeimages/home/';
		$thumb_dir = '../homeimages/';
		$img_name = time().'_'.$_FILES['images']['name'];
		$tmp_name = $_FILES['images']['tmp_name'];
		$img_path = $img_dir . $img_name;
		$thumb_path = $thumb_dir . $img_name;
		move_uploaded_file($tmp_name, $img_path);
		//generate_thumb($img_path,$thumb_path,90,150,100);
		$images=$img_name;
		}
		
		//$a = "insert into gallery 
//(gallery_id, user_id, images) values('$id','$uid', '$images' )"  ;
$a = "insert into gallery 
(user_id, images,status) values('$uid', '$images',1 )"  ;

		$sql=mysql_query($a);
		
		 $_SESSION['suss']="Image added successfully";
	  
}
?>				
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
		<?php include_once("errormessage.php"); ?>
		<div id="box" class="test">
		<h3>Add Gallery</h3>
             
			 <table width="99%" border="0">
		          <tr>
        		    <td height="25" colspan="2" class="green1_g_18">Upload More images</td>
		          </tr>
				  <tr>
		            <td colspan="2" class="bluetext">
						<div id="content">
							<form id="form1" method="post" enctype="multipart/form-data">
								
								<fieldset>
							 
							<p><label>Upload Images: <span style="color:#FF0000">*</span></label>
								<!--<input type="file" name="image1" id="image1" />-->
								<input type="file" name="images" size="26">
							</p>
							
							
							
						   
							<p>
									<input class="button" type="submit" value="Add Images" name="submit" />
							</p>
							</fieldset>


		<div class="clear"></div>
							
								
								
								<!--<div class="fieldset flash" id="fsUploadProgress">
									<span class="legend">Upload Queue</span><br /><br />
								</div>
								<div id="divStatus">0 Files Uploaded</div><br />
								<div>
									<span id="spanButtonPlaceHolder"></span>
										<input id="btnCancel" type="button" value="Cancel All Uploads" onClick="swfu.cancelQueue();" disabled="disabled" 
											style="margin-left: 2px; font-size: 8pt; height: 29px;" />
								</div>-->
							</form>
						</div>
					</td>
        		  </tr>
	        </table>   
		</div>
		</td>
      </tr>
    </table></td>
  </tr>
  <?php include_once("includes/footer.php"); ?>
  
</table>
</body>
</html>