<?php 
require_once('../../Connections/pamconnection.php'); 
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	$id=mysqli_real_escape_string($conn, $_GET['id']);
	if($_GET['cmd']=='1')
	mysqli_query($conn, "update washington_gallery set photo1='' where id='".$id."' ");
	
	if($_POST['submit']=='Submit'){
	
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
				{mysqli_query($conn, "update washington_gallery set photo1='$file' where id='".$id."' ");
				$save="true";	
				}else {$save="false";			
				} 
			}
		}	

	
		//////////////upload document///////////////////
		
		$album=mysqli_real_escape_string($conn, $_POST['cat']);

		$prod_name=mysqli_real_escape_string($conn, $_POST['prod_name']);
		$price=mysqli_real_escape_string($conn, $_POST['desc']);
		
		$result=mysqli_query($conn, "update washington_gallery set album_id='$album', product_name='$prod_name', description='$price' where id='".$id."' "); 
	
		if($result)
			$save='true';
		else
			$save='false';
	}
	$selected_query=mysqli_query($conn, "select * from washington_gallery where id='".$id."' ");
	$selected_set=mysqli_fetch_assoc($selected_query);
	
	$category_query=mysqli_query($conn, "SELECT * FROM album WHERE status=1 order by album_name ");
	$category_set= mysqli_fetch_assoc($category_query);
	

	
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
		alert("Please enter the Product Name.");
		document.form1.prod_name.focus();
		return false;
	}
	if(document.form1.cat.value=="")
	{
		alert("Please select the category.");
		document.form1.cat.focus();
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



function jumpmenu2(form,txtHint)
{
   
   var main_id=form.options[form.selectedIndex].value;
	   
       if (window.XMLHttpRequest)
       {
             http=new XMLHttpRequest();
       }
       else
       {
           http=new ActiveXObject("Microsoft.XMLHTTP");
       }

	   var url = "getsubcat.php";
	   var params = "main="+main_id;
       http.open("POST", url, true);

        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.setRequestHeader("Content-length", params.length);
        http.setRequestHeader("Connection", "close");

           http.onreadystatechange = function() 
		   {
	            if(http.readyState == 4 ) 
				{
				     //alert(http.responseText);
					 document.getElementById(txtHint).innerHTML=http.responseText;
	            }
           }
               http.send(params);
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
<table width="630" border="1" cellspacing="0" cellpadding="0">
<tr>
<td height="288" align="left" valign="top"><table width="100%" align="left" cellpadding="2"  cellspacing="3">
  <form name="form1" method="post" action="editPhoto.php?id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']; ?>" enctype="multipart/form-data">
    <tr>
      <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">MANAGE PHOTO </td>
    </tr>
    <tr>
      <td><span class="red">* Required Fields</span></td>
    </tr>
    <tr>
      <td colspan="2" align="left" class="main_title">
        <?php if($save=='true')
echo '<font color="#336600">Photo is successfully updated</font>';
elseif($save=='false')
echo '<font color="#CC3300">Failed to update Photo</font>';
?>      </td>
    </tr>
          <tr>
             <th align="right" valign="top" bgcolor="#EFEFEF" class="content">Upload a photo  <br>             </th>
             <td colspan="3">
             <table width="100%" align="left" cellpadding="0"  cellspacing="0" border="0">
             
             <?
             if($selected_set['photo1']!='')
			 {$photo1= "<img src=\"../../".$selected_set['photo1']."\" width=\"100\" height=\"75\" name=\"image\" id=\"image\">";}
			 else
			 { $photo1= "<img src=\"../images/no_photo.gif\" width=\"100\" height=\"75\" name=\"image\" id=\"image\">";}
             ?>
             <tr><td>
             <?php echo $photo1;?>
			 <?php if($selected_set['photo1']!=''){ ?> 
          <a href="editPhoto.php?cmd=1&id=<?php echo $_GET['id']?>"><img src="../images/b_drop.png" border="0"></a>
			 <?php } ?><br>
                                <input type="file" name="file" onChange="findItem('image').src = findItem('file').value" style="width:190px;">
                        <br>
              </td>
              </tr>
              </table>              </td>
          </tr>
       

	<tr>
<th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Album&nbsp;</th>
            <?php $category_query=mysqli_query($conn, "select * from album where status=1 order by position asc"); $category_set=mysqli_fetch_assoc($category_query);     ?>
            <td width="78%">	
            <select name="cat">
		  <option value="">Select Album</option>
		  <?php do{?>
		  <option value="<?php echo $category_set['album_id']; ?>" <?php if($selected_set['album_id']==$category_set['album_id']){?> selected<?php }?> > <?php echo $category_set['album_name']; ?></option>
		  <?php }while($category_set= mysqli_fetch_assoc($category_query));?>
		</select>        
       </td>
               </tr>
                
			<tr>
                        <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Photo Caption&nbsp;</th>
            <td width="78%"><input type="text" name="prod_name" value="<?php echo $selected_set['product_name']?>" style="width:300px;"></td>
            </tr>
            <tr>
                <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"> Description</th>
            	<td><textarea name="desc" style="width:300px;height:150px;"><?php echo $selected_set['description']?></textarea></td>
            </tr>
    <tr>
      <th align="right" class="content">&nbsp;</th>
      <td class="content">&nbsp;</td>
    </tr>
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
