<?php 
require_once('../../Connections/pamconnection.php');  
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	if($_GET['add']==1){
	if($_POST['submit']==' Submit ')
	{

		$prod_name=$_POST['prod_name'];
		$description=$_POST['description'];
		$date_posted=date("Y-m-d");
	
		if(mysqli_query($conn, "INSERT INTO side_panel ( side_brief, side_detail, status, date_posted) 
		values ('".$prod_name."', '".$description."','1', '".$date_posted."')"))
			$success='<font color="#336600">Content added</font>';
		else
			$success='<font color="#CC3300">Failed to add Content</font>';
	}
	}
	$today=date("Y-m-d");
	
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
<script type="text/javascript">
function check()
{
	if(document.form1.prod_name.value=="")
	{
		alert("Please enter the title.");
		document.form1.prod_name.focus();
		return false;
	}
	
	return true;
}
</script>
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
		theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,emotions,|,print,|,link,|,fullscreen",
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

<SCRIPT LANGUAGE="JavaScript">
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
</script>
<script> 
function getdivHTML(){
var divArray = document.getElementsByTagName("div");
for (var i = 0; i<divArray.length; i++){
if (divArray[i].class="sibling")
return divArray[i].innerHTML;
}
}
</script>

</head>

<body><img src="../images/cmservice.jpg" width="800" height="50">
<table width="799" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
	<div align="left">
          <div id="title">
            <div class="white_title" id="titlename"></div>
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
        <form name="form1" method="post" action="createSide.php?add=1&main=<?php echo $_GET['main']?>" enctype="multipart/form-data">
          <tr>
            <td colspan="4" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">CREATE   SIDE PANEL</td>
          </tr>
          <tr>
            <td colspan="4" class="main_title"><?php echo $success;?></td>
          </tr>
          <tr>
            <td colspan="4" class="red">* Required fields </td>
          </tr>
			<tr valign="top">
				<th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Side Panel<br>
                <span class="red">Please make sure all <br>the content for side <br>panel is within the <br>limited width.<br><br>
					Left Panel width is <br>limited to 180 pixel.<br><br>
					Right Panel width is <br>limited to 220 pixel. 


				</span>
                </th>
                <td width="69%">
                <textarea name="prod_name" class="Textareafield" style="width:400px; height:300px;"></textarea>
                
                
                </td>
            </tr>            
                        
            
                     
            <!--<tr>
              <td colspan="2" align="center" bgcolor="#CCCCCC">
                <div style="text-shadow: #333333 2px -1px 3px; color:#FFF; font-size:20px; font-weight:bold;">CONTENT OF SIDE PANEL</div>   
                </td>
            </tr>
             
            <tr valign="top">
              <td colspan="2">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td align="center">
                      <textarea name="description" class="Textareafield" style="width:610px; height:700px;"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
   
          -->
            
          
          
          
          <tr>
            <td align="center" colspan="2">
              <input type="submit" name="submit" value=" Submit " >
              <!--<input type="submit" name="submit" value=" Submit " onClick="return check();"> -->
&nbsp;
              <input type="reset" name="reset" value=" Reset ">            </td>
          </tr>
        </form>
    </table></td>
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
	</td>
  </tr>
  <tr>
    <td width="169" align="left" valign="top"> </td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<?php include("../menu.php");?>
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; width:200px; height:39px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
