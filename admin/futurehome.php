<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");

/*Icons (activate,deactivate,delect) excuting queries */
if ($_POST["keyword"] == "del"){
	$id=$_POST['del_id'];
	$select=$db->query("select * from ".HOME." where f_id=$id");
    if(mysql_num_rows($select) > 0)
	{
     $delete=$db->query("Delete from ".HOME." where f_id=$id");
		if($delete==TRUE)
		{
		$_SESSION['suss'] ="Deleted Successfully";
		}else{
		$_SESSION['error'] ="Not Deleted Successfully";
		}
	}else{
	$_SESSION['msg'] ="Doesnt Exist";
	}
 }else if($_POST["keyword"] == "act"){
  $id=$_POST['del_id']; 
  $update = $db->query("update ".HOME." set f_status=0 where f_id=$id");
  $_SESSION['suss'] = "Status Changed Successfully ..";
 
 }else if($_POST["keyword"] == "dact"){
  $id=$_POST['del_id'];
  $update = $db->query("update ".HOME." set f_status=1 where f_id=$id");
  $_SESSION['suss'] = "Status Changed Successfully .."; 
 }
 
 /*Select Box and radio button Queries run in loop*/
if ($_POST["keyword"] == "chackact")
		 {
		   $box=$_POST['chk'];
	       $action=$_POST['act'];
				if(!empty($box))
				{	
					while (list ($key,$val) = each ($box)) 
					{
					   if($action=="Delete")
					   {
					    $delete =$db->query("Delete from ".HOME." where f_id=$val");
					    $_SESSION['suss'] = "Successfully Deleted..";
					   }
						 if($action=="Activate")
					   {
					    $update = $db->query("update ".HOME." set f_status=1 where f_id=$val");
					    $_SESSION['suss'] = "Status Changed Successfully ..";
					   }
						 if($action=="Deactivate")
					   {
					   $update = $db->query("update ".HOME." set f_status=0 where f_id=$val");
					   $_SESSION['suss'] = "Status Changed Successfully ..";
					   } 
					}
			   }
		 }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Featured Home List || Sreekara Green City Developers</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/lightbox.php"); ?>
 <?php include_once("includes/checkbox.php"); ?>
</script>
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
		
		 <?php include_once("includes/menu.php"); ?>
		
		</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:15px">
		<?php include_once("errormessage.php"); ?>
		<div id="box" class="test">
                	<h3>User List</h3>
		<form name="myFrm" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="keyword"  />
		<input type="hidden" name="del_id"  />   
        <?php 
		$paging=new paging(20,1);
	    $sql_select="select * from ".HOME." ".$sql." order by f_id desc";
		$paging->query($sql_select);
		$page=$paging->print_info();
		
		if($page['total'] >0){
	    ?>            
     <table width="100%">
    <thead>
    	<tr>
           <th width="15px"><input type="checkbox" name="chkall" id="chkall"  class="noborder" value="1" /></th>
           <th width="20px"><a href="javascript:void(0)">ID<img src="images/arrow_dows_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
           <th width="350px"><a href="javascript:void(0)">Title</a></th>
           <!--<th width="300px"><a href="javascript:void(0)">Last Name</a></th>-->
           <th width="300px"><a href="javascript:void(0)">Property Class</a></th>		  
           <th width="300px"><a href="javascript:void(0)">Address</a></th>		   
           <th width="300px"><a href="javascript:void(0)">Purpose</a></th>		   
           <th width="250px"><a href="javascript:void(0)">Gallery</a></th>
           <th width="300px"><a href="javascript:void(0)">Action</a></th>
        </tr>
    </thead>
    <tbody>
	<?php  //While loop start
	$i = $page['start'];
	$m=1;			
	while ($value=$paging->result_assoc()) {	
	if(isset($_REQUEST['page']))
	{
	    $pagenation ="&page=".$_REQUEST['page'];		
	}else
	{
		$pagenation="";
	}													
	?>        
    	<tr>
        	<td><input type="checkbox" name="chk[]" value="<?php echo $value['f_id']; ?>" class="noborder chk" /></td>
			 <td><?php echo $m; ?></td>
            <td><?php echo ucfirst($value['f_title']); ?></td>
            <!--<td><?php //echo ucfirst($value['last_name']); ?></td>-->			
            <td><?php echo ucfirst($value['f_propertyclass']); ?></td>			
            <td><?php echo ucfirst($value['f_address']); ?></td>			
            <td><?php echo ucfirst($value['f_purpose']); ?></td>	
			<td>
				<a href="addimages.php?userid=<?php echo $value['f_id'];?>">Add</a>
					&nbsp; | &nbsp; 
				<?php
					$uid=$value['f_id'];
					$get_img=mysql_query("select * from gallery where user_id='$uid'");
					$get_img_rows=mysql_num_rows($get_img);
					if($get_img_rows > 0) {
				?>
					<a href="viewimages.php?userid=<?php echo $value['f_id'];?>">View</a>
				<? } else {?>
					View
				<? } ?>
				
			</td>			
            <!--<td><?php //echo ucfirst($value['address1']); ?></td>			-->

            <td><a href="featurehomeview.php?id=<?php echo $value['f_id']; ?>" title="View News Detail" rel="facebox" class="vtip"><img src="images/viewicon.gif" alt="View Detail" title="" border="0" /></a>&nbsp;&nbsp;<?php if($value['f_status']==1){ ?><a href="javascript: del(<?php echo $value['f_id']; ?>,'act');" title="Change status to inactive" class="ask vtip"><img src="images/active.jpg" alt="Status" title="" border="0" /></a><?php }else{ ?><a href="javascript: del(<?php echo $value['f_id']; ?>,'dact');" title="Change status to active" class="ask vtip"><img src="images/inactive.jpg" alt="Status" title="" border="0" /></a><?php } ?>&nbsp;&nbsp;<a href="futurehome_edit.php?id=<?php echo $value['f_id']; ?>" title="Edit News" class="vtip"><img src="images/user_edit.png" alt="Edit" title="" border="0" /></a>&nbsp;&nbsp;<a href="javascript: del(<?php echo $value['f_id']; ?>,'del');" class="ask vtip" title="Delete news"><img src="images/trash.png" alt="Delete" title="" border="0" /></a></td>
        </tr>      
        <?php $m++; } ?>
		 <tfoot>
    	<tr>
        <td colspan="12" class="rounded-foot-left">
		<em><?php  echo "Showing Records from $page[start] to $page[end] of $page[total] [Total $page[total_pages] Pages]";  ?></em>
		</td>
        
        </tr>
		
		 <tr>
		 	<td colspan="12"> 
				<a href="javascript:void(0)" class="bt_red checknone" title="Select None">
					<span class="bt_red_lft"></span><strong>None</strong></a> <span class="bt_red_r">&nbsp;|&nbsp;</span>
	 <a href="javascript:void(0)" class="bt_blue checkall" title="Select All"><span class="bt_blue_lft"></span><strong>All</strong><span class="bt_blue_r"></span></a>
       Action:
			                <select name="act" onchange="chkaction()">
						   <option value="">Select Action</option>
						   <option value="activate">Activate</option>
						   <option value="deactivevate">Deactivate</option>
						   <option value="delete">Delete</option>
						   </select></td></tr>
	 <tr><td colspan="12"><div class="pagination"><?php echo $paging->print_link();?></div></td></tr>
    </tfoot>
    </tbody>
</table>     
   
     
  
		
		<?php }else{ ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td align="center" class="errortext"><strong>No User Details Found.</strong></td>
		</tr>
		</table>
		<?php } ?>
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