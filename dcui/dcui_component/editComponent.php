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
		$image_height=mysqli_real_escape_string($conn, $_POST['image_height']);
		
		if(mysqli_query($conn, "update dcui_section_cpanel set record='".$menu."', date_posted='".date('Y-m-d')."' where id=12")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$menu_width."', date_posted='".date('Y-m-d')."' where id=13")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$text_size."', date_posted='".date('Y-m-d')."' where id=14")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$text_limit."', date_posted='".date('Y-m-d')."' where id=15")&&
		 mysqli_query($conn, "update dcui_section_cpanel set record='".$image_height."', date_posted='".date('Y-m-d')."' where id=16"))	
			$success='<font color="#336600">Successful updated</font>';
		else
			$success='<font color="#CC3300">Failed to update</font>';
	}
	$template_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=12");
	$template_set=mysqli_fetch_assoc($template_query);
	$template_query2=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=13");
	$template_set2=mysqli_fetch_assoc($template_query2);
	$template_query3=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=14");
	$template_set3=mysqli_fetch_assoc($template_query3);
	$template_query4=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=15");
	$template_set4=mysqli_fetch_assoc($template_query4);	
	$template_query5=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=16");
	$template_set5=mysqli_fetch_assoc($template_query5);	


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
        <form name="form1" method="post" action="editComponent.php?add=1" enctype="multipart/form-data">
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
            <td align="left" class="content">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%">

                <div style="border:1px solid #666;">
                    &nbsp;&nbsp;&nbsp;Listing A<br>
                    <img src="../images/product_listing01.jpg">
                </div>
					</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    
                    <td width="50%">
                <div style="border:1px solid #666;">
                    &nbsp;&nbsp;&nbsp;Listing B<br>
                    <img src="../images/product_listing02.jpg">
                </div>
                
                
					</td>
                  </tr>
                </table>                
                </td>
                
                
                
              </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>

            
            
            
            
              <tr>
                <td width="3%"></td>
                <td width="97%">
                <label style="vertical-align:middle;"><input type="radio" name="menu" value="A" style="vertical-align:middle;" <?php if($template_set['record']==A){?>checked<?php }?>>
                Listing A
                </label>&nbsp;&nbsp;&nbsp;
                <input type="radio" name="menu" value="B" style="vertical-align:middle;" <?php if($template_set['record']==B){?>checked<?php }?>>
                Listing B</label><br><img src="../../images/space.gif" width="20" height="15"><br>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="24%">Title character limit</td>
    <td width="31%">Description character limit</td>
    <td width="24%">Image width</td>
    <td width="21%">Image Height</td>
  </tr>
  <tr>
    <td><input type="text" name="menu_width" value="<?php echo $template_set2['record'];?>" style="width:60px;"></td>
    <td><input type="text" name="text_size" value="<?php echo $template_set3['record'];?>" style="width:60px;"></td>
    <td><input type="text" name="text_limit" value="<?php echo $template_set4['record'];?>" style="width:60px;"></td>
    <td><input type="text" name="image_height" value="<?php echo $template_set5['record'];?>" style="width:60px;"></td>
  </tr>
</table>

                
                
                
                </td>
              </tr>
            </table>
                

            </td>
          </tr>     
          
          <tr>
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
