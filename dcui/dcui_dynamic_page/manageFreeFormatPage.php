<?php 
require_once('../../Connections/pamconnection.php');  
session_start();
	if($_SESSION['dcui_validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
//******************************************Add Country*************************************************
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
			}
			if (( $file != '' ) )
			{    
				$file="../../".$file;
				if ( move_uploaded_file($file_source, $file ) ) 
				{
				$save="true";}	
				else {$save="false";			
				} 
			}
		}	
		
		$file=$file;
		$file= str_replace ("../../","",$file);
		$maincat=mysqli_real_escape_string($conn, $_POST['maincatname']);
		$url_file=mysqli_real_escape_string($conn, $_POST['url_file']);
		
		
	
		if(mysqli_query($conn, "INSERT INTO murum_section (maincat_id, photo, section_type, url_file, maincat_name, status, date_posted) VALUES ('', '$file', 2,  '".$url_file."', '".$maincat."', 1, '".date('Y-m-d')."')"))		
			$success='<font color="#336600">category added</font>';
		else
			$success='<font color="#CC3300">Failed to add category</font>';
	}
//*************************************************Manage Country*************************************************

if($_POST['update']=='Save'){
	$free_template=mysqli_real_escape_string($conn, $_POST['free_template']);
	$del_data=mysqli_query($conn, "update dcui_section_cpanel set record='".$free_template."' where id=21 ");
}
	$free_template_query = mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE status=1 and id=21");
	$free_template_set = mysqli_fetch_assoc($free_template_query);


if($_POST['update']=='Save & Sort'){	
	$items_delete_array = $_POST['productIdListUpdate'];
	
	if(!empty($_POST['productIdListUpdate']))
	{
		foreach($items_delete_array as $items_update)
		{	 
			$position_value = $_POST['position'.$items_update];
			$mcat_name = $_POST['maincat_name'.$items_update];
			$url_value = $_POST['url'.$items_update];
			$section_type_value = $_POST['section_type'.$items_update];
			
			
			$del_data=mysqli_query($conn, "update murum_section set position='".$position_value."',url_file='".$url_value."',section_type='".$section_type_value."', maincat_name='".$mcat_name."' where maincat_id='".$items_update."'");
				
		}
	}
}
		
if($_POST['display']=='Unactivate'){	
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$del_data="update murum_section set status='-1' where maincat_id='$items_delete'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}
if($_POST['display']=='Activate'){	
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$del_data="update murum_section set status='1' where maincat_id='$items_delete'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}
if($_POST['update']=='Lock'){	
	$items_lock_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_lock_array as $items_lock)
		{
			$del_data="update murum_section set lock_status='true' where maincat_id='".$items_lock."'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}
if($_POST['update']=='Unlock'){	
	$items_lock_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_lock_array as $items_lock)
		{
			$del_data="update murum_section set lock_status='' where maincat_id='".$items_lock."'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}


if($_POST['delete']=="Delete")
{		
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			mysqli_query($conn, "DELETE FROM murum_section WHERE maincat_id='".$items_delete."' ");
		}
	}
}

if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="")
{
		$query="SELECT * FROM murum_section WHERE status=1 ORDER BY position ASC, maincat_name ASC";
}
else if($_GET['tab']=="approvednotondisplay")
{
		$query="SELECT * FROM murum_section WHERE status=-1 ORDER BY position ASC, maincat_name ASC";
}

	$currentPage = $_SERVER["PHP_SELF"];	
	$maxRows_Rs1 = 30;
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
	
	$query2=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=-1");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1");
	$total_testimonial_on_display = mysqli_num_rows($query);
	
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
	if(form1.maincatname.value=="")
	{
		alert("Please enter main category.");
		form1.maincatname.focus();
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


function deleteProduct5()
				{
						var id= new Array('productIdListUpdate[]');
						if(id=='')
						{
							alert("No Item Selected");
							return false;
						}
						return true;
					}

}

