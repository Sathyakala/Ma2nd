<?php 

error_reporting(0);

$page_url =basename(__FILE__); 

require_once("includes/common.inc.php"); 

include_once("fckeditor/fckeditor.php");

if($_POST['submit']=="Submit"){

      $duplicatc_user = $db->getOne('SELECT count(*) FROM '.STORE.' WHERE title= ?', array(mysql_real_escape_string($_POST['title'])));

	 if ( $duplicatc_user > 0 ){

			 $error="Story with this title already exist";

		}else{

       $da=time();

	   $users_values = array('title'=> $_POST['title'],

	                         'shortdesc'=> $_POST['short_description'],

							 'description'=> $_POST['elm1'],

							 'writer'=> $_POST['title'],

							 'email'=> $_POST['author_email'], 

							 'phone'=> $_POST['phone'],

							 'lang_id' => $_POST['language'],

							 'writer'=> $_POST['author'], 

							 'address'=> $_POST['address'], 

							 'category' => $_POST['category'],

							 'subcategory' => $_POST['subcategory'],

							 'ondate'=> $da, 

							 'status'=> '0');

					$db->insert(STORE, $users_values);

					$succ="Story added successfully";	

      }

}









?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>::..Welcome To Easy Movies..::</title>

<?php include "include/head.php"; ?>

</head>

<style type="text/css">

.text{

color:#000000;

text-align:left;

vertical-align:top;

}

.bold{

vertical-align:top;

font-weight:bold;

}

.head{

color:#000000;

font-size:14px;

font-weight:bold;

}

</style>

<body>

<script language="javascript" type="text/javascript">

function getXMLHTTP() { //fuction to return the xml http object

	var xmlhttp=false;

		try{

				xmlhttp=new XMLHttpRequest();

		   }

		catch(e) {

			try{

		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

		}

catch(e){

try{

	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch(e1){

xmlhttp=false;

}

}

}

return xmlhttp;

}



function getData(catid) {



var strURL="story_category.php?id="+catid;

var req = getXMLHTTP();



if (req) {



req.onreadystatechange = function() {

if (req.readyState == 4) {

// only if "OK"

if (req.status == 200) {

document.getElementById('statediv').innerHTML=req.responseText;

} else {

alert("There was a problem while using XMLHTTP:\n" + req.statusText);

}

}

}

req.open("GET", strURL, true);

req.send(null);

}

}

</script>

<div class="wraper"><!--Wrapere Start Here -->

	<div class="main-header"><!--Header Start Here -->

    	<?php include "include/header.php"; ?>

		<?php include "include/menus.php"; ?>

       

    </div><!--Header Ends Here -->

<div class="mainbody">

 <div class="homereviews"><!--Home reviews start here -->

 	<?php include "include/leftmenu.php"; ?>

 </div><!--Home reviews ends here -->

	<div class="pageheading"><h4><a href="index.php" title="Home">Home ></a></h4><h4 title="Upload Your Stories">Upload Your Stories</h4></div>

	<div class="innerpagesec2">

    	<div class="storysleft">

        	<div class="music">

			<div class="audiosec"  style="float:left">

			

			<form name="stories" method="post" enctype="multipart/form-data">

				<table width="136%" border="0">

					<tr>	

						<td colspan="3" class="head">Add Stories</td>

					</tr>

					<tr>

						<Td colspan="4" align="center"><font color="#0000FF"><?php echo $succ;?></font></Td>

					</tr>

					<tr>

						<td width="27%" class="text">Language</td>

						<td width="4%" class="bold">:</td>

					  <td width="69%">

					  	<select name="language">

							<option value="" selected="selected">Select Language</option>

							<?php 

								$val = $db->getRows("select * from mov_lang");

								foreach ($val as $value) {

							?>

								<option value="<?php echo $value['lang_id'];?>"><?php echo $value['language'];?></option>

							<? } ?>

						</select>

					  </td>

					</tr>

					<Tr>

						<td class="text">Author Name</td>

						<td class="bold">:</td>

						<td><input type="text" name="author" /></td>

					</Tr>

					<tr>

						<td class="text">Author Email</td>

						<td class="bold">:</td>

						<td><input type="text" name="author_email" /></td>

					</tr>

					<tr>

						<td class="text">Phone</td>

						<td class="bold">:</td>

						<td><input type="text" name="phone" /></td>

					</tr>

					<tr>	

						<td class="text">Categories</td>

						<td class="bold">:</td>

						<td>

							<select name="category" onChange="getData(this.value)">

								<option value="" selected="selected">Select Category</option>

								<?php

									$cat = $db->getRows("Select * from mov_story_cat where status='1'");

									foreach($cat as $catgery) {

								?>

									<option value="<?php echo $catgery['story_cat_id'];?>"><?php echo $catgery['name'];?></option>

								<? } ?>

							</select>

						</td>

					</tr>

					<tr>

						<td colspan="3">					

							<div id="statediv">					

							

							</div>

						</td>

					</tr>

					<tr>

						<td class="text">Story Title</td>

						<td class="bold">:</td>

						<td><input type="text" name="title" /></td>

					</tr>

					<tr>

						<td class="text">Address</td>

						<td class="bold">:</td>

						<td><textarea name="address" cols="20" rows="4"></textarea></td>

					</tr>

					<tr>

						<Td class="text">Short Description</Td>

						<td class="bold">:</td>

						<td><textarea name="short_description" cols="20" rows="4"></textarea></td>

					</tr>

					<tr>

						<td class="text">Story</td>

						<td class="bold">:</td>

						<td>

						<?php

							$oFCKeditor = new FCKeditor('elm1', '550', '750') ;

							$oFCKeditor->BasePath	= 'fckeditor/' ;

							$oFCKeditor->Value		=  '';

							$oFCKeditor->Create() ; 

						?>

						

						</td>

					</tr>

					<tr>

						<Td colspan="5" align="center">

							<input type="submit" name="submit" value="Submit" />

						</Td>

					</tr>

			  </table>

			</form>



 			</div>

            </div>

        </div>

	<?php include "include/inner_right.php"; ?>

	</div>

</div>

<!--Wraper Ends Here -->

	<?php include "include/footer.php"; ?>

<!--Footer Ends here -->

</div>



</body>

</html>

