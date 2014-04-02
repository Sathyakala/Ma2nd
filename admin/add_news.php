<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");
 include_once("fckeditor/fckeditor.php");
$page=basename(__FILE__);
if($_POST['submit']=="Add"){
      $duplicate_user = $db->getOne('SELECT count(*) FROM '.NEWS.' WHERE n_title= ?', array(mysql_real_escape_string($_POST['title'])));
	 if ( $duplicate_user > 0 ){
			 $_SESSION['warning']="News Title Already Exist";
		}else{
		$da=strtotime($_POST['date1']);
	    $d=date("Y-m-d",$da);
       $users_values = array(
					'n_title'	=> $_POST['title'],
					'n_date'	=> $d,
					'n_status'	=> "1",
					'n_description'	=> $_POST['elm1']);
					$db->insert(NEWS, $users_values);
				$_SESSION['suss']="News Added Successfully";	
      }


 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>News Add || Sreekara Green City Developers</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once("includes/header.php"); ?>
 <?php include_once("includes/editor.php"); ?>
<?php include_once("includes/datepicker.php"); ?>

</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" class="bg"><table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="181" align="left" valign="top" class="hadderbg12">
		
		
            
			  <?php include_once("includes/menu.php"); ?>
 
           
		</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:15px;">
		
		<?php include_once("errormessage.php"); ?>
		<div id="box" class="test">
                	<h3 id="adduser"><a href="news_list.php" style="color:#FFFFFF; text-decoration:underline;">News List</a> >> Add News</h3>
                    
                    <form name="colorname" id="form" action="" method="post"  onsubmit="return validate()" enctype="multipart/form-data">
                      <fieldset id="personal">
                        <legend>Enter News Details</legend>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="form_table">
                        <tr class="form_bg">
                        <td align="right"><label>News Title:<span style="color:#FF0000">*</span></label></td>
                        <td align="left"><input type="text" id="title" name="title"  style="width:200px"/>
                        </td>
                      </tr>
					    <tr class="form_bg">
                        <td align="right"><label>Date:</label></td>
                        <td><input type="text" id="date" name="date1" size="10" class="dpDate" value="<?php echo date("m/d/Y"); ?>"/></td>
                      </tr>
					   <tr class="form_bg">
                        <td align="right"  style="vertical-align:top; padding:5px"><label>Description:</label></td>
                        <td align="left" id="texteditor" style="padding:5px">
						
				<?php
							$oFCKeditor = new FCKeditor('elm1', '750', '550') ;
							$oFCKeditor->BasePath	= 'fckeditor/' ;
							$oFCKeditor->Value		=  '';
							$oFCKeditor->Create() ; 
			    		?>
						
						
						
						
						
						
                        </td>
                      </tr>
					  
					   
					  
					  
                      <tr class="form_bg">
                        <td align="center"><center>
                        </center></td>
                        <td height="20" align="center">
						<input type="submit" name="submit" id="submit" value="Add" />
                        <input id="button2" type="reset" />
						</td>
                      </tr>
                    </table>
                      </fieldset>
                    </form>
                </div>
				</td>
      </tr>
    
    </table></td>
  </tr>
  <?php include_once("includes/footer.php"); ?>
</table>
</body>
</html>
<script language="javascript">
function validate(){
	var d = document.colorname;

	if(d.title.value == ""){
		alert("News is required");
		d.title.focus();
		return false;
	}	
	
 return true;
}
</script>
