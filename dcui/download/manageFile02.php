<?php require_once('../../Connections/pamconnection.php'); 
	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	$today=date("Y-m-d");
	
	$temp_query_Recordset1 = "SELECT * FROM file_upload WHERE status=1";					 
	$temp_Recordsetexist = mysqli_query($conn, $temp_query_Recordset1) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist);
	
	do
	{
		if($_POST[$row_Rs1['file_id']]=="Not Display")
		{	
			$this_host_product_id=$row_Rs1['file_id'];
			$insertSQL1 = "UPDATE file_upload SET 
			status='0' WHERE file_id='$this_host_product_id'"; 
			
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist));
	
	$temp_query_Recordset2 = "SELECT * FROM file_upload WHERE status=0";					 
	$Rs1 = mysqli_query($conn, $temp_query_Recordset2) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);

	do
	{
		if($_POST[$row_Rs1['file_id']]=="Display")
		{	
			$this_host_product_id=$row_Rs1['file_id']; 
			$insertSQL1 = "UPDATE file_upload SET 
			status='1' WHERE file_id='$this_host_product_id'"; 
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
			$del_data="UPDATE file_upload SET status='-1' WHERE file_id='$items_delete'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}

if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="")
{
	if($_GET['sec']!='')
	{
		if($_GET['type']!='')
			$query="SELECT * FROM file_upload WHERE status=1 AND section='".$_GET['sec']."' and type='".$_GET['type']."' ORDER BY file ASC";
		else
			$query="SELECT * FROM file_upload WHERE status=1 AND section='".$_GET['sec']."' ORDER BY file_id DESC";
	}
	else	
		$query="SELECT * FROM file_upload WHERE status=1 ORDER BY file_id DESC";
}
else if($_GET['tab']=="approvednotondisplay")
{
	if($_GET['sec']!='')
	{
		if($_GET['type']!='')
			$query="SELECT * FROM file_upload WHERE status=0 AND section='".$_GET['sec']."' and type='".$_GET['type']."' ORDER BY file ASC";
		else
			$query="SELECT * FROM file_upload WHERE status=0 AND section='".$_GET['sec']."' ORDER BY file_id DESC";
	}
	else	
		$query="SELECT * FROM file_upload WHERE status=0 ORDER BY file_id DESC";
}

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
	
	$query2=mysqli_query($conn, "SELECT * FROM file_upload WHERE status=0");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM file_upload WHERE status=1");
	$total_testimonial_on_display = mysqli_num_rows($query);

?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CMS</title>
<script language="JavaScript" src="../js/bbcode.js"></script>
<script language="JavaScript" src="../js/validate.js"></script>
<script language="JavaScript" src="../js/message.js"></script>
<script src="../js/menuAtNews.js" type="text/javascript" language="javascript"></script>
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
function jumpMenu(target,selObj,restore){ 
  if (selObj.selectedIndex>0 && selObj.options[selObj.selectedIndex].value != ''){
    window.open(selObj.options[selObj.selectedIndex].value,target);}
  else if(selObj.options[selObj.selectedIndex].value == '')  {selObj.selectedIndex=0;}
  if (restore) selObj.selectedIndex=0;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="Layer1" style="position:absolute; width:200px; height:34px; z-index:1; left: 696px; top: 4px;">
	<table width="200" cellspacing="2" cellpadding="2">
	  <tr>
		<td class="main_title">| <a href="../authentication/logout2.php" class="style17"> Sign Out</a> |</td>
	  </tr>
	</table>
  </div>
<table width="799" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2"><div align="left"><img src="../images/cmservice.jpg" width="800" height="50"></div></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">
			  

			  
</td>
  </tr>
  <tr>
    <td align="left" valign="top" colspan="5">
          <div id="title">
            <div id="titlename"></div>
        </div>	
	</td>
  </tr>
  <tr>
    <td width="169" align="left" valign="top">
	<!--menu-->
	<?php include("../menu.php");?>
	<!--menu-->	
	</td>
    <td rowspan="2" align="left" valign="top"><table width="630" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE  FILE </span> </td>
      </tr>
      <tr>
        <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
          <tr>
            <td width="636" height="244" align="left" valign="top"><div align="left">
              <!--<div class="floatright">
                <span class="main_title">
                <input name="button" type="button" onclick="window.location.href='createTestimonial.php'" value="Post New">
                </span></div>-->
              <table width="100%" border="0" cellpadding="2" cellspacing="2" class="content" id="data">
                <tr>
                  <td width="52%" align="left"><a href="manageFile.php?tab=approvedondisplay">Approved - On Display</a></td>
                  <td width="48%"><?php echo $total_testimonial_on_display; ?></td>
                </tr>
                <tr>
                  <td align="left"><a href="manageFile.php?tab=approvednotondisplay">Approved - Not On Display</a></td>
                  <td><?php echo $total_testimonial_not_on_display; ?></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <br>
              <?php 
			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>              
              <!--On Display-->
              <form name="ProductListForm1" method="post" action="manageFile.php?tab=approvedondisplay">
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
                    <li class="current"><a href="manageFile.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display</a></li>
                    <li class=""><a href="manageFile.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display</a></li>
                  </ul>
                </div>
                <div class="function"> <span class="content">Select
				    <input type="checkbox" name="checkbox" value="checkbox" checked disabled> 
				    to:
                    <input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)">
                </span></div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="6%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">
                    </th>
                    <th class="content">On Display</th>
                    <th width="54%" class="content">Uploaded Files </th>
                    <th width="17%" class="content" align="center">Edit</th>
                    <!--<th width="6%">Edit</th>-->
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
							{ 
					?>
                  <tr>
                    <th width="6%" class="content">
                      <input type="checkbox" value="<?php echo $row_Rs1['file_id']; ?>" name="productIdList[]">
                        <br />
                    </th>
                    <!--onClick="return displayProduct();"-->
                    <td width="23%" class="content">
                      <input type="submit" name="<?php echo $row_Rs1['file_id']; ?>" value="Not Display" title="Not Display This Product At Your Online List"/>                      </td>
					<td class="content"><?php echo $row_Rs1['subject']; ?></td>
                    <td class="content" align="center"><a href="editFile.php?file=<?php echo $row_Rs1['file_id']?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a></td>
                  </tr>
                  <?php
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="6%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
						}
					}
					else
					{ ?>
                  <tr>
                    <th width="6%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
				<tr><td colspan="5">&nbsp;
				  	</td>
				</tr>				  				  
                </table>
              </form>
              <span class="content">
              <!--On Display End-->
              <?php } else if($_GET['tab']=="approvednotondisplay") { ?>
              <!--Not On Display-->
              </span>
              <form name="ProductListForm2" method="post" action="manageFile.php?tab=approvednotondisplay">
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
                    <li class=""><a href="manageFile.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display</a></li>
                    <li class="current"><a href="manageFile.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display</a></li>
                  </ul>
                </div>
                <div class="content"> Select 
				    <input type="checkbox" name="checkbox" value="checkbox" checked disabled> 
				    to:
                    <input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />
                </div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="10%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">
                    </th>
                    <th width="19%" class="content">Not On Display</th>
                    <th width="54%" class="content">Uploaded Files </th>
                    <th width="17%" class="content" align="center">Edit</th>
                    <!--<th width="6%">Edit</th>-->
                  </tr>
                  <?php
					if($row_Rs1!='')
					{											
						if($row_Rs1!='')
						{
							do
							{ 
				?>
                  <tr>
                    <th width="10%" class="content">
                      <input type="checkbox" value="<?php echo $row_Rs1['file_id']; ?>" name="productIdList[]">
                        <br />
                    </th>
                    <!--onClick="return displayProduct();"-->
                    <td width="19%" class="content">
                      <input type="submit" name="<?php echo $row_Rs1['file_id']; ?>" value="Display" title="Display This Product At Your Online List"/>
                    </td>
                    <td class="content"><?php echo $row_Rs1['subject']; ?></td>
                    <td class="content" align="center"><a href="editFile.php?file=<?php echo $row_Rs1['file_id']?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a></td>
                  </tr>
                  <?php
													 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
												}
												else
												{ ?>
                  <tr>
                    <th width="10%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
												}
											}
											else
											{ ?>
                  <tr>
                    <th width="10%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
				<tr><td colspan="5">&nbsp;
				  	</td>
				</tr>				  
                </table>
              </form>
              <!--Not On Display End-->
              <?php } ?>
              <!--End-->
              </div>
            </td>
          </tr>
		<tr><td colspan="4"><div align="left" class="content">
        <?php if ($totalRows_Rs1 > 0 ) { ?> 
			  &nbsp;Total Records <?php echo ($startRow_Rs1 + 1) ?> to <?php echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1) ?> of <?php echo $totalRows_Rs1 ?> <br>
				&nbsp;<a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, 0, $queryString_Rs1); ?>">First</a> 
				<a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, max(0, $pageNum_Rs1 - 1), $queryString_Rs1); ?>">| Previous</a> | 
				<a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, min($totalPages_Rs1, $pageNum_Rs1 + 1), $queryString_Rs1); ?>">Next</a> 
				<a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, $totalPages_Rs1, $queryString_Rs1); ?>">| Last</a> |
        <?php } ?></div></td></tr>			  		  
          <tr>
            <td height="45" valign="bottom" class="style3"><div align="center">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="greybg">
                  <tr>
                    <td height="26"><div align="center" class=""><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="1">&copy;Copyright of WebAndYou <br>
        Contact Web And You <a href="mailto:chong@webnyou.com">project administrator </a>for further assistance. </font></b></font></b></font></b></font></div></td>
                  </tr>
                </table>
            </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

