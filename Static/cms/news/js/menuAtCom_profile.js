// Menu
function kadabra(zap,obj)
{
	if (document.getElementById)
	{
		var abra = document.getElementById(zap).style;
		if (abra.display == "block")
		{
			abra.display = "none"; 
			obj.firstChild.src = "images/menu/menu_close.gif";
		}
		else
		{
			abra.display = "block";	
			obj.firstChild.src = "images/menu/menu_open.gif";
		}
		return false;
	}
	else
	{
	return true;
	}
}
