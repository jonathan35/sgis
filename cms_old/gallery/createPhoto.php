<?php 
require_once('../../Connections/pamconnection.php');  
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
	
	if($_POST['submit']==' Submit ')
	{
	
		if($_FILES['file']!='')
		{
			$file_source = $HTTP_POST_FILES['file']['tmp_name']; 
			$type = $HTTP_POST_FILES['file']['type']; 
			$ext = substr(strrchr($type, "/"), 1);
			switch ( $ext )
			{ 
				case 'pjpeg':
					$file = 'photo/'.uniqid('').'.jpeg';
					break;
			
				case 'jpg':
					$file = 'photo/'.uniqid('').'.jpeg';
					break;
		
				case 'jpeg': 
					$file = 'photo/'.uniqid('').'.jpeg';
					break; 
				 
				case 'gif':
					$file = 'photo/'.uniqid('').'.gif';
					break;
					
				case 'png':
					$file = 'photo/'.uniqid('').'.png';
					break;
			}
			if (( $file != '' ) )
			{    
				if ( move_uploaded_file($file_source, "../../".$file ) ) 
				{
				$save="true";}	
				else {$save="false";			
				} 
			}
		}	
		$album=mysqli_real_escape_string($conn, $_POST['cat']);
		
		$prod_name=mysqli_real_escape_string($conn, $_POST['prod_name']);
		$price=mysqli_real_escape_string($conn, $_POST['desc']);
		
		$date_posted=date("Y-m-d");
	
		if(mysqli_query($conn, "INSERT INTO washington_gallery ( album_id, photo1, product_name, description, status) 
		values ('$album','$file','$prod_name','$price','1')"))		
			$success='<font color="#336600">Product added</font>';
		else
			$success='<font color="#CC3300">Failed to add Product</font>';
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
</style>
<script language="javascript">
function check()
{
	if(document.form1.cat.value=="")
	{
		alert("Please enter the album's name.");
		document.form1.cat.focus();
	 	}
	
	if(document.form1.prod_name.value=="")
	{
		alert("Please enter photo's caption.");
		document.form1.prod_name.focus();
		return false;
	}
	return true;
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
            <div class="white_title" id="titlename"><span class="white_title">PHOTO GALLERY</span></div></div>
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
        <form name="form1" method="post" action="createPhoto.php?add=1&main=<?php echo $_GET['main']?>" enctype="multipart/form-data">
          <tr>
            <td colspan="4" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">ADD PHOTO</td>
          </tr>
          <tr>
            <td colspan="4" class="main_title"><?php echo $success;?></td>
          </tr>
          <tr>
            <td colspan="4" class="red">* Required fields </td>
          </tr>
          <tr>
             <th align="right" valign="top" bgcolor="#EFEFEF" class="content">Upload  Photo<br>
               <span class="main_title">(recommended image size<br>
               <span class="red">450 x 338 pixels</span>)</span> <br>             </th>
             <td colspan="3">
             <table width="100%" align="left" cellpadding="0"  cellspacing="0" border="0">
             <tr><td>
             <img src="../images/no_photo.gif" width="100" height="75" name="image" id="image"><br>
                                <input type="file" name="file" onChange="findItem('image').src = findItem('file').value" style="width:190px;">
                        <br>
              </td>
              </tr>
              </table>              </td>
          </tr>
         
                      
          <tr>
            <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Album</th>
            <?php $category_query=mysqli_query($conn, "select * from album where status=1 order by position asc"); $category_set=mysqli_fetch_assoc($category_query);     ?>
            <td width="69%"><select name="cat">
              <option value="">Select album...</option>
              <?php do{?>
              <option value="<?php echo $category_set['album_id']; ?>" <?php if($_GET['main']==$category_set['album_id']){?> selected<?php }?> > <?php echo $category_set['album_name']; ?></option>
              <?php }while($category_set= mysqli_fetch_assoc($category_query));?>
            </select></td>
               </tr> 
			<tr>
                        <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Photo Caption</th>
            <td width="69%"><input type="text" name="prod_name" style="width:300px;"></td>
            </tr>
            <tr>
                <th width="31%" align="right" valign="top"  bgcolor="#EFEFEF" class="main_title"> Description&nbsp;</th>
            	<td><textarea name="desc" style="width:300px;height:150px;"><?php echo $selected_set['desc']?></textarea></td>
            </tr>
          
          
          
          
          
          <tr>
            <td align="center" colspan="2">
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
