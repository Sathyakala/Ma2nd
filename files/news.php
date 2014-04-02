<?php
require_once("includes/common.inc.php"); 
$page=basename(__FILE__);
?>
	<div class="newsevents">
				<div class="newstop"><h4>News &amp; Events</h4></div>
				<div class="newsbottom">
				<?php 
					$news = $db->getRows("select * from news where n_status='1' order by n_id desc limit 2");
					foreach ($news as $val) {
				?>
					<h6><?php echo $val['n_title'];?></h6>
					<h5><?php echo $val['n_date'];?></h5>
					<p><?php $str =  $val['n_description']; $text = substr($str,0,145); echo $text;?></p>
					<h5 style="text-align:right;"><a href="view_news.php?id=<?php echo $val['n_id'];?>">View Detail</a></h5>
				<? } ?>
	<div style="height:26px;"></div>
	</div>