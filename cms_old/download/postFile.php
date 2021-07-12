<?php 
require_once('../../Connections/pamconnection.php'); 
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:login.php");
	}
	if($_POST['submit']==' Submit ')
		{ 
		if($_FILES['filetoupload']!='')
		{
			$pdf_source = $HTTP_POST_FILES['filetoupload']['tmp_name'];
			$type = $HTTP_POST_FILES['filetoupload']['type']; 
			$ext = substr(strrchr($type, "/"), 1);
		
			switch ( $ext )
			{ 
				case 'pdf':
					$file = 'attachment/'.uniqid('').'.pdf';
					break;
			
				case 'vnd.ms-excel': 
					$file = 'attachment/'.uniqid('').'.xls';
					break; 
		
				case 'vnd.openxmlformats-officedocument.spreadsheetml.sheet': 
					$file = 'attachment/'.uniqid('').'.xlsx';
					break; 		
					
				case 'msword': 
					$file = 'attachment/'.uniqid('').'.doc';
					break; 		
										
				case 'vnd.openxmlformats-officedocument.wordprocessingml.document': 
					$file = 'attachment/'.uniqid('').'.docx';
					break; 		
					
					
			}
			if (( $file != '' ) )
			{ 
				if ( move_uploaded_file( $pdf_source, "../../".$file ) ) 
				{} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}
			if(mysqli_query($conn, "INSERT INTO file_upload (file_id, subject, file, title, date) 
			VALUES ('', '".$_POST['subject']."', '".$file."', '".$_POST['title']."', '".$_POST['date']."')"))		
					$success='<font color=#006633>File Uploaded..!!</font>';
				else
					$success='<font color=#FF0000>Fail To Upload File..!!</font>';				
		
		}


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
	if(form1.maincatname.value=="")
	{
		alert("Please enter main category name.");
		form1.maincatname.focus();
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
function category(zap,obj)
{
	if (document.getElementById)
	{
		var abra = document.getElementById(zap).style;
		if (abra.display == "block")
		{
			abra.display = "none";
		}
		else
		{
			abra.display = "block";
		}
		return false;
	}
	else
	{
	return true;
	}
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
<table width="799" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
	<div align="left">
          <div id="title">
            <div id="titlename"></div>
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
<table width="100%" align="left" cellpadding="2"  cellspacing="2">
	<form name="form1" method="post" action="postFile.php" enctype="multipart/form-data" id="form">
	<tr>
	  <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">UPLOAD  FILE </td>
	</tr>
	<tr>
	  <td colspan="2" height="32" class="main_title" align="center" valign="middle"><div align="left" class="red">* Required fields </div></td>
	  </tr>
	<?php if($success!=''){ echo '<tr><td colspan="2" align="center" class="main_title">'.$success.'<br><br></td></tr>';}?>

	<tr>
		<th width="26%" align="right" bgcolor="#EFEFEF" class="content"><p><span class="red">*</span> File Type</p>		  </th>
		<td><input name="subject" type="text" class="content" size="40"></td>
	</tr>
	<tr>
		<th width="26%" align="right" bgcolor="#EFEFEF" class="content"><p><span class="red">* </span>Description</p>		  </th>
		<td><input name="title" type="text" class="content" size="40"></td>
	</tr>
	<tr>
		<th width="26%" align="right" bgcolor="#EFEFEF" class="content"><p><span class="red">*</span> File to Upload</p>		  </th>
		<td><input name="filetoupload" type="file" class="content" size="40"></td>
	</tr>
	<tr>
	  <td bgcolor="#efefef"><div align="right" class="content"><strong>Date</strong></div></td>
	  <td align="left"><span class="style35">
	    <input name="date" type="text" id="date" value="<?php echo date("Y-m-d")?>" size="30" />
	  </span><span class="red">* date format 2008-01-01 </span></td>
	  </tr>
	<tr>
	<td>&nbsp;</td>
	<td align="left">
	<input type="submit" name="submit" value=" Submit " onClick="return check();">&nbsp;<input type="reset" name="reset" value=" Reset ">
	</td></tr>
	<tr><td>&nbsp;</td><td class="red">Once upload is complete, a message 'File Uploaded..!!' would appear at top.</td></tr>
	</form> 
</table>
</td>
</tr>
<tr>
  <td valign="bottom" class="style3" colspan="2">
	  <table width="100%"  border="0" class="greybg">
		<tr>
		  <td height="26"><div align="center" class="style3">&copy;Copyright of WebAndYou<br>
			  contact web and you <a href="mailto:victor@webnyou.com">project administrator </a>for further assistance. </div></td>
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
<div id="Layer1" style="position:absolute; width:200px; height:40px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
