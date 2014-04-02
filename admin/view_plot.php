<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");

/*Icons (activate,deactivate,delect) excuting queries */
if ($_POST["keyword"] == "del"){
	$id=$_POST['del_id'];
	$select=$db->query("select * from ".PLOT." where id=$id");
    if(mysql_num_rows($select) > 0)
	{
     $delete=$db->query("Delete from ".PLOT." where id=$id");
		if($delete==TRUE)
		{
		$_SESSION['suss'] ="Delete successfully";
		}else{
		$_SESSION['error'] ="Not Deleted successfully";
		}
	}else{
	$_SESSION['msg'] ="Doesnt exist";
	}
 }else if($_POST["keyword"] == "act"){
  $id=$_POST['del_id']; 
  $update = $db->query("update ".PLOT." set status=0 where id=$id");
  $_SESSION['suss'] = "Status changed successfully ..";
 
 }else if($_POST["keyword"] == "dact"){
  $id=$_POST['del_id'];
  $update = $db->query("update ".PLOT." set status=1 where id=$id");
  $_SESSION['suss'] = "Status changed successfully .."; 
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
					   if($action=="delete")
					   {
					    $delete =$db->query("Delete from ".PLOT." where id=$val");
					    $_SESSION['suss'] = "Successfully deleted..";
					   }
						 if($action=="activate")
					   {
					    $update = $db->query("update ".PLOT." set status=1 where id=$val");
					    $_SESSION['suss'] = "Status changed successfully ..";
					   }
						 if($action=="deactivevate")
					   {
					   $update = $db->query("update ".PLOT." set status=0 where id=$val");
					   $_SESSION['suss'] = "Status changed successfully ..";
					   } 
					}
			   }
		 }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/lightbox.php"); ?>
 <?php include_once("includes/checkbox.php"); ?>

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
                	<h3>Plots List</h3>
		<form name="myFrm" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="keyword"  />
		<input type="hidden" name="del_id"  />   
        <?php 
		$paging=new paging(20,1);
	    $sql_select="select * from ".PLOT." ".$sql." order by id desc";
		$paging->query($sql_select);
		$page=$paging->print_info();
		
		if($page['total'] >0){
	    ?>            
     <table width="100%">
    <thead>
    	<tr>
           <th width="15px"><input type="checkbox" name="chkall" id="chkall"  class="noborder" value="1" /></th>
           <th width="20px"><a href="javascript:void(0)">ID<img src="images/arrow_dows_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
           <th width="350px"><a href="javascript:void(0)">Plot Title</a></th>
           <!--<th width="300px"><a href="javascript:void(0)">Last Name</a></th>-->
           <th width="300px"><a href="javascript:void(0)">Plot Number</a></th>		  
           <th width="300px"><a href="javascript:void(0)">Plot Area</a></th>		   
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
        	<td><input type="checkbox" name="chk[]" value="<?php echo $value['id']; ?>" class="noborder chk" /></td>
			 <td><?php echo $m; ?></td>
            <td><?php echo ucfirst($value['title']); ?></td>
            <!--<td><?php //echo ucfirst($value['last_name']); ?></td>-->			
            <td><?php echo ucfirst($value['plot_number']); ?></td>			
            <td><?php echo ucfirst($value['area']); ?></td>			
 

            <td> <?php if($value['status']==1){ ?><a href="javascript: del(<?php echo $value['id']; ?>,'act');" title="Change status to inactive" class="ask vtip"><img src="images/active.jpg" alt="Status" title="" border="0" /></a><?php }else{ ?><a href="javascript: del(<?php echo $value['id']; ?>,'dact');" title="Change status to active" class="ask vtip"><img src="images/inactive.jpg" alt="Status" title="" border="0" /></a><?php } ?>&nbsp;&nbsp;<a href="plot_edit.php?id=<?php echo $value['id']; ?>" title="Edit News" class="vtip"><img src="images/user_edit.png" alt="Edit" title="" border="0" /></a>&nbsp;&nbsp;<a href="javascript: del(<?php echo $value['id']; ?>,'del');" class="ask vtip" title="Delete news"><img src="images/trash.png" alt="Delete" title="" border="0" /></a></td>
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
						   <option value="deactivevate">Deactivevate</option>
						   <option value="delete">Delete</option>
						   </select></td></tr>
	 <tr><td colspan="12"><div class="pagination"><?php echo $paging->print_link();?></div></td></tr>
    </tfoot>
    </tbody>
</table>     
   
     
  
		
		<?php }else{ ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td align="center" class="errortext"><strong>No Plots Details Found.</strong></td>
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