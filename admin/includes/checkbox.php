<script type="text/javascript">
	/*check all radio buttons and uncheck jquery validations*/
	$(document).ready(function(){
		$("#chkall").click(function() {
		if($(this).attr("checked")) {
			$(".chk").attr("checked","checked");
		}
		else{
			$(".chk").removeAttr("checked");
		}
		});	
		$(".checkall").click(function(event) {
		event.preventDefault();
			$(".chk").attr("checked","checked");
		});
		$(".checknone").click(function(event) {
		event.preventDefault();
			$(".chk").removeAttr("checked");
		});	
	});
</script>
<script type="text/javascript" language="javascript" >
function del(id,stu)
{
	
	var frm = document.myFrm;
	if(stu=='del'){
	frm.keyword.value = "del";
	}else if(stu=='act'){
	frm.keyword.value = "act";
	}else if(stu=='dact'){
	frm.keyword.value = "dact";
	}
	frm.del_id.value=id;
	frm.action = "";
	frm.submit();
	
}
function chkaction()
{
	if(confirm("Are you sure you want to do this action?"))
	{
	var frm = document.myFrm;
	frm.keyword.value = "chackact";
	frm.action = "";
	frm.submit();
	}
}
</script>