<?php 
require_once('../../Connections/pamconnection.php'); 
session_start();

	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	if($_GET['wp']==1){
		$ssss = mysqli_query($conn, "select description from home_section where id=6 ");
		$asdss= mysqli_fetch_assoc($ssss);
		$myFile = $asdss['description'];
			if(file_exists($myFile)){
			@unlink($myFile);
			}
			mysqli_query($conn, "update home_section set description='' where id=6");
	}
	if($_GET['wp']==2){
		$ssss = mysqli_query($conn, "select description from home_section where id=7 ");
		$asdss= mysqli_fetch_assoc($ssss);
		$myFile = $asdss['description'];
			if(file_exists($myFile)){
			@unlink($myFile);
			}
			mysqli_query($conn, "update home_section set description='' where id=7");
	}	
	if($_GET['wp']==3){
		$ssss = mysqli_query($conn, "select description from home_section where id=8 ");
		$asdss= mysqli_fetch_assoc($ssss);
		$myFile = $asdss['description'];
			if(file_exists($myFile)){
			@unlink($myFile);
			}
			mysqli_query($conn, "update home_section set description='' where id=8");
	}
	if($_GET['wp']==4){
		$ssss = mysqli_query($conn, "select description from home_section where id=9 ");
		$asdss= mysqli_fetch_assoc($ssss);
		$myFile = $asdss['description'];
			if(file_exists($myFile)){
			@unlink($myFile);
			}
			mysqli_query($conn, "update home_section set description='' where id=9");
	}
	if($_GET['wp']==5){
		$ssss = mysqli_query($conn, "select description from home_section where id=10 ");
		$asdss= mysqli_fetch_assoc($ssss);
		$myFile = $asdss['description'];
			if(file_exists($myFile)){
			@unlink($myFile);
			}
			mysqli_query($conn, "update home_section set description='' where id=10");
	}	
	
	if($_POST['submit']=='Submit')
	{
	if($_FILES['photo1']!='')
		{
			$file_source = $HTTP_POST_FILES['photo1']['tmp_name'];
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
				if ( move_uploaded_file( $file_source, "../../".$file1 ) ) 
				{
					mysqli_query($conn, "update home_section set description='".$file1."', date='".date("Y-m-d")."' where id=6");
				} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}
	if($_FILES['photo2']!='')
		{
			$file_source = $HTTP_POST_FILES['photo2']['tmp_name'];
			$type = $HTTP_POST_FILES['photo2']['type']; 
			$file2 = ''; 
			$ext = substr(strrchr($type, "/"), 1);
		
			switch ( $ext )
			{ 
				case 'pjpeg':
					$file2 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpg':
					$file2 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpeg':
					$file2 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'gif':
					$file2 = 'photo/'.uniqid('').'.gif';
					break;
				case 'png':
					$file2 = 'photo/'.uniqid('').'.png';
					break;
			}
			if (( $file2 != '' ) )
			{ 
				if ( move_uploaded_file( $file_source, "../../".$file2 ) ) 
				{
					mysqli_query($conn, "update home_section set description='".$file2."', date='".date("Y-m-d")."' where id=7");
				} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}			
		
	if($_FILES['photo3']!='')
		{
			$file_source = $HTTP_POST_FILES['photo3']['tmp_name'];
			$type = $HTTP_POST_FILES['photo3']['type']; 
			$file3 = ''; 
			$ext = substr(strrchr($type, "/"), 1);
		
			switch ( $ext )
			{ 
				case 'pjpeg':
					$file3 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpg':
					$file3 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpeg':
					$file3 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'gif':
					$file3 = 'photo/'.uniqid('').'.gif';
					break;
				case 'png':
					$file3 = 'photo/'.uniqid('').'.png';
					break;
			}
			if (( $file3 != '' ) )
			{ 
				if ( move_uploaded_file( $file_source, "../../".$file3 ) ) 
				{
					mysqli_query($conn, "update home_section set description='".$file3."', date='".date("Y-m-d")."' where id=8");
				} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}			
	if($_FILES['photo4']!='')
		{
			$file_source = $HTTP_POST_FILES['photo4']['tmp_name'];
			$type = $HTTP_POST_FILES['photo4']['type']; 
			$file4 = ''; 
			$ext = substr(strrchr($type, "/"), 1);
		
			switch ( $ext )
			{ 
				case 'pjpeg':
					$file4 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpg':
					$file4 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpeg':
					$file4 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'gif':
					$file4 = 'photo/'.uniqid('').'.gif';
					break;
				case 'png':
					$file4 = 'photo/'.uniqid('').'.png';
					break;
			}
			if (( $file4 != '' ) )
			{ 
				if ( move_uploaded_file( $file_source, "../../".$file4 ) ) 
				{
					mysqli_query($conn, "update home_section set description='".$file4."', date='".date("Y-m-d")."' where id=9");
				} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}		
		
	if($_FILES['photo5']!='')
		{
			$file_source = $HTTP_POST_FILES['photo5']['tmp_name'];
			$type = $HTTP_POST_FILES['photo5']['type']; 
			$file5 = ''; 
			$ext = substr(strrchr($type, "/"), 1);
		
			switch ( $ext )
			{ 
				case 'pjpeg':
					$file5 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpg':
					$file5 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'jpeg':
					$file5 = 'photo/'.uniqid('').'.jpg';
					break;
				case 'gif':
					$file5 = 'photo/'.uniqid('').'.gif';
					break;
				case 'png':
					$file5 = 'photo/'.uniqid('').'.png';
					break;
			}
			if (( $file5 != '' ) )
			{ 
				if ( move_uploaded_file( $file_source, "../../".$file5 ) ) 
				{
					mysqli_query($conn, "update home_section set description='".$file5."', date='".date("Y-m-d")."' where id=10");
				} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}	
		
		
	$link1=$_POST['link1'];
	$link2=$_POST['link2'];
	$link3=$_POST['link3'];
	$link4=$_POST['link4'];
	$link5=$_POST['link5'];
	
	if(mysqli_query($conn, "update home_section set description='".$link1."', date='".date("Y-m-d")."' where id=11")&&
	mysqli_query($conn, "update home_section set description='".$link2."', date='".date("Y-m-d")."' where id=12")&&
	mysqli_query($conn, "update home_section set description='".$link3."', date='".date("Y-m-d")."' where id=13")&&
	mysqli_query($conn, "update home_section set description='".$link4."', date='".date("Y-m-d")."' where id=14")&&
	mysqli_query($conn, "update home_section set description='".$link5."', date='".date("Y-m-d")."' where id=15"))
$save='<font color=#336600>Successful</font>';
	else
	$save='<font color=#CC3300>Failed</font>';
}


$photo1_query=mysqli_query($conn, "select * from home_section where id=6");
$photo1_set=mysqli_fetch_assoc($photo1_query);
$photo2_query=mysqli_query($conn, "select * from home_section where id=7");
$photo2_set=mysqli_fetch_assoc($photo2_query);
$photo3_query=mysqli_query($conn, "select * from home_section where id=8");
$photo3_set=mysqli_fetch_assoc($photo3_query);
$photo4_query=mysqli_query($conn, "select * from home_section where id=9");
$photo4_set=mysqli_fetch_assoc($photo4_query);
$photo5_query=mysqli_query($conn, "select * from home_section where id=10");
$photo5_set=mysqli_fetch_assoc($photo5_query);

$photo_link1_query=mysqli_query($conn, "select * from home_section where id=11");
$photo_link1=mysqli_fetch_assoc($photo_link1_query);
$photo_link2_query=mysqli_query($conn, "select * from home_section where id=12");
$photo_link2=mysqli_fetch_assoc($photo_link2_query);
$photo_link3_query=mysqli_query($conn, "select * from home_section where id=13");
$photo_link3=mysqli_fetch_assoc($photo_link3_query);
$photo_link4_query=mysqli_query($conn, "select * from home_section where id=14");
$photo_link4=mysqli_fetch_assoc($photo_link4_query);
$photo_link5_query=mysqli_query($conn, "select * from home_section where id=15");
$photo_link5=mysqli_fetch_assoc($photo_link5_query);



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
<table width="100%" align="left" cellpadding="2"  cellspacing="3">
	<form name="form1" method="post" action="editIntro.php" enctype="multipart/form-data">
	<tr>
	  <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">EDIT INTRO PAGE PHOTO</td>
	</tr>
	<tr>
	  <td colspan="2" align="left" class="main_title">
	<?php echo $save;?>
		</td>
	  </tr>
    
    
	  <tr>
<th align="right" bgcolor="#EFEFEF" class="main_title" valign="top">Photo 1<br>
<span class="red02">Recomended Size:<br>
80 x 60 pixels</span>

</th>
          <td width="80%" class="content"> Photo 1&nbsp;&nbsp;&nbsp;<?php if($photo1_set['description']!=''){?><a href="editIntro.php?<?php echo $_SERVER['QUERY_STRING']?>&wp=1"><img src="../images/b_drop.png" width="16" height="15" border="0"></a><?php }?><br>
				<?php if($photo1_set['description']!=''&& file_exists("../../".$photo1_set['description'])){$photo1_set="../../".$photo1_set['description'];}else{$photo1_set='../images/no_photo.gif';}?>
                  <img name="thisImage1" id="thisImage1" src="<?php echo $photo1_set?>" width="80" height="60"><br>
                  <input name="photo1" type="file" class="content" onChange="javascript:findItem('thisImage1').src = findItem('photo1').value;">
            </td>
</tr>    
    
	<tr>
    	<th width="30%" align="right" valign="top" bgcolor="#EFEFEF" class="main_title">Link of photo 1</th>
	  <td width="70%" align="left">
	    <input type="text" name="link1" value="<?php echo $photo_link1['description']?>" style="width:180px;">
	    </td>
	  </tr>
      
      
	  <tr>
<th align="right" bgcolor="#EFEFEF" class="main_title" valign="top">Photo 2<br>
<span class="red02">Recomended Size:<br>
80 x 60 pixels</span>

</th>
          <td width="80%" class="content"> Photo 2&nbsp;&nbsp;&nbsp;<?php if($photo2_set['description']!=''){?><a href="editIntro.php?<?php echo $_SERVER['QUERY_STRING']?>&wp=2"><img src="../images/b_drop.png" width="16" height="15" border="0"></a><?php }?><br>
				<?php if($photo2_set['description']!=''&& file_exists("../../".$photo2_set['description'])){$photo2_set="../../".$photo2_set['description'];}else{$photo2_set='../images/no_photo.gif';}?>
                  <img name="thisImage2" id="thisImage2" src="<?php echo $photo2_set?>" width="80" height="60"><br>
                  <input name="photo2" type="file" class="content" onChange="javascript:findItem('thisImage2').src = findItem('photo2').value;">
            </td>
</tr>    
    
	<tr>
    	<th width="30%" align="right" valign="top" bgcolor="#EFEFEF" class="main_title">Link of photo 2</th>
	  <td width="70%" align="left">
	    <input type="text" name="link2" value="<?php echo $photo_link2['description']?>" style="width:180px;">
	    </td>
	  </tr>      
      
	  <tr>
<th align="right" bgcolor="#EFEFEF" class="main_title" valign="top">Photo 3<br>
<span class="red02">Recomended Size:<br>
80 x 60 pixels</span>

</th>
          <td width="80%" class="content"> Photo 3&nbsp;&nbsp;&nbsp;<?php if($photo3_set['description']!=''){?><a href="editIntro.php?<?php echo $_SERVER['QUERY_STRING']?>&wp=3"><img src="../images/b_drop.png" width="16" height="15" border="0"></a><?php }?><br>
				<?php if($photo3_set['description']!=''&& file_exists("../../".$photo3_set['description'])){$photo3_set="../../".$photo3_set['description'];}else{$photo3_set='../images/no_photo.gif';}?>
                  <img name="thisImage3" id="thisImage3" src="<?php echo $photo3_set?>" width="80" height="60"><br>
                  <input name="photo3" type="file" class="content" onChange="javascript:findItem('thisImage3').src = findItem('photo3').value;">
            </td>
</tr>    
    
	<tr>
    	<th width="30%" align="right" valign="top" bgcolor="#EFEFEF" class="main_title">Link of photo 3</th>
	  <td width="70%" align="left">
	    <input type="text" name="link3" value="<?php echo $photo_link3['description']?>" style="width:180px;">
	    </td>
	  </tr>
      
      
	  <tr>
<th align="right" bgcolor="#EFEFEF" class="main_title" valign="top">Photo 4<br>
<span class="red02">Recomended Size:<br>
80 x 60 pixels</span>

</th>
          <td width="80%" class="content"> Photo 4&nbsp;&nbsp;&nbsp;<?php if($photo4_set['description']!=''){?><a href="editIntro.php?<?php echo $_SERVER['QUERY_STRING']?>&wp=4"><img src="../images/b_drop.png" width="16" height="15" border="0"></a><?php }?><br>
				<?php if($photo4_set['description']!=''&& file_exists("../../".$photo4_set['description'])){$photo4_set="../../".$photo4_set['description'];}else{$photo4_set='../images/no_photo.gif';}?>
                  <img name="thisImage4" id="thisImage4" src="<?php echo $photo4_set?>" width="80" height="60"><br>
                  <input name="photo4" type="file" class="content" onChange="javascript:findItem('thisImage4').src = findItem('photo4').value;">
            </td>
</tr>    
    
	<tr>
    	<th width="30%" align="right" valign="top" bgcolor="#EFEFEF" class="main_title">Link of photo 4</th>
	  <td width="70%" align="left">
	    <input type="text" name="link4" value="<?php echo $photo_link4['description']?>" style="width:180px;">
	    </td>
	  </tr>
      
	  <tr>
<th align="right" bgcolor="#EFEFEF" class="main_title" valign="top">Photo 5<br>
<span class="red02">Recomended Size:<br>
80 x 60 pixels</span>

</th>
          <td width="80%" class="content"> Photo 5&nbsp;&nbsp;&nbsp;<?php if($photo5_set['description']!=''){?><a href="editIntro.php?<?php echo $_SERVER['QUERY_STRING']?>&wp=5"><img src="../images/b_drop.png" width="16" height="15" border="0"></a><?php }?><br>
				<?php if($photo5_set['description']!=''&& file_exists("../../".$photo5_set['description'])){$photo5_set="../../".$photo5_set['description'];}else{$photo5_set='../images/no_photo.gif';}?>
                  <img name="thisImage5" id="thisImage5" src="<?php echo $photo5_set?>" width="80" height="60"><br>
                  <input name="photo5" type="file" class="content" onChange="javascript:findItem('thisImage5').src = findItem('photo5').value;">
            </td>
</tr>    
    
	<tr>
    	<th width="30%" align="right" valign="top" bgcolor="#EFEFEF" class="main_title">Link of photo 5</th>
	  <td width="70%" align="left">
	    <input type="text" name="link5" value="<?php echo $photo_link5['description']?>" style="width:180px;">
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