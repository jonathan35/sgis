<?php 
require_once('../../Connections/pamconnection.php');  
session_start();
	if($_SESSION['dcui_validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	if($_POST['submit']==' Submit ')
	{
		$menu=mysqli_real_escape_string($conn, $_POST['menu']);
		$menu_width=mysqli_real_escape_string($conn, $_POST['menu_width']);
		$text_size=mysqli_real_escape_string($conn, $_POST['text_size']);
		$text_limit=mysqli_real_escape_string($conn, $_POST['text_limit']);
		$horizontal_menu=mysqli_real_escape_string($conn, $_POST['horizontal_menu']);
		$horizontal_menu_width=mysqli_real_escape_string($conn, $_POST['horizontal_menu_width']);
		$horizontal_text_size=mysqli_real_escape_string($conn, $_POST['horizontal_text_size']);
		$horizontal_text_limit=mysqli_real_escape_string($conn, $_POST['horizontal_text_limit']);
		$horizontal_font_family=mysqli_real_escape_string($conn, $_POST['horizontal_font_family']);
		$font_family=mysqli_real_escape_string($conn, $_POST['font_family']);
		$free_format_page1=mysqli_real_escape_string($conn, $_POST['free_format_page1']);
		$free_format_page2=mysqli_real_escape_string($conn, $_POST['free_format_page2']);
		
		
		
		
		if(mysqli_query($conn, "update dcui_section_cpanel set record='".$menu."', date_posted='".date('Y-m-d')."' where id=8")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$menu_width."', date_posted='".date('Y-m-d')."' where id=9")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$text_size."', date_posted='".date('Y-m-d')."' where id=10")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$text_limit."', date_posted='".date('Y-m-d')."' where id=11")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$horizontal_menu."', date_posted='".date('Y-m-d')."' where id=17")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$horizontal_menu_width."', date_posted='".date('Y-m-d')."' where id=18")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$horizontal_text_size."', date_posted='".date('Y-m-d')."' where id=19")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$horizontal_text_limit."', date_posted='".date('Y-m-d')."' where id=20")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$horizontal_font_family."', date_posted='".date('Y-m-d')."' where id=35")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$font_family."', date_posted='".date('Y-m-d')."' where id=36")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$free_format_page1."', date_posted='".date('Y-m-d')."' where id=39")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$free_format_page2."', date_posted='".date('Y-m-d')."' where id=40"))	
			$success='<font color="#336600">Successful updated</font>';
		else
			$success='<font color="#CC3300">Failed to update</font>';
	}
	$template_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=8");
	$template_set=mysqli_fetch_assoc($template_query);
	$template_query2=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=9");
	$template_set2=mysqli_fetch_assoc($template_query2);
	$template_query3=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=10");
	$template_set3=mysqli_fetch_assoc($template_query3);
	$template_query4=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=11");
	$template_set4=mysqli_fetch_assoc($template_query4);	
	
	$template_query5=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=17");
	$template_set5=mysqli_fetch_assoc($template_query5);
	$template_query6=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=18");
	$template_set6=mysqli_fetch_assoc($template_query6);
	$template_query7=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=19");
	$template_set7=mysqli_fetch_assoc($template_query7);
	$template_query8=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=20");
	$template_set8=mysqli_fetch_assoc($template_query8);		

	$template_query9=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=36");
	$template_set9=mysqli_fetch_assoc($template_query9);		
	$template_query10=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=35");
	$template_set10=mysqli_fetch_assoc($template_query10);		
	
	$template_query11=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=39");
	$template_set11=mysqli_fetch_assoc($template_query11);		
	$template_query12=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=40");
	$template_set12=mysqli_fetch_assoc($template_query12);		

?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" src="../js/bbcode.js"></script>
<script language="JavaScript" src="../js/validate.js"></script>
<script language="JavaScript" src="../js/message.js"></script>
<script language="javascript" src="../js/menuAtNews.js"></script>

<title>DCUI</title>
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
<?php //if ($_GET['add']==1){?>
<script language="javascript">
function check()
{
	if(form1.albumname.value=="")
	{
		alert("Please enter main category.");
		form1.albumname.focus();
		return false;
	}
	return true;
}
</script>
<?php //}?>
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
            <div class="white_title" id="titlename"></div>
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
<td height="288" align="left" valign="top"><table width="630" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">
      <table width="100%" align="left" cellpadding="2"  cellspacing="2" border="0">
        <form name="form1" method="post" action="editMenu.php?add=1" enctype="multipart/form-data">
          <tr>
            <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">TEMPLATE </td>
          </tr>
          <tr>
            <td colspan="2" class="main_title"><?php echo $success;?></td>
          </tr>
          <tr>
            <td colspan="2" class="red">* Required fields </td>
          </tr>
