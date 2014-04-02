// JavaScript Document
function fnchgStatus(frm,id)
{
	if(confirm("Are you sure to change the status?"))
	{	
		frm.hAct.value = 'chgStatus';
		frm.hideid.value = id;
		frm.submit();
	}
}

function confirmstatus()
{
	if(confirm("Are you sure to change the status?"))
	{	
		return true;
	}else
	{
		return false;	
	}
}

function fnDeleteUser(frm,id)
{
	if(confirm("Are you Sure to delete this Record"))
	{
		frm.hAct.value = 'DeleteUser';
		frm.hideid.value = id;
		frm.submit();
	}
	else
		return;
}

function confirmdel(frm,id)
{
	if(confirm("Are you Sure to delete this Record"))
	{
		return true;
	}
	else
		return false;
}