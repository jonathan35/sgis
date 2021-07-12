// JavaScript Document
	function bookMarkPage()
	{
		if( window.sidebar && window.sidebar.addPanel )
		{
			//Gecko (Netscape 6 etc.) - add to Sidebar
			window.sidebar.addPanel( this.title, this.href, '' );
		}
		else if( window.external && navigator.platform == 'Win32' )
		{
			//IE Win32 - checking for AddFavorite produces errors for no good
			//reason, so I use a platform detect.
			//adds the current page page as a favourite; if this is unwanted,
			//simply write the desired page in here instead of 'location.href'
			window.external.AddFavorite( location.href, document.title );
		}
		else if( window.opera && window.print )
		{
			//Opera 6+ - add as sidebar panel to Hotlist
			return true;
		}
		else if( document.layers )
		{
			//NS4 & Escape - tell them how to add a bookmark quickly (adds current page, not target page)
			window.alert( 'Please click OK then press Ctrl+D to create a bookmark' );
		}
		else
		{
			//other browsers - tell them to add a bookmark (adds current page, not target page)
			window.alert( 'Please use your browser\'s bookmarking facility to create a bookmark' );
		}
		return false;
	}
function printWindow()
{
	bV = parseInt(navigator.appVersion);
	if (bV >= 4) window.print();
}
function openWin_newitem(comid, newsid) 
{
	//(page) ? offset = "&start="+page+"&offset=1" : offset = "";
	//openaddress="?comid="+comid+"&newsid=+newsid";
	//return window.open('?comid='+comid+'&newsid='+newsid , '_blank', 'width=620,height=500,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
	return window.open('print_newsitem.php?comid='+comid+'&newsid='+newsid , '_blank', 'width=635,height=680,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
}
function openWin_more(comid) 
{
	//(page) ? offset = "&start="+page+"&offset=1" : offset = "";
	//openaddress="?comid="+comid+"&newsid=+newsid";
	//return window.open('?comid='+comid+'&newsid='+newsid , '_blank', 'width=620,height=500,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
	return window.open('print_news_more.php?comid='+comid , '_blank', 'width=635,height=680,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
}

function openWin_cms(comid) 
{
	alert("helo");
	//(page) ? offset = "&start="+page+"&offset=1" : offset = "";
	//openaddress="?comid="+comid+"&newsid=+newsid";
	//return window.open('?comid='+comid+'&newsid='+newsid , '_blank', 'width=620,height=500,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
	//return window.open('yun.php', '_blank', 'width=635,height=680,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
	return window.open('../news_item/print_news_more.php?comid='+comid , '_blank', 'width=635,height=680,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 

}
function openWin_company_profile(comid) 
{
	//(page) ? offset = "&start="+page+"&offset=1" : offset = "";
	//openaddress="?comid="+comid+"&newsid=+newsid";
	//return window.open('?comid='+comid+'&newsid='+newsid , '_blank', 'width=620,height=500,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
	//return window.open('yun.php', '_blank', 'width=635,height=680,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 
	return window.open('print_company_profile.php?comid='+comid , '_blank', 'width=800,height=680,topbar=0,toolbar=0,location=0,directories=0,status=0,menuBar=0,scrollBars=1,resizable=0' ) ; 

}




