<?php
require_once("../includes/common.inc.php");
$Dir_name='../homegallery/home';

$id = $_REQUEST['f_id'];
$uid = $_REQUEST['uid'];
if (isset($_POST["PHPSESSID"])) {
		session_id($_POST["PHPSESSID"]);
	}
		$uploadDir = $Dir_name;
		$fileName = $_FILES['walimage']['name'];
		$tmpName  = $_FILES['walimage']['tmp_name'];
		$fileSize = $_FILES['walimage']['size'];
		$fileType = $_FILES['walimage']['type'];
		$filePath = $uploadDir . $fileName;
	
		$filePath_db ='../homeimages/home/'.$id.'/'.$fileName;
		if($fileName!='')
		{
		$result = move_uploaded_file($tmpName, $filePath_db);
		mysql_query("INSERT INTO gallery 
(gallery_id, user_id, images) VALUES('$id','$uid', '".trim($fileName)."' ) ") 
or die(mysql_error());
	   }

?>