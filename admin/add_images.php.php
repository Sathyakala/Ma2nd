<?php 
ob_start();
require_once("includes/common.inc.php"); 
include_once("sessionchk.php");
$page=basename(__FILE__);


		if(!empty($_FILES['image']['name']))    
	    {
		while (list ($key,$val) = each($_FILES['image']['name'])) 
		{
		if(!empty($_FILES['image']['name'][$key])){
	    $size = 100;	
		$img_dir = "newfolder/".$_POST['name']."/";
		$img_name = $_FILES['image']['name'][$key];
		$tmp_name = $_FILES['image']['tmp_name'][$key];
		$img_path = $img_dir . $img_name;
		move_uploaded_file($tmp_name, $img_path);

		$image=$img_name;
		
		//chmod($img_dir,0777);
		chmod($img_dir,0777);
		chown($img_dir);
		chgrp($img_dir);
		$users_values = array(
		            'folder_name'	=> $_GET['id'],
					'file_name' => $image,
					'status'	=> '1');
				$db->insert(FILES, $users_values);
			//print_r ($users_values);
					$_SESSION['suss']="Files successfully Added";	
			}		  
		}		
	  }

$getimg=$_GET['imgid'];
if($getimg)
	{
		$del=mysql_query("delete from files_add where id='$getimg'");
	}
?>

<?php
$gid=$_GET['id'];
$folder_name1=mysql_fetch_array(mysql_query("select * from fileupload where id='$gid'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<script language="javascript" type="text/javascript">
//function to redirect to url when user serach based on string
var i=1;
function fn_add_textfields(list1,list,divid,val)
{
	if(!val)
	var val = '';
	var newdiv = document.createElement('div');
	var now = new Date();
	//var timeStamp = now.getYear()+now.getMonth()+now.getDate()+now.getHours()+now.getMinutes()+now.getSeconds();
	for(var y=2;y>=2;y++)
	{
	var timeStamp = 'div'+y;
	if(!document.getElementById(timeStamp))
	break;
	}
	newdiv.id = timeStamp;
var x = '';
x += '<table><tr><td width=14%>Folder Name</td><td><input type="text" name="title[]" value=<?php echo $folder_name1['folder_name'];?>  readonly="readonly()"/></td><td>Upload File</td><td align="left" width="2px"></td><td align="left"><div id="filetypeid"><input type="file" name="image[]" id="previewField[]" value="" onChange="return preview(this)"></div></td><td><a href="javascript: remove_Event(\''+timeStamp+'\',\''+divid+'\');">Remove</a></td></tr></table>';
	newdiv.innerHTML = x;
	var ni = document.getElementById(divid);
	ni.appendChild(newdiv);
	i++;
}
function remove_Event(divid,newid)
{
	 var d = document.getElementById(newid);
  	 var olddiv = document.getElementById(divid);
 	 d.removeChild(olddiv);
	 return ;
}
</script>

<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }

pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color:#FF0000;  }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once("includes/header.php"); ?>
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" class="bg"><table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="181" align="left" valign="top" class="hadderbg12">
		
		
            
			  <?php include_once("includes/menu.php"); //echo getcwd();?>
 
           
		</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:15px;">
		
		<?php include_once("errormessage.php"); ?>
					<?php 
						$id=$_GET['id'];
						$sel=mysql_fetch_array(mysql_query("select * from fileupload where id='$id'"));
					?>
		<div id="box" class="test">
                	<h3 id="adduser"><a href="files_list.php" style="color:#FFFFFF; text-decoration:underline">Folders</a> >> Add Files To >> <?php echo ucfirst($sel['folder_name']); ?> Folder</h3>
                    
                    <form class="cmxform" id="form2" action="" method="post" enctype="multipart/form-data" name="form1">
						<div>
						<table><tr><td width="10%">Folder Name</td>
						<td width="144"><input type="text" name="name" value="<?php echo $sel['folder_name'];?>" readonly="readonly"/></td>
						<td width="98">Upload File<span style="color:#FF0000">*</span></td>
						<td width="219"><div id="filetypeid"><input type="file" name="image[]" id="previewField[]" value="" onChange="return preview(this)"></div></td>
						<td width="326"><a href="javascript:;" onclick="fn_add_textfields('name','image','dirdiv');">Add Another Image</a></td>
						<td width="43" colspan="4"><a href="javascript:void(0)" onclick="window.history.back()">Back</a></td>
						</tr></table>
						</div>
						<div id="dirdiv"></div>
						<div><input type="submit" name="submit" id="submit" value="Add" /></div>      
				   </form>
		   		 <?php
				 	$gid=$_GET['id'];
					$sel="select * from files_add where folder_name='$gid'";
					$rel=mysql_query($sel);
				 ?>
	   		     <h4 style="line-height:10px; padding:10px; margin:0px; color:#990000"></h4>
				</td>
				</tr>
	  
    </table></td>
  </tr>
  <?php include_once("includes/footer.php"); ?>
</table>
</body>
</html>
