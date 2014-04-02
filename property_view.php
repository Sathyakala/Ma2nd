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
		<?php 
			$id = $_GET['id'];
			$sel = $db->getRow("select * from priority_futurehome where f_id='$id'");
		?>	
		<div class="aboutuspage" style="width:900px;">
				<h5><?php echo ucwords($sel['f_title']);?></h5>
				<table border="0" width="100%">
					<Tr>
						<Td width="20%" class="left_text">Title</Td>
						<td width="1%" class="bold">:</td>
						<td width="42%" class="right_text"><?php echo $sel['f_title'];?></td>
					    <td width="37%" rowspan="15" class="right_text" valign="top">
							<Table border="0" cellpadding="3" cellspacing="3">
								<Tr>
									<td colspan="5"><b><?php echo $sel['f_title'];?> Gallery</b></td>
								</Tr>
								<Tr>
							<?php
								$m = 1;
								$uid = $sel['f_id'];
								$getimage = $db->getRows("select * from gallery where user_id='$uid' order by gallery_id desc limit 10");
								foreach ($getimage as $image) {
							?>
									<td class="lightbox2">
										<a href="homeimages/home/<?php echo $image['images'];?>" rel="clearbox[Blossom]">
											<img src="homeimages/home/<?php echo $image['images']?>"  height="100" width="100"/>
										</td>	
									</td>
								<? $m++; if($m%3==0) { echo "</tr><tr>"; } }?>
								</Tr>
							</Table>
					
						</td>
					</Tr>
					<Tr>
						<Td class="left_text">Property Class</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_propertyclass'];?></td>
				    </Tr>
					<Tr>
						<Td class="left_text">Address</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_address'];?></td>
				    </Tr>
					<Tr>
						<Td class="left_text">Purpose</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_purpose'];?></td>
				    </Tr>
					<Tr>
						<Td class="left_text">Price</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_price'];?> To <?php echo $sel['f_price_max'];?></td>
				    </Tr>
					<Tr>
						<Td class="left_text">Number of Beds</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_beds'];?> Beds Rooms</td>
				    </Tr>
					<Tr>
						<Td class="left_text">Number of Baths</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_baths'];?> Bath Rooms</td>
				    </Tr>
					<Tr>
						<Td class="left_text">Number of Floors</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_floors'];?> Floors</td>
				    </Tr>
					<Tr>
						<Td class="left_text">Annual Tax</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_annual_tax'];?></td>
				    </Tr>
					<Tr>
						<Td class="left_text">Living Area</Td>
						<td class="bold">:</td>
						<td class="left_text"><?php echo $sel['f_livingarea'];?></td>
				    </Tr>
					<Tr>
						<Td class="left_text">Year of Built</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_yearbuilt'];?></td>
				    </Tr>
					<Tr>
						<Td class="left_text">Description</Td>
						<td class="bold">:</td>
						<td class="right_text"><?php echo $sel['f_description'];?></td>
				    </Tr>			
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

