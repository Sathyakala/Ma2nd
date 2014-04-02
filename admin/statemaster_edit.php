<?php 
require_once("../includes/common.inc.php"); 
include_once("sessionchk.php");

$page=basename(__FILE__);
if($_POST['submit']=="Update"){

$date=explode('/',$_POST['date']);
        $da=$date[2].'-'.$date[0].'-'.$date[1];

if(count($_POST['lang'])!=''){
	 $box=$_POST['lang'];
	 }else{
	 $box=array();
	 }
	 $lang=implode(",", $box);
	 
   $chg=$db->query("update ".BSA." set 
                            bsa_fname= '".mysql_real_escape_string($_POST['fname'])."',
							bsa_mname= '".mysql_real_escape_string($_POST['mname'])."',
							bsa_lname= '".mysql_real_escape_string($_POST['lname'])."',
							bsa_gender= '".mysql_real_escape_string($_POST['gender'])."',
							bsa_dob= '$da',
							bsa_address1= '".mysql_real_escape_string($_POST['address1'])."',
							bsa_address2= '".mysql_real_escape_string($_POST['address2'])."',
							bsa_country= '".mysql_real_escape_string($_POST['country'])."',
							bsa_state= '".mysql_real_escape_string($_POST['state'])."',
							bsa_city= '".mysql_real_escape_string($_POST['city'])."',
							bsa_native_lang= '".mysql_real_escape_string($_POST['language'])."',
							bsa_speak_lang= '$lang',
							bsa_email= '".mysql_real_escape_string($_POST['email'])."',
							bsa_telephone= '".mysql_real_escape_string($_POST['telephone'])."',
							bsa_mobile= '".mysql_real_escape_string($_POST['mobile'])."',
							bsa_other= '".mysql_real_escape_string($_POST['other'])."',
							bsa_graduation= '".mysql_real_escape_string($_POST['graduation'])."',
							bsa_pg= '".mysql_real_escape_string($_POST['pg'])."',
							bsa_phd= '".mysql_real_escape_string($_POST['phd'])."',
							bsa_totalexp= '".mysql_real_escape_string($_POST['totalexp'])."',
							bsa_current_industry= '".mysql_real_escape_string($_POST['current_industry'])."',
							bsa_transport= '".mysql_real_escape_string($_POST['transport'])."',
							bsa_business= '".mysql_real_escape_string($_POST['business'])."',
							bsa_keyskills= '".mysql_real_escape_string($_POST['keyskills'])."',
							bsa_bank= '".mysql_real_escape_string($_POST['bankname1'])."',
							bsa_account= '".mysql_real_escape_string($_POST['account1'])."',
							bsa_branch= '".mysql_real_escape_string($_POST['branch1'])."',
							bsa_bank2= '".mysql_real_escape_string($_POST['bankname2'])."',
							bsa_account2= '".mysql_real_escape_string($_POST['account2'])."',
							bsa_branch2= '".mysql_real_escape_string($_POST['branch2'])."',
							bsa_fathername= '".mysql_real_escape_string($_POST['fathername'])."',
							bsa_reference= '".mysql_real_escape_string($_POST['reference1'])."',
							bsa_reference2= '".mysql_real_escape_string($_POST['reference2'])."',
							bsa_familyinformation= '".mysql_real_escape_string($_POST['familyinformation'])."',
							bsa_familybusiness= '".mysql_real_escape_string($_POST['familybusiness'])."',
							bsa_feedback= '".mysql_real_escape_string($_POST['feedback'])."',
							bsa_interestof_join= '".mysql_real_escape_string($_POST['interestof_join'])."'  where bsa_id=".$_GET['id']);
   
    if($chg){
	$_SESSION['suss']="Updated Successfully";
	}else{
	$_SESSION['error']="Failed to Updated, Please Try After Some Time";
	}
	}
if($_GET['id']!=''){
$val = $db->getRow('SELECT * FROM '.BSA.' WHERE bsa_id= ?', array($_GET['id']));
 $lang=explode(",",  $val['bsa_speak_lang']);
}else{
header("location:bsa_list.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once("include/script.php"); ?>
 <?php include_once("includes/header.php"); ?>
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
                	<h3 id="adduser">Edit BDA</h3>
                    
                    <form id="form" action="" method="post"  name="form1" onsubmit="return validate();">
                        <div class="boxmidcont">
                        <fieldset id="personal"><legend>Personal Information</legend>
						<p style="padding-left:850px;">
							<a href="javascript:void(0)" onclick="window.history.back();" title="back">Back</a>
						</p>
                              <table width="100%" cellpadding="2" cellspacing="0">
                            	<tr>
                                	<td class="color" width="33%">First Name 
                                    </td>
                                    <td class="color" width="33%">Middle Name
                                    </td>
                                    <td class="color" width="33%">Last Name
                                    </td>
                                </tr>
                                <tr>
                                	<td><input type="text" name="fname" id="fmane" value="<?php echo $val['bsa_fname']; ?>"/>
                                    </td>
                                    <td><input type="text" name="mname" id="mname" value="<?php echo $val['bsa_mname']; ?>"/>
                                    </td>
                                    <td><input type="text" name="lname" id="lname" value="<?php echo $val['bsa_lname']; ?>"/>
                                    </td>
                                </tr>
								
								<tr>
                                	<td class="color">Gender
                                    </td>
                                    <td class="color">Date of Birth
                                    </td>
                                    <td class="color">Native Language
                                    </td>
                                </tr>
                                <tr>
                                	<td><table><tr>
                                	
      										<td>
											<input name="gender" type="radio" value="male" <?php if($val['bsa_gender']=="male"){ ?> checked="checked" <?php } ?>/><label class="color">Male</label>
                                    		</td>
         									<td>
											<input name="gender" type="radio" value="female" <?php if($val['bsa_gender']=="female"){ ?> checked="checked" <?php } ?> />  <label class="color">Female</label>
                                  			</td>
                                	</tr>
									
									</table>
                                    </td>
									<?php $d=explode("-",$val['bsa_dob']); 
						            $s= $d[1].'/'.$d[2].'/'.$d[0];
						            ?>
                                    <td><input type="text" id="date" name="date" size="10" class="dpDate" value="<?php echo $s ?>" />
                                    </td>
                                    <td>
										<select name="language" id="language" style="width:144px">
											 <option value="0">Select language</option>
											  <?php 
											   $sel = $db->getRows("select * from ".LANGUAGE);
											   foreach ($sel as $value){
											  ?>
											  <option value="<?php echo $value['language_id']; ?>"  <?php if($val['bsa_native_lang']==$value['language_id']){ ?> selected="selected" <?php } ?>  >
											  		<?php echo $value['language_name']; ?>
												</option>
											  <?php } ?>
										</select>
                                    </td>
                                </tr>
								
								
								
								<tr>
                                	<td class="color">Address1
                                    </td>
                                    <td class="color">Address2
                                    </td>
                                    <td class="color">Country
                                    </td>
                                </tr>
                               <tr>
                                	<td><input type="text" name="address1" id="address1" value="<?php echo $val['bsa_address1']; ?>"/>
                                    </td>
                                    <td><input type="text" name="address2" id="address2" value="<?php echo $val['bsa_address2']; ?>"/>
                                    </td>
                                    <td>
									<select name="country" id="country" style="width:144px" onchange="getVal('gtevalstate_ajax.php',this.value,'state_id'); ">
                          <option value="0">Select Country</option>
                          <?php 
	                      $sel = $db->getRows("select * from ".COUNTRY);
	                      foreach ($sel as $value){
	                      ?>
						  <option value="<?php echo $value['country_id']; ?>" <?php if($val['bsa_country']==$value['country_id']){ ?> selected="selected" <?php } ?>><?php echo ucfirst($value['country_name']); ?></option>
						  <?php } ?>
                          </select>
                                    </td>
                                </tr>
								
							
							<tr>
                                	<td class="color">State
                                    </td>
                                    <td class="color">City
                                    </td>
                                    <td class="color">Zip Code
                                    </td>
                                </tr>
                                <tr>
                                	<td>
									
									<select name="state_id" id="state_id" style="width:144px" onchange="getVal('gtevalcity_ajax.php',this.value,'city_id');">
								<option value="0">Select State</option>
								<?php 
	                       	$sel = $db->query("select * from ".STATE." where country_id=".$val['bsa_country']);
	                      	 while($state=mysql_fetch_array($sel))
						   	{
	                     	 ?>
									<option value="<?php echo $state['state_id']; ?>" <?php if($val['bsa_state']==$state['state_id']){ ?> selected="selected" <?php } ?>><?php echo $state['state_name']; ?></option>
							<?php } ?>	
							
								</select>
									
                                    </td>
                                    <td>
									
									<select name="city" id="city_id">
									<option value="">Select City</option>
									<?php 
	                       	$sel = $db->query("select * from ".CITY." where city_status=1");
	                      	 while($city=mysql_fetch_array($sel))
						   	{
	                     	 ?>
									<option value="<?php echo $city['city_id']; ?>" <?php if($val['bsa_city']==$city['city_id']){ ?> selected="selected" <?php } ?>><?php echo $city['city_name']; ?></option>
							<?php } ?>	
									</select>
									
                                    </td>
                                    <td><input type="text" name="zipcode" id="zipcode" value="<?php echo $val['bsa_zip']; ?>"/>
                                    </td>
                                </tr>
						
						
							<tr>
                                	<td class="color" colspan="3">Languages you Speak</td>
                                  
                                </tr>
                                <tr>
                                	<td colspan="3"><?php 
	                       	$sel = $db->query("select * from new_language where language_status=1");
	                      	 while($row=mysql_fetch_array($sel))
						   	{
	                     	 ?>
							 <div style="float:left">
							 <table><tr><td>
							 <input name="lang[]" type="checkbox" value="<?php echo $row['language_id']; ?>" <?php if(in_array($row['language_id'],$lang)){ ?> checked="checked" <?php } ?> /></td><td><?php echo $row['language_name']; ?></td></tr>                             </table>
							 </div>
							 <?php } ?></td>
                             </tr>	
							
                        </table>
                              
                           
							  
                        </fieldset>
                        <fieldset id="personal"><legend>Contact Information</legend>
                        <table width="100%" cellpadding="2" cellspacing="0">
                            	<tr>
                                	<td width="31%" class="color">Email Id</td>
                               	  <td width="69%"><input type="text" name="email" id="email" value="<?php echo $val['bsa_email']; ?>"/></td>
                              </tr>
                            </table>
                        <table width="100%" cellpadding="2" cellspacing="0">
                            	<tr>
                                	<td width="31%" class="color">Telephone No</td>
                                	<td width="35%" class="color">Mobile No</td>
                                	<td width="34%" class="color">Other(If any)</td>
                              </tr>
                              <tr>
                                	<td><input type="text" name="telephone" id="telephone" value="<?php echo $val['bsa_telephone']; ?>"/></td>
                                	<td><input type="text" name="mobile" id="mobile" value="<?php echo $val['bsa_mobile']; ?>"/></td>
                                	<td><input type="text" name="other" id="other" value="<?php echo $val['bsa_other']; ?>"/></td>
                              </tr>
                            </table> 
                        </fieldset>
                        <fieldset id="personal"><legend>Educational Information</legend>
                        <table width="100%" cellpadding="2" cellspacing="0">
                        	<tr>
                            	<td class="color" width="33%">Basic/Graduation</td>
								<td class="color" width="33%">Post Graduation</td>
								<td class="color" width="33%">Doctorate/Ph.D</td>
                             
                          </tr>
                            <tr>
                            	 <td>
							 <?php
								 	$edu=mysql_query("select * from new_education where type='Basic' order by id");
								 ?>
	                             <select name="graduation" id="graduation">
							 		<option value="" selected="selected">Select Education</option>
								<?php
									while($row_edu=mysql_fetch_array($edu)){						
								?>	
									<option value="<?php echo $row_edu['name'];?>" <?php if($val['bsa_graduation']==$row_edu['name']){ ?> selected="selected" <? } ?>>
										<?php echo $row_edu['name'];?>
									</option>
								<? } ?>
                               </select>
                              </td>
							   <td>
								   <?php
										$edu=mysql_query("select * from new_education where type='Post' order by id");
									 ?>
									 <select name="pg" id="pg">
										<option value="" selected="selected">Select Education</option>
									<?php
										while($row_edu=mysql_fetch_array($edu)){						
									?>	
										<option value="<?php echo $row_edu['name'];?>" <?php if($val['bsa_pg']==$row_edu['name']){ ?> selected="selected" <? } ?>>
												<?php echo $row_edu['name'];?>
										</option>
									<? } ?>
									</select>
                               </td>
							    <td>
                               <?php
								 	$edu=mysql_query("select * from new_education where type='Doctorate' order by id");
								 ?>
	                             <select name="phd" id="phd">
							 		<option value="" selected="selected">Select Education</option>
								<?php
									while($row_edu=mysql_fetch_array($edu)){						
								?>	
									<option value="<?php echo $row_edu['name'];?>" <?php if($val['bsa_phd']==$row_edu['name']) {?> selected="selected" <? } ?>><?php echo $row_edu['name'];?></option>
								<? } ?>
                              </td>
                            </tr>
                           
                        </table>  
                        </fieldset>
                        <fieldset id="personal"><legend>Current Professional Information</legend>
                        <table width="100%" cellpadding="2" cellspacing="0">
                        	<tr>
                            	<td class="color" width="33%">Total Experience</td>
								<td class="color" width="33%">Current Industry</td>
                                <td class="color" width="33%">Transport </td>
                            </tr>
                            <tr>
                            	 <td>
                                	 <select name="totalexp">
                                     <option value="0-1" <?php if($val['bsa_totalexp']=='0-1'){ ?> selected="selected" <?php } ?>>0 - 1</option>
                                   	 <option value="1-2" <?php if($val['bsa_totalexp']=='1-2'){ ?> selected="selected" <?php } ?>>1 - 2</option>
                                      <option value="2-3" <?php if($val['bsa_totalexp']=='2-3'){ ?> selected="selected" <?php } ?>>2 - 3</option>
                                       <option value="3-4" <?php if($val['bsa_totalexp']=='3-4'){ ?> selected="selected" <?php } ?>>3 - 4</option>
                                        <option value="4-5" <?php if($val['bsa_totalexp']=='4-5'){ ?> selected="selected" <?php } ?>>4 - 5</option>
										<option value="5-6" <?php if($val['bsa_totalexp']=='5-6'){ ?> selected="selected" <?php } ?>>5 - 6</option>
										<option value="6-7" <?php if($val['bsa_totalexp']=='6-7'){ ?> selected="selected" <?php } ?>>6 - 7</option>
										<option value="7-8" <?php if($val['bsa_totalexp']=='7-8'){ ?> selected="selected" <?php } ?>>7 - 8</option>
										<option value="8-9" <?php if($val['bsa_totalexp']=='8-9'){ ?> selected="selected" <?php } ?>>8 - 9</option>
										<option value="Above 10" <?php if($val['bsa_totalexp']=='Above 10'){ ?> selected="selected" <?php } ?>>Above 10</option>
                                </select>
                              </td>
                                <td>
							 <select name="current_industry">
							 <option value="Health Care" <?php if($val['bsa_current_industry']=='Health Care'){ ?> selected="selected" <?php } ?>>Health Care</option>
							 <option value="Real Estate" <?php if($val['bsa_current_industry']=='Real Estate'){ ?> selected="selected" <?php } ?>>Real Estate</option>                             </select>
                              </td>
							   <td>
                                	 <input type="text" name="transport" id="transport" value="<?php echo $val['bsa_transport']; ?>"/>
                              </td>
                            </tr>
						    <tr>
                                	<td class="color" width="33%">Business / Employment Details 
                                    </td>
                                    <td class="color" width="33%">Key Skills
                                    </td>
                                    <td class="color" width="33%">&nbsp;
                                    </td>
                                </tr>
								 <tr>
                                	<td> <textarea name="business"><?php echo $val['bsa_business']; ?></textarea>
                                    </td>
                                    <td> <textarea name="keyskills"><?php echo $val['bsa_keyskills']; ?></textarea>
                                    </td>
                                    <td>&nbsp;
                                    </td>
                                </tr>
                        </table>
                        </fieldset>	
						 </fieldset>
                        <fieldset id="personal"><legend>Bank Details</legend>
                        
                         <table width="100%" cellpadding="2" cellspacing="0">
                            	<tr>
                                	<td class="color" width="33%">Bank Name
                                    </td>
                                    <td class="color" width="33%">Account No
                                    </td>
                                    <td class="color" width="33%">Branch
                                    </td>
                                </tr>
                                 <tr>
                                	<td><input type="text" name="bankname1" id="bankname1" value="<?php echo $val['bsa_bank']; ?>"/>
                                    </td>
                                    <td><input type="text" name="account1" id="account1" value="<?php echo $val['bsa_account']; ?>"/>
                                    </td>
                                    <td><input type="text" name="branch1" id="branch1" value="<?php echo $val['bsa_branch']; ?>"/>
                                    </td>
                                </tr>
								 <tr>
                                	<td><input type="text" name="bankname2" id="bankname2" value="<?php echo $val['bsa_bank2']; ?>"/>
                                    </td>
                                    <td><input type="text" name="account2" id="account2" value="<?php echo $val['bsa_account2']; ?>"/>
                                    </td>
                                    <td><input type="text" name="branch2" id="branch2" value="<?php echo $val['bsa_branch2']; ?>"/>
                                    </td>
                                </tr>
						</table>
                        </fieldset>
						<fieldset id="personal"><legend>Family Back Ground</legend>
                        
                         <table width="100%" cellpadding="2" cellspacing="0">
                            	<tr>
                                	<td class="color" width="33%">Father Name
                                    </td>
                                    <td class="color" width="33%">Reference1
                                    </td>
                                    <td class="color" width="33%">Reference2
                                    </td>
                                </tr>
                            <tr>
                                	<td><input type="text" name="fathername" id="fathername" value="<?php echo $val['bsa_fathername']; ?>"/>
                                    </td>
                                    <td><input type="text" name="reference1" id="reference1" value="<?php echo $val['bsa_reference']; ?>"/>
                                    </td>
                                    <td><input type="text" name="reference2" id="reference2" value="<?php echo $val['bsa_reference2']; ?>"/>
                                    </td>
                                </tr>
								 
								 <tr>
                                	<td class="color" width="33%">Family Information
                                    </td>
                                    <td class="color" width="33%">Family Business Information
                                    </td>
                                    <td class="color" width="33%">&nbsp;
                                    </td>
                                </tr>
								 
								 <tr>
                                	<td> <textarea  name="familyinformation" id="familyinformation"><?php echo $val['bsa_familyinformation']; ?></textarea>
                                    </td>
                                    <td> <textarea name="familybusiness" id="familybusiness"><?php echo $val['bsa_familybusiness']; ?></textarea>
                                    </td>
                                    <td>&nbsp;
                                    </td>
                                </tr>
						</table>
                        </fieldset>
					    <fieldset id="personal"><legend>About Green Globe Generation
                        </legend>
                        <table width="100%" cellpadding="2" cellspacing="0">
                        	<tr>
                            	<td width="31%" class="color">Feedback</td>
                            	<td width="69%"><textarea  name="feedback" ><?php echo $val['bsa_feedback']; ?></textarea></td>
                        	</tr>
                            <tr>
                            	<td class="color">Your Interest of Joining *</td><td><textarea name="interestof_join" id="interestof_join" ><?php echo $val['bsa_interestof_join']; ?></textarea></td>
                            </tr>
                        </table>
                        </fieldset>
                        <table width="100%" cellpadding="2" cellspacing="0">
                        	<tr>
                            	<td><input type="submit" name="submit" id="submit" value="Update" />
                        	
						</td>
                            </tr>
                        </table>
                       </div>
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
function getVal(url,id,divid)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(divid).innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET", url+"?id="+id,true);
xmlhttp.send();
}
</script>

<script language="javascript">
function validateEmailv2(email){
// a very simple email validation checking. 
// you can add more complex email checking if it helps 
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
	return false;}
	
	
function validate(){
	var d = document.form1;
	if(d.fname.value == ""){
		alert("First name is required");
		d.fname.focus();
		return false;
	}	

	
	
	if(d.address1.value == ""){
		alert("Address1 is required");
		d.address1.focus();
		return false;
	}	
	if(d.address2.value == ""){
		alert("Address2 is required");
		d.address2.focus();
		return false;
	}	
	
		if(d.country.value == ""){
		alert("Country name is required");
		d.country.focus();
		return false;
	}	
	if(d.state_id.value == "0"){
		alert("State name is required");
		d.state_id.focus();
		return false;
	}	
	if(d.city.value == ""){
		alert("City name is required");
		d.city.focus();
		return false;
	}
	if(d.zip.value == ""){
		alert("Zip Code is required");
		d.zip.focus();
		return false;
	}
	
	
	if(d.email.value == ""){
		alert("Email is required");
		d.email.focus();
		return false;
	}
	
	if(d.email.value!=""){
		var x=validateEmailv2(d.email.value);
		if(x){}else{alert("Please enter a valid email ID");d.email.focus();return false;}
	}
	
	
	if(d.telephone.value == ""){
		alert("Telephone No is required");
		d.telephone.focus();
		return false;
	}	
	if(d.mobile.value == ""){
		alert("Mobile No is required");
		d.mobile.focus();
		return false;
	}	
 return true;
}

function getVal(url,id,divid)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(divid).innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET", url+"?id="+id,true);
xmlhttp.send();
}

function getVal1(url,id,divid)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(divid).innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET", url+"?id="+id,true);
xmlhttp.send();
}


</script>
