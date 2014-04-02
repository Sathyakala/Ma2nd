<?php 
require_once("../includes/common.inc.php"); $page=basename(__FILE__);
include_once("sessionchk.php");
$uid=$_GET['userid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <?php include_once("includes/header.php"); ?>
 <?php include_once("includes/lightbox.php"); ?>
 <?php include_once("includes/checkbox.php"); ?>
</script>
<script src="scripts/round.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/leftpanel/jquery.min.js"></script>
<script type="text/javascript" src="scripts/leftpanel/ddaccordion.js"></script>
<script type="text/javascript" src="scripts/leftpanel/head_script.js"></script>
<script type="text/javascript">
DD_roundies.addRule('.login_bg', '10px 10px 10px 10px', true);
DD_roundies.addRule('.button', '5px', true);
DD_roundies.addRule('.left_panel', '5px', true);
DD_roundies.addRule('.right_cornerbg', '5px', true);
</script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script src="scripts/round.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/leftpanel/jquery.min.js"></script>
<script type="text/javascript" src="scripts/leftpanel/ddaccordion.js"></script>
<script type="text/javascript" src="scripts/leftpanel/head_script.js"></script>
<script type="text/javascript">
DD_roundies.addRule('.login_bg', '10px 10px 10px 10px', true);
DD_roundies.addRule('.button', '5px', true);
DD_roundies.addRule('.left_panel', '5px', true);
DD_roundies.addRule('.right_cornerbg', '5px', true);
</script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
		var swfu; 

		window.onload = function() {
			var settings = {
				flash_url : "swfupload/swfupload.swf",
				upload_url: "add_images.php?id=<?php echo $_REQUEST['f_id'];?>&uid=<?php echo $uid;?>",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				file_post_name: "walimage",
				file_size_limit : "1024 MB",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 500,
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: "images/TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont">Upload Images</span>',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	// Queue plugin event
				
			};

			swfu = new SWFUpload(settings);
	     };
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
		<h3>Add Gallery</h3>
			 <table width="99%" border="0">
		          <tr>
        		    <td height="25" colspan="2" class="green1_g_18">Upload More images</td>
		          </tr>
				  <tr>
		            <td colspan="2" class="bluetext">
						<div id="content">
							<form id="form1" action="" method="post" enctype="multipart/form-data">
								<div class="fieldset flash" id="fsUploadProgress">
									<span class="legend">Upload Queue</span><br /><br />
								</div>
								<div id="divStatus">0 Files Uploaded</div><br />
								<div>
									<span id="spanButtonPlaceHolder"></span>
										<input id="btnCancel" type="button" value="Cancel All Uploads" onClick="swfu.cancelQueue();" disabled="disabled" 
											style="margin-left: 2px; font-size: 8pt; height: 29px;" />
								</div>
							</form>
						</div>
					</td>
        		  </tr>
	        </table>   
		</div>
		</td>
      </tr>
    </table></td>
  </tr>
  <?php include_once("includes/footer.php"); ?>
  
</table>
</body>
</html>