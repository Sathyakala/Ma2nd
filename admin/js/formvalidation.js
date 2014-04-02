function confirmstatus()
{
	if (confirm("Are you sure you want to change the status of this record?"))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function confirmdel()
{
	if (confirm("Are you sure you want to delete this record?"))
	{
		return true;
	}
	else
	{
		return false;
	}
}