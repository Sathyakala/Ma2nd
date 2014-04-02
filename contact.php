<?php
require_once("includes/common.inc.php"); 


$page=basename(__FILE__);
$val = $db->getRow("select * from ".SITECONTENT." where id='15'");
function SendHTMLMail($to1,$subject2,$mailcontent1,$from1)
{
	$limite = "_parties_".md5 (uniqid (rand()));
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8"."\r\n";
	$headers .= "From: <$from1>" . "\r\n";
	$headers .= "Reply-To: <$from1>" . "\r\n"; 

	mail($to1,$subject2,$mailcontent1,$headers);
}
if(isset($_POST['submit']))
{
$from=$_POST['email'];
$to="hsekhar.comspark@gmail.com";
$subject1 = 'Enquiry Form Details';
$content1='<table align="left">
	  <tr>
		 <th>Name</th>
		 <td>:</td>
		 <td>'.$_POST['name'].'</td>
	   </tr>
	   <tr>
		 <th>Email</th>
		 <td>:</td>
		 <td>'.$_POST['email'].'</td>
	   </tr>
	   <tr>
		 <th>Mobile Number</th>
		 <td>:</td>
		 <td>'.$_POST['phone'].'</td>
	   </tr>
 	   <tr>
		 <th>Message</th>
		 <td>:</td>
		 <td>'.$_POST['message'].'</td>
	   </tr>
	 </table>';
	SendHTMLMail($to,$subject1,$content1,$from);

	echo "<script>alert('Your details have been sent successfully!')</script>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
			
			
			
			
			
		<div class="aboutuspage">
				<h5>Enquiry Form</h5>
				<div class="contactussec">
            	<div class="enquiryformsec">
					<form name="frm" method="post" enctype="multipart/form-data">
						<div><label>Name<font color="#FF0000">*</font> :</label><input name="name" type="text" /></div>
						<div><label>E-Mail<font color="#FF0000">*</font> :</label><input name="email" type="text" /></div>
						<div><label>Phone<font color="#FF0000">*</font> :</label><input name="phone" type="text" /></div>
						<div><label>Message<font color="#FF0000">*</font> :</label><textarea name="message" cols="22" rows="4"></textarea></div>
						<div><label></label><input name="submit" type="submit" class="submit" value="Submit" onclick="return valid();" /></div>
					</form>
				</div>
            	
				
		  </div>				
			
        	<div class="addresssec">
            <h5><?php echo $val['title'];?></h5>
			<p><?php echo $val['description'];?></p>
		
            </div>    					
				
			</div>
			
	 <?php include "files/advertisement.php"; ?>	
	</div>
		<!--Maincontainer Ends Here -->

<div class="footer">
	<div class="copyrights">Copyright © 2011-2012 Sreekara Greencity Developers. All Rights Reserved</div>
	<a href="http://www.comsparkinfoindia.com/" target="_blank"><img src="images/comspark.png" /></a></div>

</div><!--Wraper Ends Here -->
</body>
</html>
<script language="javascript">
function valid() {
f = document.frm;

	if(f.name.value=="") {
		alert("Name is required");
		f.name.focus();
		return false;
	}
	if(!isNaN(f.name.value)) {
 	alert("Please Enter valid Name"); 
 	f.name.focus(); 
	return false;
	} 
	if(f.email.value=="") {
		alert("Email is required");
		f.email.focus();
		return false;
	}	
	if(!emailInvalid(f.email.value)) 	{
		alert("Please enter the valid email address");
		f.email.focus();
		return false;
	}
	if(f.phone.value=="") {
		alert("Phone Number is required");
		f.phone.focus();
		return false;
	}
	if(isNaN(f.phone.value))
	 {
    	alert("Please Enter Number only");
		f.phone.focus();
		return false;
	 }
	if(f.message.value=="") {
		alert("Message is required");
		f.message.focus();
		return false;
	}

}
  function emailInvalid(s)
{
	if(!(s.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i) ))
    {
		return false;
	}
	else
	{
		return true;
	}
}
</script>
