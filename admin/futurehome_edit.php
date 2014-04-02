<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
if($_POST['submit']=="Edit"){
    $id=$_GET['id'];

	$select=$db->query("select * from priority_futurehome where f_title='".mysql_real_escape_string($_POST['title'])."' and f_id!=$id");
    if(mysql_num_rows($select)==0)
	{
		if(!empty($_FILES['image']['name']))    
	    {
	    $size = 100;	
		$img_dir = '../homeimages/';
		$thumb_dir = '../homeimages/thumb/';
		$img_name = time().'_'.$_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$img_path = $img_dir . $img_name;
		$thumb_path = $thumb_dir . $img_name;
		move_uploaded_file($tmp_name, $img_path);
		generate_thumb($img_path,$thumb_path,96,95,100);
		$image=$img_name;

   $chg=$db->query("update priority_futurehome set f_title='".mysql_real_escape_string($_POST['title'])."',f_propertyclass 	='".mysql_real_escape_string($_POST['property'])."',f_address='".mysql_real_escape_string($_POST['address'])."',f_purpose='".mysql_real_escape_string($_POST['purpose'])."',f_country='".mysql_real_escape_string($_POST['country'])."',f_state='".mysql_real_escape_string($_POST['state'])."',f_city='".mysql_real_escape_string($_POST['city'])."',f_price='".mysql_real_escape_string($_POST['price'])."',f_beds='".mysql_real_escape_string($_POST['beds'])."',f_baths='".mysql_real_escape_string($_POST['baths'])."',f_floors='".mysql_real_escape_string($_POST['floors'])."',f_annual_tax='".mysql_real_escape_string($_POST['annualtax'])."',f_livingarea='".mysql_real_escape_string($_POST['leavingarea'])."',f_lotsize='".mysql_real_escape_string($_POST['lotsize'])."',f_yearbuilt='".mysql_real_escape_string($_POST['yeardate'])."',f_image= '$image',f_largethumb= '$largethumb', f_thumb='$thumb',f_description='".mysql_real_escape_string($_POST['Editor1'])."' where f_id=".$_GET['id']);
   }
   else
   {
   $chg=$db->query("update priority_futurehome set f_title='".mysql_real_escape_string($_POST['title'])."',f_propertyclass 	='".mysql_real_escape_string($_POST['property'])."',f_address='".mysql_real_escape_string($_POST['address'])."',f_purpose='".mysql_real_escape_string($_POST['purpose'])."',f_state='".mysql_real_escape_string($_POST['state'])."',f_city='".mysql_real_escape_string($_POST['city'])."',f_price='".mysql_real_escape_string($_POST['price'])."',f_beds='".mysql_real_escape_string($_POST['beds'])."',f_baths='".mysql_real_escape_string($_POST['baths'])."',f_floors='".mysql_real_escape_string($_POST['floors'])."',f_annual_tax='".mysql_real_escape_string($_POST['annualtax'])."',f_livingarea='".mysql_real_escape_string($_POST['leavingarea'])."',f_lotsize='".mysql_real_escape_string($_POST['lotsize'])."',f_yearbuilt='".mysql_real_escape_string($_POST['yeardate'])."',f_description='".mysql_real_escape_string($_POST['Editor1'])."' where f_id=".$_GET['id']);
  }
    if($chg){
	$_SESSION['suss']="Updated Successfully";
	}else{
	$_SESSION['error']="Failed to Updated, Please try after some time";
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
<title>Featured Home Edit || Sreekara Green City Developers</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/lightbox.php"); ?>
</head>
<script type="text/javascript">
function validate()
{
name=document.form1.title.value;
if(name==null || name=='')
{
alert("Please Enter Title");
document.form1.title.value='';
document.form1.title.focus();
return false;
}

if(document.form1.property.selectedIndex ==0)
{
alert("Please Select PropertyClass");
document.form1.property.value='';
document.form1.property.focus();
return false;
}

address1=document.form1.address.value;
if(address1==null || address1=='')
{
alert("Please Enter Address");
document.form1.address.value='';
document.form1.address.focus();
return false;
}

country1=document.form1.country.value;
if(country1==null || country1=='')
{
alert("Please Enter Country");
document.form1.country.value='';
document.form1.country.focus();
return false;
}
state1=document.form1.state.value;
if(state1==null || state1=='')
{
alert("Please Enter State");
document.form1.state.value='';
document.form1.state.focus();
return false;
}

city1=document.form1.city.value;
if(city1==null || city1=='')
{
alert("Please Enter City");
document.form1.city.value='';
document.form1.city.focus();
return false;
}
price1=document.form1.price.value;
if(price1==null || price1=='')
{
alert("Please Enter Price");
document.form1.price.value='';
document.form1.price.focus();
return false;
}
beds1=document.form1.beds.value;
if(beds1==null || beds1=='')
{
alert("Please Enter Beds");
document.form1.beds.value='';
document.form1.beds.focus();
return false;
}
baths1=document.form1.baths.value;
if(baths1==null || baths1=='')
{
alert("Please Enter Baths");
document.form1.baths.value='';
document.form1.baths.focus();
return false;
}
floors1=document.form1.floors.value;
if(floors1==null || floors1=='')
{
alert("Please Enter Floors");
document.form1.floors.value='';
document.form1.floors.focus();
return false;
}

annualtax1=document.form1.annualtax.value;
if(annualtax1==null || annualtax1=='')
{
alert("Please Enter Annualtax");
document.form1.annualtax.value='';
document.form1.annualtax.focus();
return false;
}
leavingarea1=document.form1.leavingarea.value;
if(leavingarea1==null || leavingarea1=='')
{
alert("Please Enter Homesize");
document.form1.leavingarea.value='';
document.form1.leavingarea.focus();
return false;
}

lotsize1=document.form1.lotsize.value;
if(lotsize1==null || lotsize1=='')
{
alert("Please Enter lotsize");
document.form1.lotsize.value='';
document.form1.lotsize.focus();
return false;
}
yeardate1=document.form1.yeardate.value;
if(yeardate1==null || yeardate1=='')
{
alert("Please Enter Yeardate");
document.form1.yeardate.value='';
document.form1.yeardate.focus();
return false;
}
image1=document.form1.image.value;
if(image1==null || image1=='')
{
alert("Please Enter Image");
document.form1.image.value='';
document.form1.image.focus();
return false;
}
return true;
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
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:15px">

		
		<div id="box" class="test">
			<form class="cmxform" id="form2" action="" method="post" enctype="multipart/form-data" name="form1">
				<table class="formtable" width="100%"  cellpadding="5">
				<tr style="vertical-align:top"><td align="left">Featured Home Title<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="title" name="title" value="<?php echo $val['f_title'];?>" size="25"/></td></tr>
				
						<tr style="vertical-align:top">
							<td align="left">Property class<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left">												
								<select name="property" style="width:175px">     <option>- -Select Property- -</option>
									<option value="House" <?php if($val['f_propertyclass']=="Houses") { echo "selected"; } ?>>Houses</option>
									<option value="Flats" <?php if($val['f_propertyclass']=="Flats") { echo "selected"; } ?>>Flats</option>
								</select>
							</td>
						</tr>
			
						<tr style="vertical-align:top"><td align="left">Address<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="address" name="address" value="<?php echo $val['f_address'];?>" size="25"/></td></tr>
						
				
				<tr style="vertical-align:top">
					<td align="left">Citys<span style="color:#FF0000">*</span></td>
					<td align="left" width="2">:</td><td align="left">
					<?php $citys=mysql_query("select * from citys order by id"); ?>
						<select name="city" style="width:175px;">
							<option value="" selected="selected">- -Select City- -</option>
							<?php
								while($row_citys=mysql_fetch_array($citys)) {
							?>
								<option value="<?php echo $row_citys['id'];?>" <?php if($val['f_city']==$row_citys['id']) { echo "selected"; } ?>><?php echo $row_citys['citys'];?></option>
							<? } ?>
						</select>
					</td>
				</tr>
				
						<tr style="vertical-align:top"><td align="left">Purpose<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left">
							<select name="purpose" style="width:175px">
								<option value="" selected="selected">- -Select Purpose- -</option>
								<option value="Residential" <?php if($val['f_purpose']=="Residential") { echo "selected"; } ?>>Residential</option>
								<option value="Commercial" <?php if($val['f_purpose']=="Commercial") { echo "selected"; } ?>>Commercial</option>
								<option value="Industrial" <?php if($val['f_purpose']=="Industrial") { echo "selected"; } ?>>Industrial</option>
								<option value="Agriculture" <?php if($val['f_purpose']=="Agriculture") { echo "selected"; } ?>>Agriculture</option>
							</select>
							</td>
						</tr>
				
				<tr style="vertical-align:top"><td align="left">Price<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="price" name="price" value="<?php echo $val['f_price'];?>" size="25"/></td></tr>
				
				
				<tr style="vertical-align:top"><td align="left">Beds<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="beds" name="beds" value="<?php echo $val['f_beds'];?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Baths<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="baths" name="baths" value="<?php echo $val['f_baths'];?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Floors<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="floors" name="floors" value="<?php echo $val['f_floors'];?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Annual Tax<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="annualreport" name="annualtax" value="<?php echo $val['f_annual_tax'];?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Home size<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="leavingarea" name="leavingarea" value="<?php echo $val['f_livingarea'];?>" size="25"/> Sq.Ft</td></tr>
				
								<tr style="vertical-align:top"><td align="left">Lot size<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="lotsize" name="lotsize" value="<?php echo $val['f_lotsize'];?>" size="25"/> Sq.Ft</td></tr>
				
				<tr style="vertical-align:top"><td align="left">Year Date<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="yeardate" name="yeardate" value="<?php echo $val['f_yearbuilt'];?>" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Image<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><div id="filetypeid"><input type="file" name="image" id="previewField" value="" onChange="return preview(this)"></div></td></tr>

				
				<tr style="vertical-align:top"><td align="left" style="vertical-align:top">Description</td><td align="left" style="vertical-align:top">:</td><td colspan="1"> <textarea name="Editor1" class="ckeditor" id="editor1"><?php echo $val['f_description'];?></textarea></td></tr>
				
				
				<tr><td colspan="3" style="padding-left:320px;">
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
