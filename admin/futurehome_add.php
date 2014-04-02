<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
if($_POST['submit']=="Add"){
      $duplicate_user = $db->getOne('SELECT count(*) FROM priority_futurehome WHERE f_title= ?', array(mysql_real_escape_string($_POST['title'])));
	 if ( $duplicate_user > 0 ){
			 $_SESSION['warning']="Featured Home Title Already Exist";
		}else{
		
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
		} 	
		
       $users_values = array(
					'f_title'	=> $_POST['title'],
					'f_propertyclass'	=> $_POST['property'],
					'f_address'	=> $_POST['address'],
					'f_country'	=> $_POST['country'],
					'f_state'	=> $_POST['state'],
					'f_city'	=> $_POST['city'],
					'f_purpose' => $_POST['purpose'],
					'f_price'	=> $_POST['min_price'],
					'f_price_max'	=> $_POST['max_price'],
					'f_beds'	=> $_POST['beds'],
					'f_baths'	=> $_POST['baths'],
					'f_floors'	=> $_POST['floors'],
					'f_annual_tax'	=> $_POST['annualtax'],	
					'f_livingarea'	=> $_POST['leavingarea'],
					'f_lotsize'	=> $_POST['lotsize'],
					'f_yearbuilt'	=> $_POST['yeardate'],																							
					'f_image'	=> $image,
					'f_thumb'   => $thumb,
					'f_largethumb'   => $largethumb,
					'f_description'	=> $_POST['Editor1']);
					$db->insert("priority_futurehome", $users_values);
					
				$_SESSION['suss']="Featured Home Details Successfully Added";	
      }

 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Featured Home Add || Sreekara Green City Developers</title>
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
				
				<tr style="vertical-align:top"><td align="left">Featured Home Title<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="title" name="title" value="" size="25"/></td></tr>
				
						<tr style="vertical-align:top"><td align="left">Property class<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><select name="property" style="width:175px">     <option>- -Select Property- -</option>
			<option>Houses</option>
			<option>Flats</option>
			</select></td></tr>
			
						<tr style="vertical-align:top"><td align="left">Address<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="address" name="address" value="" size="25"/></td></tr>
						
				
				<tr style="vertical-align:top">
					<td align="left">Citys<span style="color:#FF0000">*</span></td>
					<td align="left" width="2">:</td><td align="left">
					<?php $citys=mysql_query("select * from citys order by id"); ?>
						<select name="city" style="width:175px;">
							<option value="" selected="selected">- -Select City- -</option>
							<?php
								while($row_citys=mysql_fetch_array($citys)) {
							?>
								<option value="<?php echo $row_citys['id'];?>"><?php echo $row_citys['citys'];?></option>
							<? } ?>
						</select>
					</td>
				</tr>
				
						<tr style="vertical-align:top"><td align="left">Purpose<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left">
							<select name="purpose" style="width:175px">
								<option value="" selected="selected">- -Select Purpose- -</option>
								<option value="Residential">Residential</option>
								<option value="Commercial">Commercial</option>
								<option value="Industrial">Industrial</option>
								<option value="Agriculture">Agriculture</option>
							</select>
							</td>
						</tr>
				
				<tr style="vertical-align:top">
					<td align="left">Price<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left">
						<select style="width:68px; color:#656565; font-size:12px;" name="min_price">
							<option>Min</option>
							<option value="1 lacks">1 Lacks</option>
							<option value="5 lacks">5 Lacks</option>
							<option value="10 lacks">10 Lacks</option>
							<option value="20 lacks">20 Lacks</option>
							<option value="30 lacks">30 Lacks</option>
							<option value="40 lacks">40 Lacks</option>
							<option value="50 lacks">50 Lacks</option>
							<option value="60 lacks">60 Lacks</option>
							<option value="70 lacks">70 Lacks</option>
							<option value="80 lacks">80 Lacks</option>
							<option value="90 lacks">90 Lacks</option>
						</select>
						To
						<select style="width:68px; color:#656565; font-size:12px;" name="max_price">
								<option>Max</option>
								<option value="1 lacks">1 Lacks</option>
								<option value="5 lacks">5 Lacks</option>
								<option value="10 lacks">10 Lacks</option>
								<option value="20 lacks">20 Lacks</option>
								<option value="30 lacks">30 Lacks</option>
								<option value="40 lacks">40 Lacks</option>
								<option value="50 lacks">50 Lacks</option>
								<option value="60 lacks">60 Lacks</option>
								<option value="70 lacks">70 Lacks</option>
								<option value="80 lacks">80 Lacks</option>
								<option value="90 lacks">90 Lacks</option>
						</select>
				    </td>
				</tr>
				
				
				<tr style="vertical-align:top"><td align="left">Beds<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="beds" name="beds" value="" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Baths<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="baths" name="baths" value="" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Floors<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="floors" name="floors" value="" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Annual Tax<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="annualreport" name="annualtax" value="" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Home size<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="leavingarea" name="leavingarea" value="" size="25"/> Sq.Ft</td></tr>
				
								<tr style="vertical-align:top"><td align="left">Lot size<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="lotsize" name="lotsize" value="" size="25"/> Sq.Ft</td></tr>
				
				<tr style="vertical-align:top"><td align="left">Year Date<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><input id="yeardate" name="yeardate" value="" size="25"/></td></tr>
				
				<tr style="vertical-align:top"><td align="left">Image<span style="color:#FF0000">*</span></td><td align="left" width="2">:</td><td align="left"><div id="filetypeid"><input type="file" name="image" id="previewField" value="" onChange="return preview(this)"></div></td></tr>

				
				<tr style="vertical-align:top"><td align="left" style="vertical-align:top">Description</td><td align="left" style="vertical-align:top">:</td><td colspan="1"> <textarea name="Editor1" class="ckeditor" id="editor1"></textarea></td></tr>
				
				
				<tr><td colspan="3" style="padding-left:320px;">
					<input name="submit" type="submit" value="Add" onclick="return validate()"/></td></tr>
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
