<?php
require_once("includes/common.inc.php"); 
$url= basename(__FILE__);


$class=$_GET['class'];
$bdrme=$_GET['bedroom'];
$city=$_GET['city'];
$key=$_GET['keyword'];
$type=$_GET['type'];
$min=$_GET['min'];
$max=$_GET['max'];
$locality=$_GET['locality'];

if($class){ $add_search=mysql_query("select * from priority_futurehome where f_propertyclass='$class'"); }
if($bdrme){ $add_search=mysql_query("select * from priority_futurehome where f_beds='$bdrme'"); }
if($city) { $add_search=mysql_query("select * from priority_futurehome where f_city='$city'"); }
if($type) { $add_search=mysql_query("select * from priority_futurehome where f_purpose='$type'"); }
if($key){ $add_search=mysql_query("select * from priority_futurehome where f_description like '%$key%'"); }
if($min && $max){ $add_search=mysql_query("select * from priority_futurehome where f_price='$min' and f_price_max='$max'"); }
if($locality){ $add_search=mysql_query("select * from priority_futurehome where f_address like '%$locality%'"); }
if($class && $bdrme){ $add_search=mysql_query("select * from priority_futurehome where f_propertyclass='$class' and f_beds='$bdrme'"); }
if($class && $bdrme){ $add_search=mysql_query("select * from priority_futurehome where f_propertyclass='$class' and f_beds='$bdrme'"); }
if($class && $bdrme && $city){ $add_search=mysql_query("select * from priority_futurehome where f_propertyclass='$class' and f_beds='$bdrme' and f_city='$city'"); }
if($class && $bdrme && $city && $type){ $add_search=mysql_query("select * from priority_futurehome where f_propertyclass='$class' and f_beds='$bdrme' and f_city='$city' and f_purpose='$type'"); }
$add_search=mysql_query("select * from priority_futurehome where f_propertyclass='$class' or f_beds='$bdrme' or f_city='$city' or f_purpose='$type'");
$add_search_num=mysql_num_rows($add_search);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::..Welcome To Sreekara Green City Developers::..</title>
<?php include "files/head.php"; ?>
<style type="text/css">
.left_text {
font-size:12px;
color:#000000;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-weight:normal;
}
.bold{
font-weight:bold;
}
.right_text {
font-size:12px;
color:#000000;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-weight:normal;
}
.font{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#000000;
line-height:16px;
}
.border {
border:solid 1px #000000;
}
.border:hover {
border:solid 1px #FF00FF;
}
</style>
<link href="css/clearbox.css" rel="stylesheet" type="text/css" />
<script src="js/clearbox.js" type="text/javascript" charset="iso-8859-2"></script>
</head>
<body>
<div class="wraper"><!--Wraper Start Here -->
	<div class="topbg">
		<div class="header">
        	<?php include "files/logo.php"; ?>
		  <div class="flash">
			<div class="slider-wrapper theme-default">
				<?php include "files/slide.php"; ?>
		    </div>
	<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
		</div>
		<div class="sreekara"><img src="images/sreekara.png" /></div>
		<div class="navagation">
			<div class="navagation">
		<div id="smoothmenu1" class="ddsmoothmenu">
			<?php include "files/menus.php"; ?>
		</div>
		</div>
		</div>
        </div>
	</div>
		<div class="maincontainer">
			<div class="aboutuspage" style="width:900px;">
			
					<?php if($add_search_num>0) {?>
					<Table border="0" width="100%">
						<tr>					
					<?php 
						$m = 0;
						while($row_home=mysql_fetch_array($add_search)) {
						$m++;
					?>
						<Td width="5%">	
							<a href="property_view.php?id=<?php echo $row_home['f_id'];?>">
								<img src="homeimages/thumb/<?php echo $row_home['f_image'];?>" title="<?php echo $val['f_title'];?>" height="120"  class="border"/>
							</a>
						</Td>
						<Td class="font" valign="top">
							<?php
							$str = ucfirst($row_home['f_title']); $text = substr($str,0,15); echo $text;?><br />
							Beds 	: <?php echo $row_home['f_beds'];?><br />
							Baths 	: <?php echo $row_home['f_baths'];?><br />
							Leaving Area 	: <?php echo $row_home['f_livingarea'];?> sft<br />
							Year built 	: <?php echo $row_home['f_yearbuilt'];?><br />
							Property class 	: <?php echo $row_home['f_propertyclass'];?><br />
							<a href="property_view.php?id=<?php echo $row_home['f_id'];?>"><b>Details</b></a>
						</Td>
						<? if($m%3==0) { echo "</tr><tr>"; } } ?>
						</tr>
			  </Table>
					<? } else { ?>
						<div style="font-size:14px; font-weight:bold; text-align:center">Search Home Details Not Found...!</div>
					<? } ?>
							
			</div>
		</div>
		<!--Maincontainer Ends Here -->

<div class="footer">
	<div class="copyrights">Copyright © 2011-2012 Sreekara Greencity Developers. All Rights Reserved</div>
	<a href="http://www.comsparkinfoindia.com/" target="_blank"><img src="images/comspark.png" /></a></div>

</div><!--Wraper Ends Here -->
</body>
</html>

