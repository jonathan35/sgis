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
	if($_FILES['photo1']!='')
		{
			$file_source1 = $HTTP_POST_FILES['photo1']['tmp_name'];
			$type = $HTTP_POST_FILES['photo1']['type']; 
			$file1 = ''; 
			$ext = substr(strrchr($type, "/"), 1);
		
			switch ( $ext )
			{ 
				case 'pjpeg':
					$file1 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpg':
					$file1 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpeg':
					$file1 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'gif':
					$file1 = 'photo/'.uniqid('').'.gif';
					break;
				case 'png':
					$file1 = 'photo/'.uniqid('').'.png';
					break;
			}
			if (( $file1 != '' ) )
			{ 
				if ( move_uploaded_file( $file_source1, $file1 ) ) 
				{} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}
	//upload pdf pdf_file
		if($_FILES['pdf_file']!='')
	{
		$pdf_source = $HTTP_POST_FILES['pdf_file']['tmp_name'];
		$type = $HTTP_POST_FILES['pdf_file']['type']; 
		$ext = substr(strrchr($type, "/"), 1);
		switch ( $ext )
		{ 
			case 'pdf':
				$pdf = 'pdf_files/'.uniqid('').'.pdf';
				break;
			case 'vnd.ms-excel': 
				$pdf = 'pdf_files/'.uniqid('').'.xls';
				break; 
			case 'msword': 
				$pdf = 'pdf_files/'.uniqid('').'.doc';
				break; 				 
		}
		if (( $pdf != '' ) )
		{ 
			if ( move_uploaded_file( $pdf_source, $pdf ) ) 
			{} 
			else 
			{echo 'File could not be uploaded to server.<BR>';} 
		}
	}

	$description=$_POST['description'];
	$description = str_replace ("'","&#39;",$description);
	$description = str_replace ("<br>","", $description);		
	$description = str_replace ("\\","", $description);	
	$description = str_replace ("'","\'", $description);	

if(mysqli_query($conn, "insert into events_02 (id, name, image1, pdf_file, weblink, type, description, date) 
values ('', '".$_POST['name']."', '$file1', '$pdf', '".$_POST['weblink']."', '$newstype', '$description', '".$_POST['date']."')"))
$save='<font color=#336600>Successful</font>';
	else
$save='<font color=#CC3300>Failed</font>';
}
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" src="js/bbcode.js"></script>
<script language="JavaScript" src="js/validate.js"></script>
<script language="JavaScript" src="js/message.js"></script>
<script language="javascript" src="js/menuAtNews.js"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
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
<title>Welcome to WebAndYou CMS</title>
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
            <div id="titlename"><span class="white_title">NEWS</span></div>
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
	<form name="form1" method="post" action="postNews.php" enctype="multipart/form-data">
	<tr>
	  <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">ADD NEW </td>
	</tr>
	<tr><td><span class="red">* Required Fields</span></td></tr>
	<tr>
	  <td colspan="2" align="left" class="main_title">
	<?php echo $save;?>
		</td>
	  </tr>
	<tr valign="top">
		<th align="right" bgcolor="#EFEFEF" class="main_title"><strong>Image :  </strong><br>
				  <span class="content"> (recommended image size<br> 
				  <span class="red">480 x 360 pixels </span> )</th>
		<td align="left" class="content">Photo 1<br>
		<img name="thisImage1" id="thisImage1" src="../images/no_photo.gif" width="80" height="60"><br>
		<input name="photo1" type="file" class="content" onChange="javascript:findItem('thisImage1').src = findItem('photo1').value;">
	</td>
	</tr>	  
	  	<tr>
		<th width="26%" align="right" bgcolor="#EFEFEF" class="content"><span class="red">*</span>Title :</th>
		<td><input name="name" type="text" id="name"></td>
	</tr>
	<tr>
	  <th align="right" bgcolor="#EFEFEF" class="content">Upload Attachment : </th>
	  <td><input name="pdf_file" type="file" id="pdf_file"></td>
	  </tr>
	  <tr>
	  <th align="right" bgcolor="#EFEFEF" class="content">Hyperlink :<br>
	    <span class="red"> http://www.abcde.com </span></th>
	  <td class="content"><input name="weblink" type="text" id="weblink" value="http://www."></td>
	  </tr>
      <tr>
	  <th align="right" bgcolor="#EFEFEF" class="content"><span class="red">*</span> Date :<br>
	     <span class="red">Date Format: YYYY-MM-DD</span></th>
	  <td class="content"><input name="date" type="text" id="date" value="<?php echo date("Y-m-d");?>"></td>
	  </tr>
	<tr>
		<th align="right" bgcolor="#EFEFEF" class="content" valign="top">Description :&nbsp;</th>
		<td align="left">
		<textarea name="description" rows="15" cols="50"></textarea>
		</td>
	</tr>
	<tr>
	  <th align="right" class="content">&nbsp;</th>
	  <td class="content">&nbsp;</td>
	  </tr>
	<tr>
	<td>&nbsp;</td>
	<td align="left">
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
<div id="Layer1" style="position:absolute; width:200px; height:115px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>