<?php
require("config.php");
require("./lang/lang." . LANGUAGE_CODE . ".php");
require("functions.php");


# testing whether var set necessary to suppress notices when E_NOTICES on
$month = 
	(isset($_GET['month'])) ? (int) $_GET['month'] : null;
$year =
	(isset($_GET['year'])) ? (int) $_GET['year'] : null;

# set month and year to present if month 
# and year not received from query string
$m = (!$month) ? date("n") : $month;
$y = (!$year)  ? date("Y") : $year;

$scrollarrows = scrollArrows($m, $y);
$auth 		  = auth();

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" src="../js/bbcode.js"></script>
<script language="JavaScript" src="../js/validate.js"></script>
<script language="JavaScript" src="../js/message.js"></script>
<script language="javascript" src="../js/menuAtNews.js"></script>

<title>CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<script language="javascript">
function check()
{
	if(form1.maincatname.value=="")
	{
		alert("Please enter main category.");
		form1.maincatname.focus();
		return false;
	}
	return true;
}

function chkAll(frm, arr, mark)
{
  for (i = 0; i <= frm.elements.length; i++)
  {
   try
   {
     if(frm.elements[i].name == arr)
	 {
       frm.elements[i].checked = mark;
     }
   } catch(er) {}
  }
}

</script>

<script language="javascript">
function findItem(n, d)
{
	var p,x,i;
	if(!d) d=document;
	if((p=n.indexOf("?"))>0&&parent.frames.length)
	{
		d=parent.frames[n.substring(p+1)].document;
		n=n.substring(0,p);
	}
	if(!(x=d[n])&&d.all)
		x=d.all[n];
	for (i=0;!x&&i<d.forms.length;i++)
		x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++)
		x=findItem(n,d.layers[i].document);
	return x;
}
</script>

</head>

<body><img src="../images/cmservice.jpg" width="800" height="50">
<table width="799" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
	<div align="left">
          <div id="title">
            <div class="white_title" id="titlename">SECTION</div>
            <div class="shadow"></div>
        </div>	
	</div></td>
  </tr>
  <tr>
      <td align="left" valign="top"></td>
    <td rowspan="4" align="left" valign="top">
<table width="630" border="1" cellspacing="0" cellpadding="0">
<tr>
<td height="288" align="left" valign="top"><table width="630" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">
      <table width="100%" align="left" cellpadding="2"  cellspacing="2" border="0">
          <tr>
            <td height="32" align="center" valign="middle" bgcolor="#CCCCCC" class="main_title">CALENDAR</td>
          </tr>
    </table></td>
  </tr>

  <tr>
    <td>
    <table width="100%" align="left" cellpadding="12"  cellspacing="0" border="0">
          <tr>
            <td>
					<?php
                    require("./templates/" . TEMPLATE_NAME . ".php");
                    ?>
		</td>
          </tr>
    </table>
    </td>
  </tr>
</table></td>
</tr>
<tr>
  <td valign="bottom" class="style3" colspan="2">
	  <table width="100%"  border="0" class="greybg">
		<tr>
		  <td height="26"><div align="center" class="style3">&copy;Copyright of WebAndYou<br>
			  contact web and you <a href="mailto:support@webnyou.com">project administrator </a>for further assistance. </div></td>
		</tr>
	  </table>
  </td>
</tr>
</table>		
		<!--third category chck-->
	</td>
  </tr>
  <tr>
    <td width="169" align="left" valign="top"> </td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<!--menu-->
	<?php include("../menu.php");?>
	<!--menu-->		
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; width:200px; height:42px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
