<?php 
require_once('../../Connections/pamconnection.php'); 
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
	$section_id = base64_decode($_GET['m']);
	
	$current_template_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and maincat_id='".$section_id."' ");
	$current_template_set = mysqli_fetch_assoc($current_template_query);	
	
	$field_query= mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE field_status=1 and section_id='".$section_id."' ORDER BY field_position ASC, field_name ASC, id desc");
	$field_set= mysqli_fetch_assoc($field_query);
	
	if($_POST['submit']=='Submit')
	{
	$field_arr = array($_POST['field1'], $_POST['field2'], $_POST['field3'], $_POST['field4'], $_POST['field5'], $_POST['field6'], $_POST['field7'], $_POST['field8'], $_POST['field9'], $_POST['field10'], $_POST['field11'], $_POST['field12'], $_POST['field13'], $_POST['field14'], $_POST['field15'], $_POST['field16'], $_POST['field17'], $_POST['field18'], $_POST['field19'], $_POST['field20'], $_POST['field21'], $_POST['field22'], $_POST['field23'], $_POST['field24'], $_POST['field25'], $_POST['field26'], $_POST['field27'], $_POST['field28'], $_POST['field29'], $_POST['field30']);
	

	
	/////////TO CHECH IS THE FIELD IS FILE BROWSE TYPE OR NOT - START////////////
	$Active_Post_File = array($_POST['filefield1'], $_POST['filefield2'], $_POST['filefield3'], $_POST['filefield4'], $_POST['filefield5'], $_POST['filefield6'], $_POST['filefield7'], $_POST['filefield8'], $_POST['filefield9'], $_POST['filefield10'], $_POST['filefield11'], $_POST['filefield12'], $_POST['filefield13'], $_POST['filefield14'], $_POST['filefield15'], $_POST['filefield16'], $_POST['filefield17'], $_POST['filefield18'], $_POST['filefield19'], $_POST['filefield20'], $_POST['filefield21'], $_POST['filefield22'], $_POST['filefield23'], $_POST['filefield24'], $_POST['filefield25'], $_POST['filefield26'], $_POST['filefield27'], $_POST['filefield28'], $_POST['filefield29'], $_POST['filefield30']);		
	
	$field_name = array('field0', 'field1', 'field2', 'field3', 'field4', 'field5', 'field6', 'field7', 'field8', 'field9', 'field10', 'field11', 'field12', 'field13', 'field14', 'field15', 'field16', 'field17', 'field18', 'field19', 'field20', 'field21', 'field22', 'field23', 'field24', 'field25', 'field26', 'field27', 'field28', 'field29', 'field30');
	
	$field_variable = array('$field0', '$field1', '$field2', '$field3', '$field4', '$field5', '$field6', '$field7', '$field8', '$field9', '$field10', '$field11', '$field12', '$field13', '$field14', '$field15', '$field16', '$field17', '$field18', '$field19', '$field20', '$field21', '$field22', '$field23', '$field24', '$field25', '$field26', '$field27', '$field28', '$field29', '$field30');
	
	for($h=0; $h<=30; $h++){ 
	if($_FILES[$field_name[$h]]!=''&&$HTTP_POST_FILES[$field_name[$h]]['tmp_name']!='')//TO CHECH IS THE FIELD IS FILE BROWSE TYPE OR NOT--
			{
				
				$file_source = $HTTP_POST_FILES[$field_name[$h]]['tmp_name'];
				$type = $HTTP_POST_FILES[$field_name[$h]]['type']; 
				$file = ''; 
				$ext = substr(strrchr($type, "/"), 1);
			
				switch ( $ext )
				{ 
					case 'pjpeg':
						$field_variable[$h] = 'photo/'.uniqid('').'.jpg';
						break;
					case 'jpg':
						$field_variable[$h] = 'photo/'.uniqid('').'.jpg';
						break;
					case 'jpeg':
						$field_variable[$h] = 'photo/'.uniqid('').'.jpg';
						break;
					case 'gif':
						$field_variable[$h] = 'photo/'.uniqid('').'.gif';
						break;
					case 'png':
						$field_variable[$h] = 'photo/'.uniqid('').'.png';
						break;
					case 'pdf':
						$field_variable[$h] = 'pdf/'.uniqid('').'.pdf';
						break;
					case 'vnd.ms-excel': 
						$field_variable[$h] = 'pdf/'.uniqid('').'.xls';
						break; 
					case 'msword': 
						$field_variable[$h] = 'pdf/'.uniqid('').'.doc';
						break; 	
					case 'vnd.ms-powerpoint': 
						$field_variable[$h] = 'pdf/'.uniqid('').'.ppt';
						break; 	
					case 'vnd.openxmlformats-officedocument.presentationml.presentation': 
						$field_variable[$h] = 'pdf/'.uniqid('').'.pptx';
						break; 		
					case 'vnd.openxmlformats-officedocument.wordprocessingml.document': 
						$field_variable[$h] = 'pdf/'.uniqid('').'.docx';
						break; 					
					case 'vnd.openxmlformats-officedocument.spreadsheetml.sheet': 
						$field_variable[$h] = 'pdf/'.uniqid('').'.xlsx';
						break; 					
				}
				if (( $field_variable[$h] != '' ) )
				{ 
					if( move_uploaded_file( $file_source, "../../".$field_variable[$h])){
						$file_field = $field_name[$h];
						//mysqli_query($conn, "update custom_field_section set $file_field='".$field_variable[$h]."'where id='".$abc."'");
					}//else{echo 'File could not be uploaded to server.<BR>';} 
				}
		}else{ 
		}
		
			//$fielname[$h] = "$field_name[$h]";
			
			if($Active_Post_File[$h]!=''&&$_POST[$field_name[$h]]==''){
				 $qry[$h] = "$field_variable[$h]";
				//echo $field_variable[$h]."con1<br>";
			}elseif($_POST[$field_name[$h]]!=''){ 
				 $qry[$h] = "'".$_POST[$field_name[$h]]."'";
				//echo $_POST[$field_name[$h]]."con2<br>";
			}else{
				 $qry[$h] = "''";
				//echo "con3<br>";
			}
			
			//if($h!=30) $qry[$h].=", "; 		
		
		
	}
	/////////TO CHECH IS THE FIELD IS FILE BROWSE TYPE OR NOT - END////////////
	echo "'', '|".$section_id."|', $qry[1], $qry[2], $qry[3], $qry[4], $qry[5], $qry[6], $qry[7], $qry[8], $qry[9], $qry[10], $qry[11], $qry[12], $qry[13], $qry[14], $qry[15], $qry[16], $qry[17], $qry[18], $qry[19], $qry[20], $qry[21], $qry[22], $qry[23], $qry[24], $qry[25], $qry[26], $qry[27], $qry[28], $qry[29], $qry[30], 1, '".date("Y-m-d")."'";

if(mysqli_query($conn, "insert into custom_field_section (id, category,field1,field2, status, date_posted) 
values ('', '|".$section_id."|',$qry[1],$qry[2], 1,'".date("Y-m-d")."')"))


/*
if(mysqli_query($conn, "insert into custom_field_section (id, category, field1, field2, field3, field4, field5, field6, field7, field8, field9, field10, field11, field12, field13, field14, field15, field16, field17, field18, field19, field20, field21, field22, field23, field24, field25, field26, field27, field28, field29, field30, status, date_posted) 
values ('', '|".$section_id."|', $qry[1], $qry[2], $qry[3], $qry[4], $qry[5], $qry[6], $qry[7], $qry[8], $qry[9], $qry[10], $qry[11], $qry[12], $qry[13], $qry[14], $qry[15], $qry[16], $qry[17], $qry[18], $qry[19], $qry[20], $qry[21], $qry[22], $qry[23], $qry[24], $qry[25], $qry[26], $qry[27], $qry[28], $qry[29], $qry[30], 1, '".date("Y-m-d")."')"))*/

	$save='<font color=#336600>Successful</font>';
else
	$save='<font color=#CC3300>Failed</font>';
}

//include("../field_title.php");


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
		//mode : "textareas",
		mode : "specific_textareas",
        editor_selector : "mceEditor",
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
function check_form()
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
	<tr>
	  <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle" style="text-transform:uppercase;">ADD <?php echo $current_template_set['maincat_name']?></td>
	</tr>

      
     <?php if($field_set!=''){?>
     
	<form name="form1" method="post" action="postTemplate.php?m=<?php echo $_GET['m']?>" enctype="multipart/form-data">
	<tr><td><span class="red">* Required Fields</span></td></tr>
	<tr>
	  <td colspan="2" align="left" class="main_title">
	<?php echo $save;?>
		</td>
	  </tr>
           
	<?php do{?>
    
     <tr valign="top">
		<th align="right" bgcolor="#EFEFEF" class="main_title">
        
			<?php if($field_set['field_name']!=''){ echo $field_set['field_name'];}?>
			<?php if($field_set['field_remark']!=''){ echo "<br><span class=\"red02\">".$field_set['field_remark']."</span>";}?>
            
            
        </th>
		 <td align="left" class="content">
		<?php if($field_set['field_type']=='file'||$field_set['field_type']=='file02'){?> 
        	<?php if($field_set['field_type']=='file'){?>
            <img name="thisImage1" id="thisImage1" src="../images/no_photo.gif" ><br><?php }?>
            <input name="<?php echo $field_set['table_field']?>" type="file" class="content" onChange="javascript:findItem('thisImage1').src = findItem('photo1').value;"><input type="hidden" name="<?php echo "file".$field_set['table_field']?>" value="<?php echo $field_set['table_field']?>">
         
             
         <?php }elseif($field_set['field_type']=='text'||$field_set['field_type']=='position'||$field_set['field_type']=='price'){?> 
           
           <?php if($field_set['field_type']=='price'){?><?php echo "<span class=\"red02\">".$field_set['price_currency']."</span>"?><?php }?>
            <input name="<?php echo $field_set['table_field']?>" type="text"<?php if($field_set['field_limit']!=''){?> maxlength="<?php echo $field_set['field_limit']?>"<?php }?>>
             <?php if($field_set['field_type']=='price'){?><?php echo "<span class=\"red02\">".$field_set['price_note']."</span>"?><?php }?>
         <?php }elseif($field_set['field_type']=='textarea'){?> 
            <textarea name="<?php echo $field_set['table_field']?>" rows="5" cols="50"<?php if($field_set['field_limit']!=''){?> maxlength="<?php echo $field_set['field_limit']?>"<?php }?>><?php echo $selected['description']?></textarea>
         <?php }elseif($field_set['field_type']=='tiny'){?> 
            <textarea name="<?php echo $field_set['table_field']?>" class="mceEditor" rows="15" cols="50"<?php if($field_set['field_limit']!=''){?> maxlength="<?php echo $field_set['field_limit']?>"<?php }?>></textarea>
        <?php }?> 
        </td>        
	</tr>	

     <?php }while($field_set= mysqli_fetch_assoc($field_query));?>
    
	<tr>
	  <th align="right" class="content">&nbsp;</th>
	  <td class="content">&nbsp;</td>
	  </tr>
	<tr>
	<td>&nbsp;</td>
	<td align="left">
	<input type="submit" name="submit" value="Submit" onClick="return check_form();">&nbsp;<input type="reset" name="reset" value=" Reset ">
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	</form>      
	 
	 
	 <?php }else{?>
     
      <tr>
        <td colspan="2" align="center" class="red"><br><br><br><br><br><br><br>field undefine<br><br><br><br><br><br></td>
      </tr>
     <?php }?>
    

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
<div id="Layer1" style="position:absolute; width:200px; height:37px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