</script>
<script language="JavaScript">
function chkAll(frm, arr, mark)
{
  for (i = 0; i <= frm.elements.length; i++)
  {
   try
   {
     if(frm.elements[i].name == arr)
	 {
       frm.elements[i].checked = mark;
     }
   } catch(er) {}
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
            <div class="white_title" id="titlename">FIRST SECTION</div>
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
    <td>
      <table width="630" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE FREE FORMAT PAGE</span></td>
        </tr>
  <form name="form1" method="post" action="manageFreeFormatPage.php" enctype="multipart/form-data">
  <tr>
    <td>
  <div style=" border:1px #9C0 solid; padding:2px; margin:10px 3px 10px 3px; background-color:#EFFED8" class="content">
  &nbsp;<img src="../images/tiny_edit.png"  style="vertical-align:middle" title="Pre-Design">&nbsp;
Max. free format page allowed &nbsp;
<input type="text" name="free_template" value="<?php echo $free_template_set['record']?>" style="width:50px;"> <input type="submit" name="update" value="Save" title="Limit the free format section" ></div>              
    </td>
  </tr>
</form>        
        
        <tr>
          <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
              <tr>
                <td width="636" height="244" align="left" valign="top"><div align="left">
                    <?php 
			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>
                    <!--On Activate-->
                    <form name="form2" method="post" action="manageFreeFormatPage.php?tab=approvedondisplay">
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
              
              
                      <div id="tab">
                        <ul>
                          <li class="current"><a href="manageFreeFormatPage.php?tab=approvedondisplay" title="Activate Product Item Online" class="content">Activated (
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                          <li class=""><a href="manageFreeFormatPage.php?tab=approvednotondisplay" title="Not Activate Product Item Online" class="content">Unactivated (
                                <?php if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                        </ul>
                      </div>

        
                      <div class="function"> <span class="content">Select
                            <input type="checkbox" name="checkbox" value="checkbox" checked disabled>
                        to:
                        <input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)">
                     &nbsp;
                     <input type="submit" name="display" value="Unactivate" onClick="return deleteProduct5();" title="Unactivate selected item(s)" style="width:90px; color:#333;"/>
&nbsp;
<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;">&nbsp;
<input type="submit" name="update" value="Lock" onClick="return deleteProduct5();" title="Lock item(s)" style="width:90px; color:#333;">&nbsp;
<input type="submit" name="update" value="Unlock" onClick="return deleteProduct5();" title="Unlock item(s)" style="width:90px; color:#333;">
                     
                     
                      </span></div>
                      <table border="0" cellpadding="4" cellspacing="1" width="100%">
                        <tr bgcolor="#CCCCCC">
                          <th width="8%" class="content">
                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>
                          <th width="37%" class="content"> Category </th>
                          <th width="18%" class="content" align="center">Level & Position </th>
                          <th width="20%" class="content" align="center"> Pre-define URL </th>
                          <th width="25%" class="content" align="center"> Section Type </th>
                        </tr>
                        <tr>
                          <td colspan="2"></td>
                        </tr>
                        <?php  $count=1;
					if($row_Rs1!='')
					{											
						if($row_Rs1!='')
						{
							do
							{?>
								
							
								
								<?php if(strlen($row_Rs1['position'])==1){ 
								
				if($count%2==0)
				$bgcolor='#E6E6E6';
				else
				$bgcolor='#FFFFFF';
				?>
                        <tr bgcolor="<?php echo $bgcolor;?>">
                          <td align="left" class="content" valign="top" colspan="3" style="padding-left:20px;">
                          
                          
                         
                          
                          
                          <div style="float:left; width:70%;">
                          <img src="../images/space.gif" width="1" height="21">
                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">
                          
                          <input type="checkbox" value="<?php echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" >&nbsp;
                          
                            <input type="text" name="<?php echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<?php echo $row_Rs1['maincat_name']; ?>" style="width:160px;"><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?> 
                            <?php if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><?php }?>
                            
                           </div><div style="float:right; width:23%;">
                            <input name="<?php echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:40px;"> 
                            </div>
                          </td>
                          <td><input name="<?php echo 'url'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['url_file'];?>" style="width:100px;"><?php if(!file_exists("../../".$row_Rs1['url_file']))echo "<span class=\"red\"> X</span>"?>
                            </td>
                          <td class="content01">
                          <label><input type="radio" name="<?php echo 'section_type'.$row_Rs1['maincat_id']?>" value="2" <?php if($row_Rs1['section_type']==2){?>checked<?php }?>>Pre-design</label><br>
                          <label><input type="radio" name="<?php echo 'section_type'.$row_Rs1['maincat_id']?>" value="1" <?php if($row_Rs1['section_type']==1){?>checked<?php }?>>Free Format</label></td>
                          
                          
                        </tr>
                        <?php  $count++;}?>
                        <?
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
							
					}
					else
					{ ?>
                        <tr>
                          <th width="8%"></th>
                          <td colspan="6" class="content">No Record Found.</td>
                          <!--<td></td>-->
                        </tr>
                        <?
						}
					}
					else
					{ ?>
                        <?php } ?>
                        <!--Empty Detection End-->
                        <tr>
                          <td colspan="5" class="red">D = Dynamic ; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S = Static </td>
                        </tr>
                      </table>
                    </form>
                    <span class="content">
                    <!--On Activate End-->
                    <?php } else if($_GET['tab']=="approvednotondisplay") { ?>
                    <!--Not On Activate-->
                    </span>
                    <form name="ProductListForm2" method="post" action="manageFreeFormatPage.php?tab=approvednotondisplay">
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
                      <div id="tab">
                        <ul>
                          <li class=""><a href="manageFreeFormatPage.php?tab=approvedondisplay" title="Activate Product Item Online" class="content">Activated (
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                          <li class="current"><a href="manageFreeFormatPage.php?tab=approvednotondisplay" title="Not Activate Product Item Online" class="content">Unactivated (
                                <?php if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                        </ul>
                      </div>
                      <div class="content"> Select
                          <input type="checkbox" name="checkbox" value="checkbox" checked disabled>
                        to:
                        <input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />
                      &nbsp;
                     <input type="submit" name="display" value="Activate" onClick="return deleteProduct3();" title="Activate selected item(s)" style="width:90px; color:#333;"/>
&nbsp;
<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;">&nbsp;
<input type="submit" name="update" value="Lock" onClick="return deleteProduct5();" title="Lock item(s)" style="width:90px; color:#333;">&nbsp;
<input type="submit" name="update" value="Unlock" onClick="return deleteProduct5();" title="Unlock item(s)" style="width:90px; color:#333;">
                      
                      
                      </div>
                      <table border="0" cellpadding="4" cellspacing="1" width="100%">
                        <tr bgcolor="#CCCCCC">
                          <th width="8%" class="content">
                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>
                          <th width="37%" class="content"> Category </th>
                          <th width="18%" class="content" align="center">Level & Position </th>
                          <th width="20%" class="content" align="center"> Pre-define URL </th>
                          <th width="25%" class="content" align="center"> Section Type </th>
                        </tr>
                        <tr>
                          <td colspan="2"></td>
                        </tr>
                        <?php  $count=1;
					if($row_Rs1!='')
					{											
						if($row_Rs1!='')
						{
							do
							{
				if($count%2==0)
				$bgcolor='#E6E6E6';
				else
				$bgcolor='#FFFFFF';
				?>
                        <tr bgcolor="<?php echo $bgcolor;?>">
                          <td align="left" class="content" valign="top" colspan="3" style="padding-left:20px;">
                          
                          
                         
                          
                          
                          <div style="float:left; width:70%;">
                          <img src="../images/space.gif" width="1" height="21">
                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">
                          
                          <input type="checkbox" value="<?php echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" >&nbsp;
                          
                            <input type="text" name="<?php echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<?php echo $row_Rs1['maincat_name']; ?>" style="width:160px;"><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?> 
                            <?php if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><?php }?>
                           </div><div style="float:right; width:23%;">
                            <input name="<?php echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:40px;"> 
                            </div>
                          </td>
                          <td><input name="<?php echo 'url'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['url_file'];?>" style="width:100px;"><?php if(!file_exists("../../".$row_Rs1['url_file']))echo "<span class=\"red\"> X</span>"?>
                            </td>
                          <td class="content01">
                          <label><input type="radio" name="<?php echo 'section_type'.$row_Rs1['maincat_id']?>" value="2" <?php if($row_Rs1['section_type']==2){?>checked<?php }?>>Free Format</label><br>
                          <label><input type="radio" name="<?php echo 'section_type'.$row_Rs1['maincat_id']?>" value="1" <?php if($row_Rs1['section_type']==1){?>checked<?php }?>>Pre-design</label></td>
                          
                          
                        </tr>
                        <?php  $count++;
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                        <tr>
                          <th width="5%"></th>
                          <td colspan="6" class="content">No Record Found.</td>
                          <!--<td></td>-->
                        </tr>
                        <?
						}
					}
					else
					{ ?>
                        <?php } ?>
                        <!--Empty Detection End-->
                        <tr>
                          <td colspan="5" class="red">D = Dynamic ; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S = Static </td>
                        </tr>
                      </table>
                    </form>
                    <!--Not On Activate End-->
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
<div id="Layer1" style="position:absolute; width:200px; height:42px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
