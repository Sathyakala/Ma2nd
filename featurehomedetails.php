<?php
require_once("includes/common.inc.php"); 
$page=basename(__FILE__);
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
line-height:18px;
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
			<table border="0" width="100%">
				<tr height="140px;">
			<?php
				$m = 0;
				$sel = $db->getRows("select * from priority_futurehome where f_status='1'");
				foreach ($sel as $val) {	
				$m++;
			?>				
					<td width="5%" valign="top">
						<a href="property_view.php?id=<?php echo $val['f_id'];?>">
							<img src="homeimages/thumb/<?php echo $val['f_image'];?>" title="<?php echo $val['f_title'];?>" height="120"  class="border"/>
						</a>
						
					</td>
					<td valign="top" class="font">
					<?php 
						$str = ucfirst($val['f_title']); $text = substr($str,0,15); echo $text;?><br />
						Beds 	: <?php echo $val['f_beds'];?><br />
						Baths 	: <?php echo $val['f_baths'];?><br />
						Leaving Area 	: <?php echo $val['f_livingarea'];?> sft<br />
						Year built 	: <?php echo $val['f_yearbuilt'];?><br />
						Property class 	: <?php echo $val['f_propertyclass'];?><br />
						<a href="property_view.php?id=<?php echo $val['f_id'];?>"><b>Details</b></a>

					</td>
			<? if($m%3==0) { echo "</tr><tr>"; }} ?>
				</tr>
			</table>
							
			</div>
		</div>
		<!--Maincontainer Ends Here -->

<div class="footer">
	<div class="copyrights">Copyright © 2011-2012 Sreekara Greencity Developers. All Rights Reserved</div>
	<a href="http://www.comsparkinfoindia.com/" target="_blank"><img src="images/comspark.png" /></a></div>

</div><!--Wraper Ends Here -->
</body>
</html>