<tr>
            <th width="19%" align="right" bgcolor="#EFEFEF" class="main_title" valign="top"><span class="red">*</span> Horizontal Menu &nbsp;</th>
            <td width="81%" align="left" class="content">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #999 solid; padding:10px;">
              <tr>
                <td width="60%" valign="top">
            	<img src="../images/menu02.gif" border="1" style="vertical-align:middle;">
                </td>
                <td width="6%">
            	
                
                </td>
                <td width="34%">
                <label style="vertical-align:middle;"><input type="radio" name="horizontal_menu" value="1" style="vertical-align:middle;" <?php if($template_set5['record']==1){?>checked<?php }?>> On</label>&nbsp;&nbsp;&nbsp;
                <input type="radio" name="horizontal_menu" value="0" style="vertical-align:middle;" <?php if($template_set5['record']==0){?>checked<?php }?>> Off</label><br><img src="../../images/space.gif" width="20" height="15"><br>
                
                
                Width (Pixel)<br>
                <input type="text" name="horizontal_menu_width" value="<?php echo $template_set6['record'];?>" style="width:60px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Text Size (Pixel)<br>
                <input type="text" name="horizontal_text_size" value="<?php echo $template_set7['record'];?>" style="width:60px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Text Character Limit<br>
                <input type="text" name="horizontal_text_limit" value="<?php echo $template_set8['record'];?>" style="width:60px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Font Family<br>
                <input type="text" name="horizontal_font_family" value="<?php echo $template_set10['record'];?>" style="width:150px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Include Free Format Page<br>
                <label style="vertical-align:middle;">
                    <input type="radio" name="free_format_page1" value="true" style="vertical-align:middle;" <?php if($template_set11['record'] == 'true'){?>checked<?php }?>> 
                    Yes
                </label>
                &nbsp;&nbsp;&nbsp;
                <label style="vertical-align:middle;">
                    <input type="radio" name="free_format_page1" value="false" style="vertical-align:middle;" <?php if($template_set11['record'] == 'false'){?>checked<?php }?>> 
                    No
                </label><br>
                <img src="../../images/space.gif" width="20" height="15"><br>
                
                
                
                <br>
                
                </td>
              </tr>
            </table>
                

            </td>
          </tr>          
          
          
          
<tr>
            <th width="19%" align="right" bgcolor="#EFEFEF" class="main_title" valign="top"><span class="red">*</span> Vertical Menu &nbsp;</th>
            <td width="81%" align="left" class="content">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #999 solid; padding:10px;">
              <tr>
                <td width="60%" valign="top">
            	<img src="../images/menu.gif" border="1" style="vertical-align:middle;">
                </td>
                <td width="6%">
            	
                
                </td>
                <td width="34%">
                <label style="vertical-align:middle;"><input type="radio" name="menu" value="1" style="vertical-align:middle;" <?php if($template_set['record']==1){?>checked<?php }?>> On</label>&nbsp;&nbsp;&nbsp;
                <input type="radio" name="menu" value="0" style="vertical-align:middle;" <?php if($template_set['record']==0){?>checked<?php }?>> Off</label><br><img src="../../images/space.gif" width="20" height="15"><br>
                
                
                Width (Pixel)<br>
                <input type="text" name="menu_width" value="<?php echo $template_set2['record'];?>" style="width:60px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Text Size (Pixel)<br>
                <input type="text" name="text_size" value="<?php echo $template_set3['record'];?>" style="width:60px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Text Character Limit<br>
                <input type="text" name="text_limit" value="<?php echo $template_set4['record'];?>" style="width:60px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Font Family<br>
                <input type="text" name="font_family" value="<?php echo $template_set9['record'];?>" style="width:150px;">
                <br><img src="../../images/space.gif" width="20" height="10"><br> Include Free Format Page<br>
                <label style="vertical-align:middle;">
                    <input type="radio" name="free_format_page2" value="true" style="vertical-align:middle;" <?php if($template_set12['record'] == 'true'){?>checked<?php }?>> 
                    Yes
                </label>
                &nbsp;&nbsp;&nbsp;
                <label style="vertical-align:middle;">
                    <input type="radio" name="free_format_page2" value="false" style="vertical-align:middle;" <?php if($template_set12['record'] == 'false'){?>checked<?php }?>> 
                    No
                </label><br>
                <img src="../../images/space.gif" width="20" height="15"><br>
                <br>
                </td>
              </tr>
            </table>
                

            </td>
          </tr>     
          
                           
          
          
          
          
     
          
          
          <tr>
            <td>&nbsp;</td>
            <td align="left"><br>
<br>
              <input type="submit" name="submit" value=" Submit " onClick="return check();">
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
<div id="Layer1" style="position:absolute; width:200px; height:51px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
