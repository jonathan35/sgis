<?php 
require_once('../Connections/pamconnection.php'); 
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	
	if($_POST['submit']=='Submit')
	{
		if($_FILES['xxx']!='')
		{
			$file_source = $HTTP_POST_FILES['xxx']['tmp_name']; 
			$type = $HTTP_POST_FILES['xxx']['type']; 
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
				$file="../".$file;
				if ( move_uploaded_file($file_source, $file ) ) 
				{
				$file="../".$file;
				if(mysqli_query($conn, "insert into tiny_photo_gallery (id, photo1, status) values ('', '$file', 1)"))
				$save="true";
				else $save="false";
				} 
			}
		}	
	}
		
		//*************************************************Manage Country*************************************************
	$today=date("Y-m-d");
	
	$temp_query_Recordset1 = "SELECT * FROM tiny_photo_gallery WHERE status=1";					 
	$temp_Recordsetexist = mysqli_query($conn, $temp_query_Recordset1) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist);
	
	do
	{
		if($_POST[$row_Rs1['id']]=="Not Display")
		{	
			$this_host_product_id=$row_Rs1['id'];
			$insertSQL1 = "UPDATE tiny_photo_gallery SET 
			status='0' WHERE id='$this_host_product_id'"; 
			
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist));
	
	$temp_query_Recordset2 = "SELECT * FROM tiny_photo_gallery WHERE status=0";					 
	$Rs1 = mysqli_query($conn, $temp_query_Recordset2) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);
	
	do
	{
		if($_POST[$row_Rs1['id']]=="Display")
		{	
			$this_host_product_id=$row_Rs1['id']; 
			$insertSQL1 = "UPDATE tiny_photo_gallery SET 
			status='1' WHERE id='$this_host_product_id'"; 
			//echo $insertSQL1;
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	//Change Status - End
	
	//Delete Testimonial - Start
	$items_delete_array=$_POST['productIdList'];
	
if($_POST['delete']=="Delete")
{
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$ssss = mysqli_query($conn, "select photo1 from tiny_photo_gallery where id='".$items_delete."' ");
			$asdss= mysqli_fetch_assoc($ssss);
			$myFile = str_replace("../../photo/","../photo/",$asdss['photo1']);
			if(file_exists($myFile)){
			@unlink($myFile);
			}			
			
			$del_data="UPDATE tiny_photo_gallery SET status='-1' WHERE id='".$items_delete."'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}

if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="")
{
		$query="SELECT * FROM tiny_photo_gallery WHERE status=1 ORDER BY id DESC";
}
else if($_GET['tab']=="approvednotondisplay")
{
		$query="SELECT * FROM tiny_photo_gallery WHERE status=0 ORDER BY id DESC";
}

	$currentPage = $_SERVER["PHP_SELF"];	
	$maxRows_Rs1 = 12;
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
	
	$query2=mysqli_query($conn, "SELECT * FROM tiny_photo_gallery WHERE status=0 and photo1!='' ");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM tiny_photo_gallery WHERE status=1 and photo1!=''");
	$total_testimonial_on_display = mysqli_num_rows($query);
	

?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" src="js/bbcode.js"></script>
<script language="JavaScript" src="js/validate.js"></script>
<script language="JavaScript" src="js/message.js"></script>
<script language="javascript" src="js/menuAtNews.js"></script>
<title>CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/component.css" rel="stylesheet" type="text/css">
<link href="css/font.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
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
	if(document.form1.file.value==""&&document.form1.file2.value==""&&document.form1.file3.value==""&&document.form1.file4.value==""&&document.form1.file5.value=="")
	{
		alert("Please browse the Image.");
		document.form1.file.focus();
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

<body>
<table width="630" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
      <div align="left">
        <div id="title">
          <div id="titlename"><span class="white_title">IMAGE</span></div>
          <div class="shadow"></div>
        </div>
    </div></td>
  </tr>
  <tr>
    <td align="left" valign="top"></td>
    <td rowspan="4" align="center" valign="top">
      <!--main category -->
      <table width="630" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td height="288" align="left" valign="top"><table width="630" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">
                      <table width="100%" align="left" cellpadding="2"  cellspacing="3" border="0">
                        <form name="form1" method="post" action="tinyPhotoGallery.php" enctype="multipart/form-data" id="form1" style="margin-bottom:0px; ">
                          <tr>
                            <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">ADD IMAGE </td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left" class="main_title">
                              <?php if($save=='true')
echo '<font color="#336600">Image is successfully uploaded</font>';
elseif($save=='false')
echo '<font color="#CC3300">Failed to upload Image</font>';
?>
                            </td>
                          </tr>
                          <tr>
                            <th width="41%" align="right" valign="top" bgcolor="#EFEFEF" class="content">Upload a photo <br>
                            </th>
                            <td width="59%"><img src="images/no_photo.gif" name="image" id="image"><br>
                                <input type="file" name="xxx" onChange="findItem('image').src = findItem('file').value">
                                <br>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left">
                              <input type="submit" name="submit" value="Submit" onClick="return check();">
                &nbsp;
                              <input type="reset" name="reset2" value=" Reset ">
                            </td>
                          </tr>
                        </form>
                    </table>
				</td>
              </tr>
              <tr>
                <td>
                  <table width="630" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE IMAGES</span></td>
                    </tr>
                    <tr>
                      <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
                          <tr>
                            <td width="636" height="244" align="left" valign="top"><div align="left">

                                <?php 
			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>
                                <!--On Display-->
                                <form name="form2" method="post" action="tinyPhotoGallery.php?tab=approvedondisplay">
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
                                      <li class="current"><a href="tinyPhotoGallery.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (
                                            <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                                        0
                                        <?php }?>
                                        )</a></li>
                                      <li class=""><a href="tinyPhotoGallery.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (
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
                                  </span></div>
                                  <table border="0" cellpadding="4" cellspacing="1" width="100%">
                                    <tr bgcolor="#CCCCCC">
                                      <th width="5%" class="content">
                                        <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                                      </th>
                                      <th width="15%" class="content">On Display</th>
                                      <th width="44%" class="content">Image</th>
                                      <th width="36%" class="content">Image URL<br>
                                      <span class="red">Copy the following URL and paste it on Insert Image Panel </span></th>
                                      <!--th width="13%" class="content" align="center">Edit</th-->
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
							{if($row_Rs1['photo1']!=''){
				if($count%2==0)
				$bgcolor='#E6E6E6';
				else
				$bgcolor='#FFFFFF';
				?>
                                    <tr bgcolor="<?php echo $bgcolor;?>">
                                      <th width="5%" class="content">
                                        <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">
                                        <br />                                      </th>
                                      <!--onClick="return displayProduct();"-->
                                      <td width="15%" class="content" align="center">
                                      <input type="submit" name="<?php echo $row_Rs1['id']; ?>" value="Not Display" title="Not Display This Product At Your Online List"/>                                      </td>

                                      
                                      <td align="left">
                                      <?
									  @list($width, $height, $type, $attr) = getimagesize(str_replace("../../","../",$row_Rs1['photo1']));
									  
									  if($height>=85){
										 $measure.$row_Rs1['id'] = "height=85";
									  }elseif($width>=200){
										 $measure.$row_Rs1['id'] = "width=200";
									  }
									  ?>                                      
                                      <img src="<?php echo str_replace("../../","../",$row_Rs1['photo1']);?>" <?php echo $measure.$row_Rs1['id']?> ></td>
                                        <td align="left" class="red">
                                        <input type="text" name="textarea" style="width:200px;" value="<?php echo $row_Rs1['photo1'];?>"></td>  
                                   </tr>
                                    <?php  $count++;
						 }} while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                                    <tr>
                                      <th width="5%"></th>
                                      <td colspan="3" class="content">No Record Found.</td>
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
                                      <td colspan="5">&nbsp; </td>
                                    </tr>
                                  </table>
                                </form>
                                <span class="content">
                                <!--On Display End-->
                                <?php } else if($_GET['tab']=="approvednotondisplay") { ?>
                                <!--Not On Display-->
                                </span>
                                <form name="ProductListForm2" method="post" action="tinyPhotoGallery.php?tab=approvednotondisplay">
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
                                      <li class=""><a href="tinyPhotoGallery.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display(
                                            <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                                        0
                                        <?php }?>
                                        )</a></li>
                                      <li class="current"><a href="tinyPhotoGallery.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (
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
                                  </div>
                                  <table border="0" cellpadding="4" cellspacing="1" width="100%">
                                    <tr bgcolor="#CCCCCC">
                                      <th width="5%" class="content">
                                        <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                                      </th>
                                      <th width="11%" class="content">Not On Display</th>
                                      <th width="45%" class="content">Image</th>
                                      <th width="39%" class="content">Image<br>
                                      <span class="red">Copy the following URL and paste it on Insert Image Panel </span></th>
                                      <!--<th width="6%">Edit</th>-->
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
                                      <th width="5%" class="content">
                                        <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">
                                        <br />                                      </th>
                                      <!--onClick="return displayProduct();"-->
                                      <td width="11%" class="content" align="center">
                                      <input type="submit" name="<?php echo $row_Rs1['id']; ?>" value="Display" title="Display This Product At Your Online List"/>                        </td>

                                      <td align="left">
                                      <?
									  list($width, $height, $type, $attr) = getimagesize(str_replace("../../","../",$row_Rs1['photo1']));
									  
                                      if($height>=85){
										 $measure.$row_Rs1['id'] = "height=85";
									  }elseif($width>=200){
										 $measure.$row_Rs1['id'] = "width=200";
									  }
									  ?>                                      
                                      <img src="<?php echo str_replace("../../","../",$row_Rs1['photo1']);?>" <?php echo $measure.$row_Rs1['id']?>></td>
                                     <td align="left" class="red">
                                        <input type="text" name="textarea" style="width:200px;" value="<?php echo $row_Rs1['photo1'];?>"></td> 
                                    </tr>
                                    <?php  $count++;
													 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
												}
												else
												{ ?>
                                    <tr>
                                      <th width="5%"></th>
                                      <td colspan="3" class="content">No Record Found.</td>
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
                                      <td colspan="5">&nbsp; </td>
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
          </table></td>
        </tr>
        <tr>
          <td valign="bottom" class="style3" colspan="2">
            <table width="100%"  border="0" class="greybg">
              <tr>
                <td height="26"><div align="center" class="style3">&copy;Copyright of WebAndYou<br>
                    contact web and you <a href="mailto:support@webnyou.com">project administrator </a>for further assistance. </div></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <!--third category chck-->
    </td>
  </tr>
</table>
</body>
</html>
