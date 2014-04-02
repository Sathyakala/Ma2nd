<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Site Content List || Comspark Investment</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/lightbox.php"); ?>
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

		
		<div id="box" class="test">
                	<h3>Site Content Master</h3>
                			 <?php 
		$paging=new paging(15,2);
	    $sql_select="select * from ".SITECONTENT;
		$paging->query($sql_select);
		$page=$paging->print_info();
		if($page['total'] >0){
	    ?>   
                	<table width="99%">
						<thead>
							<tr>
                            	<th width="20px"><a href="javascript:void(0)">ID</a></th>
                            	<th width="120px"><a href="javascript:void(0)">Page Title</a></th>
                                <th width="320px"><a href="javascript:void(0)">Description</a></th>
                                <th width="30px"><a href="javascript:void(0)">Action</a></th>
                            </tr>
						</thead>
						<tbody>
						<?php  //While loop start
						$i = $page['start'];
						$m=1;			
						while ($value=$paging->result_assoc()) {	
						if(isset($_REQUEST['page'])){$pagenation ="&page=".$_REQUEST['page'];}else{$pagenation="";}											
						?>        
							<tr>
                            	<td class="a-center" align="center"><?php echo $m; ?></td>
                            	<td><?php echo ucfirst($value['title']); ?>&nbsp;
								</td>
								<td><?php echo html2text(ucfirst(substr(stripslashes($value['description']),0,150))); ?>&nbsp;</td>
                                <td>	
								<a href="sitecontentpreview.php?id=<?php echo $value['id']; ?>" title="View Detail" rel="facebox" class="vtip">
									<img src="images/viewicon.gif" alt="View Detail" title="" border="0" />
								</a>&nbsp;&nbsp;					
								<a href="sitecontent_edit.php?id=<?php echo $value['id']; ?>" title="Edit <?php echo ucfirst($value['title']); ?>" class="vtip">
									<img src="images/user_edit.png" alt="Edit" title="" border="0" />
								</a>
								</td>
                            </tr>
							 <?php $m++; } ?>
							</tbody>
					</table>
		<?php }else{ ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td align="center" class="errortext"><strong>No Site content found.</strong></td>
		</tr>
		</table>
		<?php } ?>  
                </div>
		</td>
      </tr>
    </table></td>
  </tr>
  <?php include_once("includes/footer.php"); ?>
</table>
</body>
</html>
