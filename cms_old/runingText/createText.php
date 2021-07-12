<?php 
require_once('../../Connections/pamconnection.php'); 
require_once('../../pro/security.php');
session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
//*************************************************Edit Country*************************************************
		$temp_query_Recordset = "SELECT * FROM runing_text";					 
		$temp_Recordsetexist = mysqli_query($conn, $temp_query_Recordset) or die(mysqli_error());
		$row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist);
		do
		{
			if($_POST['update'.$row_Rs1['album_id']]==" Update ")
			{	
				$id_data=mysqli_real_escape_string($conn, $row_Rs1['album_id']);
				$insertSQL1 = "UPDATE runing_text SET album_name='".$defenders->escapeInjection($_POST['album_name'.$row_Rs1['album_id']])."', 
									position='".$defenders->escapeInjection($_POST['position'.$row_Rs1['album_id']])."' WHERE album_id='$id_data'"; 
				mysqli_select_db($conn, $database_pamconnection);
				$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
				$success1='<font color="#336600">Category Album</font>';
			}else
				$success1='<font color="#CC3300">failed to update Album</font>';
		} while($row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist));	
	
	$album_query=mysqli_query($conn, "SELECT album_name FROM runing_text WHERE status!=-1 ORDER BY album_name");
	$album_set=mysqli_fetch_assoc($album_query);

	$selected_section_query=mysqli_query($conn, "SELECT * FROM runing_text WHERE album_id='".$defenders->escapeInjection($_GET['id'])."' ");
	$selected_section_set=mysqli_fetch_array($selected_section_query);
	
	
//******************************************Add Country*************************************************
	if($_GET['add']=='save'){
	if($_POST['submit']==' Submit ')
	{
		$album=mysqli_real_escape_string($conn, $_POST['albumname']);
	
		if(mysqli_query($conn, "INSERT INTO runing_text (album_id, album_name, status, date_posted) VALUES ('', '$album', 1, '".date('Y-m-d')."')"))		
			$success='<font color="#336600">category added</font>';
		else
			$success='<font color="#CC3300">Failed to add category</font>';
	}
	$album_query=mysqli_query($conn, "SELECT album_name FROM runing_text WHERE status=1 ORDER BY album_name");
	$album_set=mysqli_fetch_assoc($album_query);
	}
