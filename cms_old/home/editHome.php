<?php 
require_once('../../Connections/pamconnection.php'); 
session_start();

	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	if($_POST['submit']=='Submit')
	{
	$description=$_POST['description'];
	
	if(mysqli_query($conn, "update home_section set description='$description', date='".date("Y-m-d")."' where id=1"))
	$save='<font color=#336600>Successful</font>';
	else
	$save='<font color=#CC3300>Failed</font>';
}
$selected_query=mysqli_query($conn, "select * from home_section where id=1");
$selected=mysqli_fetch_assoc($selected_query);

include("../field_title.php");

?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" src="../js/bbcode.js"></script>
<script language="JavaScript" src="../js/validate.js"></script>
<script language="JavaScript" src="../js/message.js"></script>
<script language="javascript" src="../js/menuAtNews.js"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="../../tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,emotions,|,print,|,fullscreen",
		theme_advanced_buttons3 : "insertlayer,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,image,cleanup,help",
		theme_advanced_buttons4 : "tablecontrols,|,hr",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		//theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<title>CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {font-size: 10px;
	font-family: Verdana;
}
-->
</style>
<script language="javascript">
function check()
{
	if(form1.name.value=="")
	{
		alert("Please enter title.");
		form1.name.focus();
		return false;
	}
	if(form1.date.value=="")
	{
		alert("Please enter date.");
		form1.date.focus();
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
function jumpMenu(target,selObj,restore){ 
  if (selObj.selectedIndex>0 && selObj.options[selObj.selectedIndex].value != ''){
    window.open(selObj.options[selObj.selectedIndex].value,target);}
  else if(selObj.options[selObj.selectedIndex].value == '')  {selObj.selectedIndex=0;}
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body><img src="../images/cmservice.jpg" width="800" height="50">
<table width="799" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
	<div align="left">
          <div id="title">
            <div id="titlename"><span class="white_title"> MAIN HOMEPAGE PANEL</span></div></div>
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
<td height="288" align="left" valign="top">
<table width="100%" align="left" cellpadding="2"  cellspacing="3">
	<form name="form1" method="post" action="editHome.php" enctype="multipart/form-data">
	<tr>
	  <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">EDIT HOME</td>
	</tr>
	<tr>
	  <td colspan="2" align="left" class="main_title">
	<?php echo $save;?>
		</td>
	  </tr>
    
	<tr>
	  <td width="80%" align="center" colspan="2">
	    <textarea name="description" rows="45" cols="95"><?php echo $selected['description']?></textarea>
	    </td>
	  </tr>
    
    
	<tr>
	  <th align="right" class="content">&nbsp;</th>
	  <td class="content">&nbsp;</td>
	  </tr>
	<tr>
	<td align="center" colspan="2">
	<input type="submit" name="submit" value="Submit" onClick="return check();">&nbsp;<input type="reset" name="reset" value=" Reset ">
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	</form> 
</table>
</td>
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
    <td width="169" align="left" valign="top">
	<!--menu-->
	<?php include("../menu.php");?>
	<!--menu-->		
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; width:200px; height:40px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>