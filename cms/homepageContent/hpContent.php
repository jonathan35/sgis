<?php 
require_once('../../Connections/pamconnection.php'); 
session_start();

	if($_SESSION['validation']=='YES'){
		
	}else{
		header("Location:login.php");
	}

	if($_POST['submit']=='Submit'){

		$content = $_POST['content'];
		$content1 = $_POST['content1'];
		$date = date('Y-m-d');
		
		$result = mysqli_query($conn, "UPDATE home_content SET content='".$content."' , date_posted ='".$date."'  WHERE id='1' and status='1' ");
		$result = mysqli_query($conn, "UPDATE home_content SET content='".$content1."' , date_posted ='".$date."'  WHERE id='2' and status='1' "); 
	
		if($result)
			$save='true';
		else
			$save='false';
	}
	
	$content_query = mysqli_query($conn, "SELECT * FROM home_content WHERE id='1' and status = '1' ");
	$content_set = mysqli_fetch_assoc($content_query);
	
	$content_query1 = mysqli_query($conn, "SELECT * FROM home_content WHERE id='2' and status = '1' ");
	$content_set1 = mysqli_fetch_assoc($content_query1);
	
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
<script type="text/javascript" src="../../tiny_mce/tiny_mce.js"></script>
<?php include("../../tiny_mce/tinymce.int.php");?>



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
  <form name="form1" method="post" action="hpContent.php" enctype="multipart/form-data">
            <tr>
            	<td colspan="2" align="center" bgcolor="#CCCCCC">
                    <div style="text-shadow: #333333 2px -1px 3px; color:#FFF; font-size:20px; font-weight:bold;">EDIT CONTENT OF ABOUT US</div>            
                </td>
            </tr>
            
           	<tr>
             	<td colspan="2" align="left" class="main_title">
					<?php if($save=='true')
                        	echo '<font color="#336600">Homepage content is successfully updated</font>';
                        elseif($save=='false')
                        	echo '<font color="#CC3300">Failed to update homepage content</font>';
                    ?>      
        		</td>
            </tr>
            
            <tr valign="top">
              <td colspan="2">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td align="center">
                      <textarea name="content" class="Textareafield" style="width:610px; height:300px;"><?php echo $content_set['content']?></textarea>                      
                    </td>
                  </tr>
                </table>                
              </td>
            
            </tr>
              <td>&nbsp;</td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center" bgcolor="#CCCCCC">
                    <div style="text-shadow: #333333 2px -1px 3px; color:#FFF; font-size:20px; font-weight:bold;">EDIT CONTENT OF OUR PRODUCT</div>            
                </td>
            </tr>
            
            <tr valign="top">
              <td colspan="2">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td align="center">
                      <textarea name="content1" class="Textareafield" style="width:610px; height:300px;"><?php echo $content_set1['content']?></textarea>                      
                    </td>
                  </tr>
                </table>                
              </td>
            </tr>

            <tr>
              <td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
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
