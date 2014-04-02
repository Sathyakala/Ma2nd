<?php 
ob_start();
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");
$page=basename(__FILE__);
$image_id=$_GET['imgid'];
$userid=$_GET['uid'];

if ($_POST["keyword"] == "del"){
	$id=$_POST['del_id'];
	$select=$db->query("select * from ".FILES." where gallery_id=$id");
    if(mysql_num_rows($select) > 0)
	{
     $delete=$db->query("Delete from ".FILES." where gallery_id=$id");
		if($delete==TRUE)
		{
		$_SESSION['suss'] ="Image Deleted successfully";
		}else{
		$_SESSION['error'] ="Not Deleted successfully";
		}
	}else{
	$_SESSION['msg'] ="Doesnt exist";
	}
 }else if($_POST["keyword"] == "act"){
  $id=$_POST['del_id']; 
  $update = $db->query("update ".FILES." set status=0 where gallery_id=$id");
  $_SESSION['suss'] = "Status changed successfully ..";
 
 }else if($_POST["keyword"] == "dact"){
  $id=$_POST['del_id'];
  $update = $db->query("update ".FILES." set status=1 where gallery_id=$id");
  $_SESSION['suss'] = "Status changed successfully .."; 
 }

$gid=$_GET['id'];
$sel=mysql_fetch_array(mysql_query("select * from gallery where gallery_id='$gid'"));
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
x += '<table><tr><td width=27>Title</td><td><input type="text" name="title[]" value=<?php echo $sel['gt_title'];?>></td><td width=100>Upload Image</td><td align="left"><div id="filetypeid"><input type="file" name="image[]" id="previewField[]" value="" onChange="return preview(this)"></div></td><td><a href="javascript: remove_Event(\''+timeStamp+'\',\''+divid+'\');">Remove</a></td></tr></table>';
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
 <?php include_once("includes/lightbox.php"); ?>
 <?php include_once("includes/checkbox.php"); ?>
 <?php include_once("includes/header.php"); ?>
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
</script>

<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" class="bg">
			<table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="181" align="left" valign="top" class="hadderbg12">
		
		
            
			  <?php include_once("includes/menu.php"); ?>
 
           
		</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:15px;">
		
		<?php include_once("errormessage.php"); ?>
		<?php 
					$id=$_GET['id'];
					$val = $db->getRow("select * from priority_futurehome where f_id ='$id'");
					?>
		<div id="box" class="test">
                	<h3 id="adduser"><a href="javascript:void(0)" style="color:#FFFFFF; text-decoration:underline">Galleries</a> >> <?php echo ucfirst($val['f_title']); ?> Images Gallery </h3>
                    
   				      <h4 style="line-height:10px; padding:10px; margin:0px; color:#990000">Gallery Images</h4>
					<?php $id=$_GET['userid'];
					 $selimg=mysql_query("select * from gallery where user_id='$id'");
					 $res = mysql_num_rows($selimg);
					 if(mysql_num_rows($selimg)>0){
					 ?>
					<div class="tc box padded" align="left">
				<form name="myFrm" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="keyword"  />
		<input type="hidden" name="del_id"  />   
					<table>
					<?php
					 $k=1;
					for($i=0;$i<=$res;$i++)
					 {
											
					 echo "<tr>";
					 for($j=0;$j<5;$j++)
					 {
					 $seli=mysql_fetch_assoc($selimg);
																			   
					  if($k<=$res)
					{
					?>
						<td style="vertical-align:top;">&nbsp;
						<div class="tc box padded" align="left">
							<a href="../homeimages/home/<?php echo $seli['images']; ?>" title="<?php echo $val['images']; ?>" rel="lightbox[roadtrip]" >
								<img class="small" src="../homeimages/home/<?php echo $seli['images']; ?>" alt="" width="150" height="150"/>
							</a>
						</div>
						</td>
						<td style="vertical-align:top;">
						<a href="javascript: del(<?php echo $seli['gallery_id'];?>,'del');" class="ask vtip" title="Delete Careers"><img src="images/icon_delete.png" alt="Delete" title="" border="0" /></a>
				</td>
						<?php } $k++; }echo "</tr>";	}?>
						
			       </table>
				   </form>
					</div>
					<?php
					}
					?>
                </div>
				
				</td>
				</tr>
	  
    </table>
  <?php include_once("includes/footer.php"); ?>
</table>
</body>
</html>
<script type="text/javascript">
/***** CUSTOMIZE THESE VARIABLES *****/
  // width to resize large images to
var maxWidth=100;
  // height to resize large images to
var maxHeight=100;
  // valid file types
var fileTypes=["jpg","gif","png","jpeg"];
  // the id of the preview image tag
var outImage="previewField";
  // what to display when the image is not valid
var defaultPic="spacer.gif";
/***** DO NOT EDIT BELOW *****/
function preview(what){
  var source=what.value;
  var ext=source.substring(source.lastIndexOf(".")+1,source.length).toLowerCase();
  // alert(ext);
  for (var i=0; i<fileTypes.length; i++)
  { if (fileTypes[i]==ext){  break; } }
  //globalPic=new Image();
  if (i>=fileTypes.length)
  {
	document.getElementById('filetypeid').innerHTML='<input type="file" name="image" id="previewField" value="" onChange="return preview(this)"/>';
    alert("THAT IS NOT A VALID FILE\nPlease load a file with an extention of one of the following:\n\n"+fileTypes.join(", "));
	return false;
  }
  }
</script>
