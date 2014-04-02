<?php require_once("includes/common.inc.php");  $page=basename(__FILE__); 

if($_POST['submit']) {
$name = $_POST['class'];
$type = $_POST['type'];
$bed = $_POST['bedroom'];
$min = $_POST['min'];
$max = $_POST['max'];
$city_id = $_POST['city'];
$locality = $_POST['locality'];
$keyword = $_POST['keyword'];

$city_name = $db->getRow("select * from citys where id='$city_id'");
$city = $city_name['id'];
$sel = $db->getRows("select * from priority_futurehome where f_purpose='$type' or f_beds='$bed' or f_price='$min' or f_price_max='$max' or f_city='$city'");
$cnt = $db->numRows($sel);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::..Welcome To Sreekara Green City Developers::..</title>
<?php include "files/head.php"; ?>
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
		<div class="aboutuspage" style="width:920px;">
				<h5>Advance Search</h5>
                <div class="contactussec">
            
			<?php if($cnt > 0) {?>
				
				<div class="aboutuspage" style="width:900px;">
					<Table border="0" cellpadding="3" cellspacing="3">
					<tr>
						<?php
							$i = 0;
							foreach($sel as $row_home) {			
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
				</div>
			<? } else {?>
				<form name="frm" method="get" enctype="multipart/form-data" action="advance_search_view.php">
					<div class="enquiryformsec"><h5 style="font-size:13px; font-weight:bold; border-bottom:0px;">Search For</h5>
					<div><label>Name :</label>
						<input type="radio" name="class" value="Flats" class="radio" /><span>Flats</span>
						<input type="radio" name="class" value="Houses" class="radio" /><span>House</span>
					</div>
					<div><label>Type :</label>
						<select style="width:190px; color:#656565; font-size:12px;" name="type">
							<option value="" selected="selected">- - Select - - </option>
							<option value="Residential">Residental</option>
							<option value="Commercial">Commericial</option>
							<option value="Industrial">Industrial</option>
							<option value="Agriculture">Agriculture</option>
						</select>
					</div>
					<div><label>Bedroom :</label>
						<select style="width:146px; color:#656565; font-size:12px;" name="bedroom">
							<option value="" selected="selected">- - Select - -</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="above 10">Above 10</option>
						</select>
					</div>
					<div><label>Budget :</label>
						<select style="width:68px; color:#656565; font-size:12px;" name="min" id="min">
							<option>Min</option>
							<option value="1 lakhs">1 Lakhs</option>
							<option value="5 lakhs">5 Lakhs</option>
							<option value="10 lakhs">10 Lakhs</option>
							<option value="20 lakhs">20 Lakhs</option>
							<option value="30 lakhs">30 Lakhs</option>
							<option value="40 lakhs">40 Lakhs</option>
							<option value="50 lakhs">50 Lakhs</option>
							<option value="60 lakhs">60 Lakhs</option>
							<option value="70 lakhs">70 Lakhs</option>
							<option value="80 lakhs">80 Lakhs</option>
							<option value="90 lakhs">90 Lakhs</option>
						</select>
							<span>To</span>
						<select style="width:68px; color:#656565; font-size:12px;" name="max" onchange="callFun()">
								<option>Max</option>
								<option value="1 lakhs">1 lakhs</option>
								<option value="5 lakhs">5 lakhs</option>
								<option value="10 lakhs">10 lakhs</option>
								<option value="20 lakhs">20 lakhs</option>
								<option value="30 lakhs">30 lakhs</option>
								<option value="40 lakhs">40 lakhs</option>
								<option value="50 lakhs">50 lakhs</option>
								<option value="60 lakhs">60 Lakhs</option>
								<option value="70 lakhs">70 Lakhs</option>
								<option value="80 lakhs">80 Lakhs</option>
								<option value="90 lakhs">90 Lakhs</option>
						</select>
					</div>
                    
                    <div><label>City :</label>
					<?php
						$country=mysql_query("select * from citys order by id");
					?> 
						<select style="width:146px; color:#656565; font-size:12px;" name="city">
							<option value="" selected="selected">- - Select - -</option>
							<?php while ($row_country=mysql_fetch_array($country)) {?>
								<option value="<?php echo $row_country['id'];?>"><?php echo $row_country['citys'];?></option>
							<? } ?>
						</select>
					</div>
                    <div><label>Loacality</label>
						<input type="text" style="width:190px;" name="locality" />
					</div>
                    <div><label>Keywords</label><input type="text" name="keyword" /></div>
                    <div><span>Eg. Project, Builder, Amenities etc.</span></div>
                    
                    
					<div><label></label><input name="submit" type="submit" class="submit" value="Search Now" /></div>
				
				
				</div>
				</form>
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
 