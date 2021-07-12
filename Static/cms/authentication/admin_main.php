<?php require_once('../../Connections/pamconnection.php'); 
	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:login.php");
	}
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" src="../js/bbcode.js"></script>
<script language="JavaScript" src="../js/validate.js"></script>
<script language="JavaScript" src="../js/message.js"></script>
<script language="javascript" src="../js/menuAtNews.js"></script>

<title>Admin Main Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style17 {
	font-size: 14px;
	font-weight: bold;
	color: #FFFFFF;
	font-family: Verdana;
}
.style3 {font-size: 10px;
	font-family: Verdana;
}
.style21 {font-size: 10px; font-family: Arial; font-weight: bold; }
-->
</style>
<script language="javascript">
function errorCheck()
{
	if(ProductPostForm.product_name.value=="")
	{
		alert("Please enter product name for product.");
		ProductPostForm.product_name.focus();
		return false;
	}
	return true;
}
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
<table width="799" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
	<div align="left">
          <div id="title">
            <div id="titlename"><span class="white_title">ADMIN MAIN PAGE</span></div>
            <div class="shadow"></div>
        </div>	
	</div></td>
  </tr>
  <tr>
      <td align="left" valign="top"></td>
    <td rowspan="4" align="left" valign="top">
<!--main category -->	
<table width="630" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
        <tr>
          <td width="636" height="244" align="left" valign="top">
			<form name="form1" method="post" enctype="multipart/form-data" action="">
            <table width="100%" height="244" border="0" cellspacing="0" cellpadding="0">			
              <tr>
                <td class="main_title" align="center"><b>WELCOME TO CONTENT MANAGEMENT SYSTEM </b></td>
              </tr>
            </table>
          </form>
              <h2 class="content"><span class="style3"><br>
            </span></h2></td>
        </tr>
        <tr>
          <td height="45" valign="bottom" class="style3">
			<div align="center">
              <table width="100%"  border="0" class="greybg">
                <tr>
                  <td height="26"><div align="center" class="style3">&copy;Copyright of WebAndYou<br>
                      contact web and you <a href="mailto:support@webnyou.com">project administrator </a>for further assistance. </div></td>
                </tr>
              </table>
          	</div>
		  </td>
        </tr>
    </table></td>
  </tr>
</table>		
		<!--third category chck--></td>
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
<div id="Layer1" style="position:absolute; width:200px; height:115px; z-index:1; left: 757px; top: 5px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
