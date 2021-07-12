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
		if($_FILES['topbanner']!='')
		{
			$file_source = $HTTP_POST_FILES['topbanner']['tmp_name']; 
			$type = $HTTP_POST_FILES['topbanner']['type']; 
			$ext = substr(strrchr($type, "/"), 1); 

			switch ( $ext )
			{ 
				case 'pjpeg':
					$file = 'photo/'.uniqid('').'.jpg';
					break;			
				case 'jpg':
					$file = 'photo/'.uniqid('').'.jpg';
					break;		
				case 'jpeg': 
					$file = 'photo/'.uniqid('').'.jpg';
					break;
					
				case 'gif':
					$file = 'photo/'.uniqid('').'.gif';
					break;
				case 'png':
					$file = 'photo/'.uniqid('').'.png';
					break;
				
				case 'pdf':
				$file = 'photo/'.uniqid('').'.pdf';
				break;
		
				case 'vnd.ms-excel': 
				$file = 'photo/'.uniqid('').'.xls';
				break; 
	
				case 'msword': 
				$file = 'photo/'.uniqid('').'.doc';
				break; 		
					
					
			}
			if (($file != ''))
			{ 	
				if ( move_uploaded_file($file_source, "../../".$file ) ) 
				{
					$url_link = $_POST['url_link'];
					if(mysqli_query($conn, "INSERT INTO banner_announcement (banner_id, hyperlink_url, banner_file) VALUES ('', '".$url_link."', '$file')"))
						$success='yes';
					else
						$success='no';
				} 
				else 
				{		
					echo 'File could not be uploaded to server.<BR>';
				} 
			}
		}
	}
	
	
if($_POST['update']=='Save & Sort'){	
	$items_update_array = $_POST['productIdListUpdate'];
	
	if(!empty($_POST['productIdListUpdate']))
	{
		foreach($items_update_array as $items_update)
		{	 
			$position_value = $_POST['position'.$items_update];
			$url_value = $_POST['url'.$items_update];
			mysqli_query($conn, "update banner_announcement set position='".$position_value."', hyperlink_url='".$url_value."' where banner_id='".$items_update."'");
		}
	}
}
		
if($_POST['display']=='Hide'){	
	$items_hide_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_hide_array as $items_hide)
		{
			$del_data = $_POST['position'.$items_hide];
			mysqli_query($conn, "update banner_announcement set status='0' where banner_id='".$items_hide."'");
		}
	}
}
if($_POST['display']=='Display'){	
	$items_display_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_display_array as $items_display)
		{
			$del_data = $_POST['position'.$items_display];
			mysqli_query($conn, "update banner_announcement set status='1' where banner_id='".$items_display."'");
		}
	}
}

if($_POST['delete']=='Delete'){
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$ssss = mysqli_query($conn, "select banner_file from banner_announcement where banner_id='".$items_delete."' ");
			$asdss= mysqli_fetch_assoc($ssss);
			$myFile = "../../".$asdss['banner_file'];
			if(file_exists($myFile)){
			@unlink($myFile);
			}				
			mysqli_query($conn, "DELETE FROM banner_announcement WHERE banner_id='".$items_delete."'");
		}
	}
}

