<?php require_once("includes/common.inc.php");  $page=basename(__FILE__); ?>
<div class="propertyfinder">
	<div class="protop">
		<h4>Property Finder</h4>			
	</div>
	<form name="search_form" method="get" action="view_search.php" enctype="multipart/form-data">
		<div class="propertysec">
			<div><label>City</label>
				<select name="city">
					<option>--Select City--</option>
					<?php 
						$citys = $db->getRows("select * from citys where status='1'");
						foreach ($citys as $name) {
					?>
					<option value="<?php echo $name['id'];?>"><?php echo $name['citys'];?></option>
					<? } ?>
				</select>
			</div>
			<div><label>Search By</label>
				<select name="purpose">	
					<option value="" selected="selected" >- - Select Purpose - -</option>
					<option value="Residential">Residential</option>
					<option value="Commercial">Commercial</option>
					<option value="Industrial">Industrial</option>
					<option value="Agriculture">Agriculture</option>					
				</select>
			</div>
			<div><label>Mobile</label><input type="text" value="" name="mobile" /></div>
			<div><label>Address</label><input type="text" value=""  name="address"/></div>
			<div style="height:63px;"><label></label><input type="submit" value="Search" class="searchbt"  onclick="return valid_sear();"/></div>
		</div>
	</form>
</div>
<script language="javascript">
function valid_sear()
{
	if(document.search_form.city.value=="") {
	alert("Please Select City...!");
	document.search_form.city.focus();
	return false;
	}
	
	if(document.search_form.purpose.value=="") {
	alert("Please Select Purpose...!");
	document.search_form.purpose.focus();
	return false;
	}
}
</script>
