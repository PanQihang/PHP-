function toggle(targetid)
{
	if(document.getElementById)
	{
		targetid=document.getElementById(targetid)
		if(targetid.style.display=="block")
		{
			targetid.style.display="none";
		}
		else
		{
			targetid.style.display="block";
		}
	}
}