if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="")
{
			$query="SELECT * FROM banner_announcement WHERE status=1 ORDER BY position asc, banner_id DESC";
}
else if($_GET['tab']=="approvednotondisplay")
{
			$query="SELECT * FROM banner_announcement WHERE status=0 ORDER BY position asc, banner_id DESC";
}

	$currentPage = $_SERVER["PHP_SELF"];	
	$maxRows_Rs1 = 10;
	$pageNum_Rs1 = 0;
	if(!empty($_GET['pageNum_Rs1'])) {
	  $pageNum_Rs1 = $_GET['pageNum_Rs1'];
	}
	$startRow_Rs1 = $pageNum_Rs1 * $maxRows_Rs1;
	
	$colname_Rs1 = "";
	mysqli_select_db($conn, $database_pamconnection);
	
	$query_limit_Rs1 = sprintf("%s LIMIT %d, %d", $query, $startRow_Rs1, $maxRows_Rs1);
	$Rs1 = mysqli_query($conn, $query_limit_Rs1) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);
	
	if(!empty($_GET['totalRows_Rs1'])) {
	  $totalRows_Rs1 = $_GET['totalRows_Rs1'];
	} else {
	  $all_Rs1 = mysqli_query($conn, $query);
	  $totalRows_Rs1 = mysqli_num_rows($all_Rs1);
	  
	}
	$totalPages_Rs1 = ceil($totalRows_Rs1/$maxRows_Rs1)-1;
	
	$queryString_Rs1 = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	  $params = explode("&", $_SERVER['QUERY_STRING']);
	  $newParams = array();
	  foreach ($params as $param) {
		if (stristr($param, "pageNum_Rs1") == false && 
			stristr($param, "totalRows_Rs1") == false) {
		  array_push($newParams, $param);
		}
	  }
	  if (count($newParams) != 0) {
		$queryString_Rs1 = "&" . htmlentities(implode("&", $newParams));
	  }
	}	
	
	$query2=mysqli_query($conn, "SELECT * FROM banner_announcement WHERE status=0");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM banner_announcement WHERE status=1");
	$total_testimonial_on_display = mysqli_num_rows($query);
	
	$posted_banner_count = $total_testimonial_not_on_display + $total_testimonial_on_display;
	
	

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
            <div id="titlename"><span class="white_title"> HOME - OUR NETWORK</span></div></div>
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
	  <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">Home - Our Network</td>
	</tr>
    <tr>
	  <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        
        <?php if($posted_banner_count>=6){?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="red" align="center"><br><br>
            Max. 6 banner allowed only, you can only add the new one after you delete some current existing banner.
            <br><br>
            </td>
          </tr>
        </table>
        <?php }else{?>    
    
        <table width="100%" align="left" cellpadding="0"  cellspacing="0" border="0">
          <form name="form1" method="post" action="postBannerwithLink.php" enctype="multipart/form-data" id="form">


          <tr>
            <td colspan="2" class="main_title"><?php if($success=='yes'){ echo '<font color=#006633>File Uploaded..!!</font><br><br>';}
				elseif($success=='no')
				{echo '<font color=#FF0000>Fail To Upload File..!!</font><br><br>';}?></td>
          </tr>
          <tr>
            <td colspan="2" class="red">* Required fields </td>
          </tr>           
           
            <tr valign="top">
              <th width="37%" align="right" bgcolor="#EFEFEF" class="content" style="padding:4px;">Upload Banner 
              </th>
              <td width="63%" style="padding:4px; padding-left:10px;"><input name="topbanner" type="file" class="content" size="40">
                <span class="red">
                <br>
                Recommended size: 250 X 90 pixel<br>
Format: jpg, gif, png</span></td>
            </tr>
            <tr valign="top">
              <th width="37%" align="right" bgcolor="#EFEFEF" class="content" style="padding:4px;">Hyperlink 
              </th>
              <td width="63%" style="padding:4px; padding-left:10px;"><input name="url_link" type="text" class="content" size="40">
                <span class="red">
                <br>Example: http://www.abc.com</span></td>
            </tr>            
            
            
            <tr>
              <td>&nbsp;</td>
              <td align="left" style="padding-left:10px;"><input type="submit" name="submit" value=" Submit " onClick="return check();">
                &nbsp;
                <input type="reset" name="reset" value=" Reset "><br><br></td>
            </tr>
          </form>
        </table>

        <?php }?>    
    
        </td>
      </tr>
      
<tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><table width="100%" align="left" cellpadding="0"  cellspacing="0">
          <tr>
            <td width="100%" height="244" align="left" valign="top"><div align="left">
              <?php 
			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>
              <!--On Display-->
              <form name="ProductListForm1" method="post" action="postBannerwithLink.php?tab=approvedondisplay">
                <script>
			  	function deleteProduct1()
				{
					var point = confirm("Are You Sure You Want To Delete?");
					if(point==true)
					{
						var id= new Array('productIdList[]');
						if(id=='')
						{
							alert("No Item Selected");
							return false;
						}
						return true;
					}
					else
					{
						return false;
					}
				}

			  </script>
                <div id="list">
                <div id="tab">
                  <ul>
                    <li class="current"><a href="postBannerwithLink.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (<?php echo $total_testimonial_on_display; ?>)</a> </li>
                    <li class=""><a href="postBannerwithLink.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (<?php echo $total_testimonial_not_on_display; ?>)</a></li>
                  </ul>
                </div>
                <div class="function"> <span class="content">Select
                  <input type="checkbox" name="checkbox" value="checkbox" checked disabled>
                  to:
                  <input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)">
                </span>
                &nbsp;
                     <input type="submit" name="display" value="Hide" onClick="return deleteProduct5();" title="Hide selected item(s)" style="width:90px; color:#333;"/>
