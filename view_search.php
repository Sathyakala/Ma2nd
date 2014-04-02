<?php
require_once("includes/common.inc.php"); 
$url= basename(__FILE__);
$ci=$_GET['city'];
$sear=$_GET['search_by'];
$pur=$_GET['purpose'];
$address=$_GET['address'];
if($ci){
	$search=mysql_query("select * from priority_futurehome where f_city='$ci'");
}
if($ci && $pur){
	$search=mysql_query("select * from priority_futurehome where f_city='$ci' and f_purpose='$pur'");
}
if($ci && $address ) {
	$search=mysql_query("select * from priority_futurehome where f_city='$ci' and f_address='$address'");
}
if($ci && $address && $pur) {
	$search=mysql_query("select * from priority_futurehome where f_city='$ci' and f_address='$address' and f_purpose='$pur'");
}
else {
	$search=mysql_query("select * from priority_futurehome where f_title='$sear' or f_purpose='$pur' and f_city='$ci' or f_address='$address'");
}
	$search_num=mysql_num_rows($search);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::..Welcome To Sreekara Green City Developers::..</title>
<?php include "files/head.php"; ?>
<style type="text/css">
.text{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#000000;
font-weight:normal;
}
.border{
border:solid 1px #000000;
}
.border:hover{
border:solid 1px #FF00FF;
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
				<h5>Feature Homes</h5>
					<?php if($search_num>0) {?>
						<Table border="0" cellpadding="3" cellspacing="3">
						<tr>
							<?php
								$i = 0;
								while($row_home=mysql_fetch_array($search)) {			
								$i++;
							?>
								<td valign="top">
								<a href="property_view.php?id=<?php echo $row_home['f_id'];?>">
									<img src="homeimages/thumb/<?php echo $row_home['f_image'];?>" title="<?php echo $row_home['f_title'];?>" class="border" height="150"/>
								</a>	
								</td>
								<Td class="text" style="line-height:20px;" valign="top">
									<?php $str = ucfirst($row_home['f_title']); $text = substr($str,0,15); echo $text;?><br />
										Beds 	: <?php echo $row_home['f_beds'];?><br />
										Baths 	: <?php echo $row_home['f_baths'];?><br />
										Leaving Area 	: <?php echo $row_home['f_livingarea'];?> sft<br />
										Year built 	: <?php echo $row_home['f_yearbuilt'];?><br />
										Property class 	: <?php echo $row_home['f_propertyclass'];?><br />
										<a href="property_view.php?id=<?php echo $row_home['f_id'];?>">Details</a><br />
								</td>
							<? } if($i%3==0) { echo "</tr><tr>"; } ?>
							
						</tr>
						</Table>
					<? } else { ?>
						<?php
							$home = $_GET['purpose'];
							
						?>
						<div style="font-size:14px; font-weight:bold; text-align:center">Feature Home Not Found...!</div>
					<? } ?>
            	
				
		  </div>				
			
        	    					
				
			</div>
	</div>
		<!--Maincontainer Ends Here -->

<div class="footer">
	<div class="copyrights">Copyright © 2011-2012 Sreekara Greencity Developers. All Rights Reserved</div>
	<a href="http://www.comsparkinfoindia.com/" target="_blank"><img src="images/comspark.png" /></a></div>

</div><!--Wraper Ends Here -->
</body>
</html>