//*************************************************Manage Country*************************************************
	$today=date("Y-m-d");
	
	
	
	
	///////////////display//////////////////////////////////////////////////////////////
	$temp_query_Recordset2 = "SELECT * FROM runing_text WHERE status=0";					 
	$Rs1 = mysqli_query($conn, $temp_query_Recordset2) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);

	do
	{
		if($_POST[$row_Rs1['album_id']]=="Display")
		{	
			$this_host_product_id=$row_Rs1['album_id']; 
			$insertSQL1 = "UPDATE runing_text SET 
			status='1' WHERE album_id='$this_host_product_id'"; 
			//echo $insertSQL1;
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	///////////////////////////////////display///////////////////////////////////////////
	
	$temp_query_Recordset1 = "SELECT * FROM runing_text WHERE status=1";					 
	$temp_Recordsetexist = mysqli_query($conn, $temp_query_Recordset1) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist);
	
	do
	{
		if($_POST[$row_Rs1['album_id']]=="Not Display")
		{	
			$this_host_product_id=$row_Rs1['album_id'];
			$insertSQL1 = "UPDATE runing_text SET 
			status='0' WHERE album_id='$this_host_product_id'"; 
			
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist));
	
	$temp_query_Recordset2 = "SELECT * FROM runing_text WHERE status=0";					 
	$Rs1 = mysqli_query($conn, $temp_query_Recordset2) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);
	
	do
	{
		if($_POST[$row_Rs1['album_id']]=="Display")
		{	
			$this_host_product_id=$row_Rs1['album_id']; 
			$insertSQL1 = "UPDATE runing_text SET 
			status='1' WHERE album_id='$this_host_product_id'"; 
			//echo $insertSQL1;
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	//Change Status - End
	
	//Delete Testimonial - Start
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$del_data="UPDATE runing_text SET status='-1' WHERE album_id='$items_delete'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}

if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="")
{
		$query="SELECT * FROM runing_text WHERE status=1 ORDER BY position ASC, album_name ASC";
}
else if($_GET['tab']=="approvednotondisplay")
{
		$query="SELECT * FROM runing_text WHERE status=0 ORDER BY position ASC, album_name ASC";
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
	
	$query2=mysqli_query($conn, "SELECT * FROM runing_text WHERE status=0");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM runing_text WHERE status=1");
	$total_testimonial_on_display = mysqli_num_rows($query);
	
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
function chkAll(frm, arr, mark){
  for (i = 0; i <= frm.elements.length; i++){
   try{
     if(frm.elements[i].name == arr){
       frm.elements[i].checked = mark;
     }
   } catch(er) {}
  }
}
function check()
{
	if(document.form1.albumname.value=="")
	{
		alert("Please add your running text in the provided field.");
		document.form1.albumname.focus();
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
            <div class="white_title" id="titlename"><span class="white_title">RUNNING TEXT</span></div></div>
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
        <form name="form1" method="post" action="createText.php?add=save" enctype="multipart/form-data">
          <tr>
            <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">CREATE RUNNING TEXT</td>
          </tr>
          <tr>
            <td colspan="2" class="main_title"><?php echo $success;?></td>
          </tr>
          <tr>
            <td colspan="2" class="red">* Required fields </td>
          </tr>
          <tr>
            <th width="35%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Add Text&nbsp;</th>
            <td><input type="text" name="albumname"></td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td align="left"><input type="submit" name="submit" value=" Submit " onClick="return check();">
              &nbsp;
              <input type="reset" name="reset" value=" Reset ">            </td>
          </tr>
        </form>
    </table></td>
  </tr>
  <tr>
    <td>
      <table width="630" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE RUNNING TEXT</span></td>
        </tr>
        <tr>
          <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
              <tr>
                <td width="636" height="244" align="left" valign="top"><div align="left">
                    <?php 
			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>
                    <!--On Display-->
                    <form name="form2" method="post" action="createText.php?tab=approvedondisplay">
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
                          <li class="current"><a href="createText.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                          <li class=""><a href="createText.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (
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
                          <th width="6%" class="content">
                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>
                          <th width="16%" class="content">On Display</th>
                          <th width="38%" class="content">Text</th>
                            <th width="14%" class="content" align="center">Position No. </th>
                          <th width="26%" class="content" align="center">Edit</th>
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
                          <th width="6%" class="content">
                            <input type="checkbox" value="<?php echo $row_Rs1['album_id']; ?>" name="productIdList[]">
                            <br />                          </th>
                          <!--onClick="return displayProduct();"-->
                          <td width="16%" class="content" align="center">
                            <input type="submit" name="<?php echo $row_Rs1['album_id']; ?>" value="Not Display" title="Not Display This Product At Your Online List"/>                          </td>
                          <td align="left" class="content"><input type="text" name="<?php echo 'album_name'.$row_Rs1['album_id'];?>" value="<?php echo $row_Rs1['album_name']; ?>" style="width:220px;">                         </td>
                          <td align="center"><input name="<?php echo 'position'.$row_Rs1['album_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:20px;" width="5"></td>
                          <td align="center"><input type="submit" name="<?php echo 'update'.$row_Rs1['album_id'];?>" value=" Update " onClick="return">&nbsp;
                                  <input type="reset" name="reset" value=" Reset "></td>
                        </tr>
                        <?php  $count++;
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                        <tr>
                          <th width="6%"></th>
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
                          <td colspan="5">&nbsp; </td>
                        </tr>
                      </table>
                    </form>
                    <span class="content">
                    <!--On Display End-->
                    <?php } else if($_GET['tab']=="approvednotondisplay") { ?>
                    <!--Not On Display-->
                    </span>
                    <form name="ProductListForm2" method="post" action="createText.php?tab=approvednotondisplay">
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
                          <li class=""><a href="createText.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display(
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                          <li class="current"><a href="createText.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (
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
                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>
                          <th width="16%" class="content">On Display</th>
                          <th width="39%" class="content">Text</th>
                            <th width="14%" class="content" align="center">Position No. </th>
                          <th width="26%" class="content" align="center">Edit</th>
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
                          <th width="5%" class="content">
                            <input type="checkbox" value="<?php echo $row_Rs1['album_id']; ?>" name="productIdList[]">
                            <br />                          </th>
                          <!--onClick="return displayProduct();"-->
                          <td width="16%" class="content" align="center">
                            <input type="submit" name="<?php echo $row_Rs1['album_id']; ?>" value="Display" title="Display This Product At Your Online List"/>                          </td>
                          <td align="left" class="content"><input type="text" name="<?php echo 'album_name'.$row_Rs1['album_id'];?>" value="<?php echo $row_Rs1['album_name']; ?>" style="width:220px;">                         </td>
                          <td align="center"><input name="<?php echo 'position'.$row_Rs1['album_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:20px;" width="5"></td>
                          <td align="center"><input type="submit" name="<?php echo 'update'.$row_Rs1['album_id'];?>" value=" Update " onClick="return">&nbsp;
                                  <input type="reset" name="reset" value=" Reset "></td>
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
<div id="Layer1" style="position:absolute; width:174px; height:28px; z-index:1; left: 740px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