&nbsp;
<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;">
                
                
                </div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="4%" class="content"> <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">
                    </th>
                    <th width="31%" class="content"><div align="center">Banner</div></th>
                    <th width="43%" class="content"><div align="center">Hyperlink</div></th>
                    <th width="22%" class="content" align="center">Position No.</th>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                  </tr>
                  <?php
					if($row_Rs1!='')
					{											
						if($row_Rs1!='')
						{
							do
							{ //list($width, $height)=getimagesize($row_Rs1['banner_file']);
					//$width=$width * 0.3;
					//$height=$height * 0.3;
					?>
                  <tr>
                    <th width="4%" class="content"> <input type="checkbox" value="<?php echo $row_Rs1['banner_id']; ?>" name="productIdList[]">
                     <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['banner_id'];?>"> <br />
                    </th>

                    <td align="center" class="content"><img src="<?php echo "../../".$row_Rs1['banner_file']?>" width="91" height="68"><br></td>
                   
                    <td class="content" align="center">
                    <input name="<?php echo 'url'.$row_Rs1['banner_id']?>" type="text" value="<?php echo $row_Rs1['hyperlink_url'];?>" style="width:200px;"><br></td>                   
                    <td class="content" align="center">
                    <input name="<?php echo 'position'.$row_Rs1['banner_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:50px;"><br></td>
                  </tr>
                  <?php
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="4%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
						}
					}
					else
					{ ?>
                  <tr>
                    <th width="4%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                </table>
              </form>
              <span class="content">
                <!--On Display End-->
                <?php } else if($_GET['tab']=="approvednotondisplay") { ?>
                <!--Not On Display-->
                </span>
              <form name="ProductListForm2" method="post" action="postBannerwithLink.php?tab=approvednotondisplay">
                <script>
			  	function deleteProduct2()
				{
						var id= new Array('productIdList[]');
						if(id=='')
						{
							alert("No Item Selected");
							return false;
						}
				
					var point=confirm("Are You Sure You Want To Delete?");
					if(point==true)
					{
						return true;
					}
					else
					{
						return false;
					}
					
				}

			  </script>
                <div id="list">
                <div id="tab">
                  <ul>
                    <li class=""><a href="postBannerwithLink.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (<?php echo $total_testimonial_on_display; ?>)</a></li>
                    <li class="current"><a href="postBannerwithLink.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (<?php echo $total_testimonial_not_on_display; ?>)</a></li>
                  </ul>
                </div>
                <div class="content"> Select
                  <input type="checkbox" name="checkbox" value="checkbox" checked disabled>
                  to:
                  <input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />
                &nbsp;
                     <input type="submit" name="display" value="Display" onClick="return deleteProduct5();" title="Display selected item(s)" style="width:90px; color:#333;"/>
&nbsp;
<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;"></div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="4%" class="content"> <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">
                    </th>
                    <th width="31%" class="content"><div align="center">Banner</div></th>
                    <th width="43%" class="content"><div align="center">Hyperlink</div></th>
                    <th width="22%" class="content" align="center">Position No.</th>
                  </tr>
                  <?php
					if($row_Rs1!='')
					{											
						if($row_Rs1!='')
						{
							do
							{ 
//list($width, $height)=getimagesize($row_Rs1['banner_file']);
//$width=$width * 0.3;
//$height=$height * 0.3;
				?>
                  <tr>
                    <th width="4%" class="content"> <input type="checkbox" value="<?php echo $row_Rs1['banner_id']; ?>" name="productIdList[]">
                     <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['banner_id'];?>"> <br />
                    </th>
                  
                    <td align="center" class="content"><img src="<?php echo "../../".$row_Rs1['banner_file']?>" width="91" height="68"></td>
                    <td class="content" align="center">
                    <input name="<?php echo 'url'.$row_Rs1['banner_id']?>" type="text" value="<?php echo $row_Rs1['hyperlink_url'];?>" style="width:200px;"><br></td>
                    <td class="content" align="center"><input name="<?php echo 'position'.$row_Rs1['banner_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:50px;"><br></td>
                  </tr>
                  <?php
													 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
												}
												else
												{ ?>
                  <tr>
                    <th width="4%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
												}
											}
											else
											{ ?>
                  <tr>
                    <th width="4%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                </table>
              </form>
              <!--Not On Display End-->
              <?php } ?>
              <!--End-->
            </div></td>
          </tr>
          <tr>
            <td colspan="4"><div align="left" class="content">
              <?php if ($totalRows_Rs1 > 0 ) { ?>
              &nbsp;Total Records <?php echo ($startRow_Rs1 + 1) ?> to <?php echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1) ?> of <?php echo $totalRows_Rs1 ?> <br>
              &nbsp;<a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, 0, $queryString_Rs1); ?>">First</a> <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, max(0, $pageNum_Rs1 - 1), $queryString_Rs1); ?>">| Previous</a> | <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, min($totalPages_Rs1, $pageNum_Rs1 + 1), $queryString_Rs1); ?>">Next</a> <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, $totalPages_Rs1, $queryString_Rs1); ?>">| Last</a> |
              <?php } ?>
            </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>      
      
      
      
    </table>

      
      
      </td>
	</tr>
	
	<tr><td>&nbsp;</td></tr>
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