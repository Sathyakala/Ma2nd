<?php
require_once("includes/common.inc.php"); 
$page=basename(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::..Welcome To Sreekara Green City Developers::..</title>
<?php include "files/head.php"; ?>
<style type="text/css">
.border {
border:solid 1px #000000;
}
.view{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#000000;
font-weight:bold;
text-align:right;
}
</style>
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
		<div class="sreekara"><img src="images/sreekara.png" alt="Sreekara Green City Developers" title="Sreekara Green City Developers" /></div>
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
			<?php
				include "files/leftmenu.php"; 
			?>
			<div class="featuredhomes"><h4>Featured Homes</h4>
			<?php
				$home = $db->getRows("select * from priority_futurehome order by f_id desc limit 2 ");
				foreach ($home as $val) {
			?>	
			<div class="featuresec">
				<div style="width:96px; height:140px; float:left; margin:5px 10px;">
					<img src="homeimages/thumb/<?php echo $val['f_image'];?>" title="<?php echo $val['f_title'];?>"/></div>
					<p><?php $str = ucfirst($val['f_title']); $text = substr($str,0,15); echo $text;?></p>
					<p>Beds 	: <?php echo $val['f_beds'];?></p>
					<p>Baths 	: <?php echo $val['f_baths'];?></p>
					<p>Leaving Area 	: <?php echo $val['f_livingarea'];?> sft</p>
					<p>Year built 	: <?php echo $val['f_yearbuilt'];?></p>
					<p>Property class 	: <?php echo $val['f_propertyclass'];?></p>
					<p style="text-align:right;"><a href="property_view.php?id=<?php echo $val['f_id'];?>">Details</a></p>
				</div>
			<? } ?>
				<p><a href="featurehomedetails.php" class="view">View More >></a></p>
			</div>
			<?php include "files/news.php"; ?>
		</div>
		<?php include "body.php"; ?>
	 <?php include "files/advertisement.php"; ?>		
	</div>
		<!--Maincontainer Ends Here -->
<div class="footer">
	<div class="copyrights">Copyright © 2011-2012 Sreekara Greencity Developers. All Rights Reserved</div>
	<a href="http://www.comsparkinfoindia.com/" target="_blank"><img src="images/comspark.png" alt="Powered By " /></a></div>
</div><!--Wraper Ends Here -->
</body>
</html>