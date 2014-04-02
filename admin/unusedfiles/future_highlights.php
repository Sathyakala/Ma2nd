<?php
require_once("includes/common.inc.php"); 
$value=$db->getRow("select * from new_sitemanagement where id='21' and status='1'");
$url= basename(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Real Estate </title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script src="js/SpryMenuBar.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
	<div class="main">
    	<div class="nav">
          <div class="nav_left">
					<?php include "logo.php"; ?>
	                  <div class="nav_property"><img src="images/propertyfinder_img.png" /></div>
                    <?php include "search.php"; ?>
            <div class="nav_btm"><img src="images/nav_btm.png" /></div>
          </div>
                <div class="nav_right">
                    <div class="nav_menu">
                    	<?php include "login.php";?>	
                    	<?php include "menus.php";?>
                  </div>
                  
          </div>
                    <div class="nav_flvimg"><img src="images/flv_img.png"  /></div>
                    
      </div>
  <div class="content">
        	<div class="content_left">
            	<?php include "news.php"; ?>
                <div class="content_add">
                <div class="content_news">
                	
                </div>
                </div>
                
            </div>
            <div class="content_right">
            	<div class="content_righttop">
				 </div>               
				 <div class="content_rightbtm">
                	<div class="content_rightbtm1">
                    	<div class="content_rightleft"><img src="images/left_img.png" /></div>
                        <div class="content_rightmid">&nbsp;</div>
                        <div class="content_rightrgt"><img src="images/right_img.png" /></div>
                    </div>
  						<div class="content_rightbtm2"><h2 style="padding-left:10px;"><?php echo $value['title'];?></h2>
							<div style="border:solid 0px #666666; padding-left:70px;">
								<?php
									$sel="select * from projects where status='1'";
									$sel_rel=mysql_query($sel);
								?>
								<table border="0">
									<tr>
									<?php $i=0; while($row=mysql_fetch_array($sel_rel)) {?>
										<td><img src="highlights/thumb/<?php echo $row['banner'];?>" /><br /><dev style="padding-left:60px;"><?php echo $row['title'];?></dev></td>
									<? } $i++;
									if($i%1==0) echo "</tr><tr>"; ?>	
									</tr>
								</table>
							</div>
						<div class="descr_text">   
 								<?php echo $value['description'];?>
                         </div>
                   </div>
                    <div class="content_rightbtm3">
                    	<div class="content_rightbtm3left"><img src="images/btm_left_img.png" /></div>
                        <div class="content_rightbtm3mid">&nbsp;</div>
                        <div class="content_rightbtm3rgt"><img src="images/btm_right.png" /></div>
                    </div>
                </div>
            </div>
              <div style="clear:both;"></div>
        </div>
        		
               <?php include "footer.php"; ?>
    	</div>
        
        

        
        
        
	</div>
<div style="clear:both;"></div>
<script type="text/javascript">
<!--
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
