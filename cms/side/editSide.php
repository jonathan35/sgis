<?php 
require_once('../../Connections/pamconnection.php'); 
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	$id=mysqli_real_escape_string($conn, $_GET['id']);

	if($_POST['submit']=='Submit'){
	
		$prod_name = $_POST['prod_name'];
		$side_detail=$_POST['side_description'];
		
		$result=mysqli_query($conn, "update side_panel set side_brief='$prod_name', side_detail='$side_detail' where id='".$id."' "); 
	
		if($result)
			$save='true';
		else
			$save='false';
	}
	$selected_query=mysqli_query($conn, "select * from side_panel where id='".$id."' ");
	$selected_set=mysqli_fetch_assoc($selected_query);
	
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
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste "//moxiemanager
    ],
    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | styleselect fontselect fontsizeselect",theme_advanced_fonts : "Arial=arial,helvetica,sans-serif; xxx; Courier New=courier new,courier,monospace;Times New Roman=times new roman,times,serif;Verdana=verdana,arial,helvetica,sans-serif;Tahoma=tahoma,arial,helvetica,sans-serif;",
	content_css : "css/content.css"
});
</script>
<!-- TinyMCE -->


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
<table width="630" border="1" cellspacing="0" cellpadding="0">
<tr>
<td height="288" align="left" valign="top"><table width="100%" align="left" cellpadding="2"  cellspacing="3">
  <form name="form1" method="post" action="editSide.php?id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']; ?>" enctype="multipart/form-data">
          <tr>
            <td colspan="4" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">EDIT SIDE PANEL</td>
          </tr>
    <tr>
      <td><span class="red">* Required Fields</span></td>
    </tr>
    <tr>
      <td colspan="2" align="left" class="main_title">
        <?php if($save=='true')
echo '<font color="#336600">Product is successfully updated</font>';
elseif($save=='false')
echo '<font color="#CC3300">Failed to update Product</font>';
?>      </td>
    </tr>
			<tr valign="top">
				<th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Side Panel<br>
                <span class="red">Please make sure all <br>the content for side <br>panel is within the <br>limited width.<br><br>
					Left Panel width is <br>limited to 180 pixel.<br><br>
					Right Panel width is <br>limited to 220 pixel. 


				</span>
                </th>
                <td width="69%">
                <textarea name="prod_name" class="Textareafield" style="width:400px; height:300px;"><?php echo $selected_set['side_brief']?></textarea>
                
                
                </td>
            </tr>            
            
          <!--  <tr>
              <td colspan="2" align="center" bgcolor="#CCCCCC">
                <div style="text-shadow: #333333 2px -1px 3px; color:#FFF; font-size:20px; font-weight:bold;">EDIT CONTENT OF SIDE PANEL</div>   
                </td>
            </tr>
            
            
            <tr valign="top">
              <td colspan="2">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td align="center">
                      
                      <textarea name="side_description" class="Textareafield" style="width:610px; height:700px;"><?php //echo $selected_set['side_detail']?></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
                 -->
                

    <tr>
      <td>&nbsp;</td>
      <td align="left">
        <input type="submit" name="submit" value="Submit" onClick="return check();">
&nbsp;
        <input type="reset" name="reset" value=" Reset ">      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </form>
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
<div id="Layer1" style="position:absolute; width:200px; height:46px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
