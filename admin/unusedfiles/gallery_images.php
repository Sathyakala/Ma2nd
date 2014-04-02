<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");

		
	  
		$fileName = $_FILES['image']['name'];#"sridhar";
		$tmpName  = $_FILES['image']['tmp_name'];
		$fileSize = $_FILES['image']['size'];
		$fileType = $_FILES['image']['type'];
		$filePath = $fileName;
	
		$filePath_db ='gallerys/'.$fileName;
		if($fileName!='')
		{
		$result = move_uploaded_file($tmpName, $filePath_db);
		$cur_date= date('Y-m-d H:i:s');
		//mysql_query("INSERT INTO gallery 
//(gallery_id, imagepath) VALUES('".$max_newsid."', '".trim($fileName)."' ) ") 
//or die(mysql_error());
	   }
?>
