<?php require_once('../../Connections/pamconnection.php'); 
	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
	
	
	
	
	$today=date("Y-m-d");
	
	
	if($_POST['update']=='Save & Update'){	
	
	
		$items_upate_array = $_POST['productIdListUpdate'];
		
		if(!empty($_POST['productIdListUpdate']))
		{
			foreach($items_upate_array as $items_update)
			{	 
				$category_check_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1");
				$category_check_set = mysqli_fetch_assoc($category_check_query);
				
				do{
					if($_POST[$category_check_set['maincat_id'].'category'.$items_update]!=''){
						$data_check.= mysqli_real_escape_string($conn, $_POST[$category_check_set['maincat_id'].'category'.$items_update]);
					}
				}while($category_check_set = mysqli_fetch_assoc($category_check_query));		
				
				if($data_check!=''){
					$category_list_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1");
					$category_list_set = mysqli_fetch_assoc($category_list_query);
				
					do{
						if($_POST[$category_list_set['maincat_id'].'category'.$items_update]!=''){
							$data_final.= "|".mysqli_real_escape_string($conn, $_POST[$category_list_set['maincat_id'].'category'.$items_update]);
						}
					}while($category_list_set = mysqli_fetch_assoc($category_list_query));
					$data_final.= "|";
					$mcat_name = $data_final;//echo $mcat_name;
					mysqli_query($conn, "update events_02 set category='".$mcat_name."' where id='".$items_update."'");
					$data_final="";
				}else{
					$mcat_name = "";
					mysqli_query($conn, "update events_02 set category='' where id='".$items_update."'");
				}
				
			}
		}
	}
					
	
	
	
	$temp_query_Recordset1 = "SELECT * FROM events_02 WHERE status=1";					 
	$temp_Recordsetexist = mysqli_query($conn, $temp_query_Recordset1) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist);
	
	do
	{
		if($_POST[$row_Rs1['id']]=="Not Display")
		{	
			$this_host_product_id=$row_Rs1['id'];
			$insertSQL1 = "UPDATE events_02 SET 
			status='0' WHERE id='$this_host_product_id'"; 
			
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist));
	
	$temp_query_Recordset2 = "SELECT * FROM events_02 WHERE status=0";					 
	$Rs1 = mysqli_query($conn, $temp_query_Recordset2) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);

	do
	{
		if($_POST[$row_Rs1['id']]=="Display")
		{	
			$this_host_product_id=$row_Rs1['id']; 
			$insertSQL1 = "UPDATE events_02 SET 
			status='1' WHERE id='$this_host_product_id'"; 
			//echo $insertSQL1;
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	//Change Status - End
if($_POST['delete']=='Delete'){	
	//Delete Testimonial - Start
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$del_data="DELETE FROM events_02 WHERE id='$items_delete'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}


if($_GET['main']!=''){
	$get_mcat = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
	$get_mcat_query = "and category like '%|".$get_mcat."|%'";
}elseif($_GET['nocat']==1){
	$get_mcat_query = "and category=''";
}



if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="")
{
	if(!empty($_GET['alphabet'])) {
	 $colname1_Rs1=(get_magic_quotes_gpc()) ? $_GET['alphabet'] : addslashes($_GET['alphabet']);
	 $query="SELECT * FROM events_02 WHERE status=1 AND name like '$colname1_Rs1%' $get_mcat_query";
	 }
	 else
		$query="SELECT * FROM events_02 WHERE status=1 $get_mcat_query ORDER BY date DESC";
}
else if($_GET['tab']=="approvednotondisplay")
{
	if(!empty($_GET['alphabet'])) {
	 $colname1_Rs1=(get_magic_quotes_gpc()) ? $_GET['alphabet'] : addslashes($_GET['alphabet']);
	 $query="SELECT * FROM events_02 WHERE status=0 AND name like '$colname1_Rs1%' $get_mcat_query";
	 }
	 else	
		$query="SELECT * FROM events_02 WHERE status=0 $get_mcat_query ORDER BY date DESC";
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
	
	$query2=mysqli_query($conn, "SELECT * FROM events_02 WHERE status=0 $get_mcat_query");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM events_02 WHERE status=1 $get_mcat_query");
	$total_testimonial_on_display = mysqli_num_rows($query);

if($_POST['submit']=='update display')
	{
		if ($_POST['type']!='')
			mysqli_query($conn, "update events_02 set type='".$_POST['type']."' ");			
	}
	$query=mysqli_query($conn, "select * from events_02");
	$text=mysqli_fetch_assoc($query);	

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
  <div id="Layer1" style="position:absolute; width:200px; height:37px; z-index:1; left: 696px; top: 4px;">
	<table width="200" cellspacing="2" cellpadding="2">
	  <tr>
		<td class="main_title">| <a href="../authentication/logout2.php" class="style17"> Sign Out</a> |</td>
	  </tr>
	</table>
  </div>
<table width="799" border="0" align="center" cellpadding="0" cellspacing="0">
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
        <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE NEWS </span> </td>
      </tr>
      <tr>
        <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
          
          
                <tr>
                  <td width="72%" align="right">
                                	<?php $qry=mysqli_query($conn, "select * from murum_section where status=1 order by position asc"); $main=mysqli_fetch_assoc($qry); ?>
                              <span class="content" style="padding-right:5px;">
                                Filter:
                                <select name="filter" style="width:150px;" onChange="javascript:jumpMenu('_self',this,0)">
                                	<option value="">Select Category...</option>
                                    <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>" <?php if($_GET['all']==1){?> selected<?php }?>> All category</option>
                                    <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&nocat=1" <?php if($_GET['all']==1){?> selected<?php }?>> No category</option>
                                  <?php do{ $maincat_Rs1=base64_encode($main['maincat_id']);?>
                                  <option value="<?php printf($currentPage); ?>?main=<?php echo $maincat_Rs1;?>&tab=<?php echo $_GET['tab'];?>" <?php if($_GET['main']==$maincat_Rs1){?>selected<?php }?>><?php echo $main['maincat_name']; ?></option>
                                  <?php }while($main=mysqli_fetch_assoc($qry)); ?>
                                </select>
                                </span>  
                    
              </td>
          </tr>          
          
          <tr>
            <td width="636" height="244" align="left" valign="top"><div align="left">

              <?php 
			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>              
              <!--On Display-->
              <form name="ProductListForm1" method="post" action="manageNews.php?tab=approvedondisplay">
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
				
			  	function saveUpdate()
				{
						var id= new Array('productIdListUpdate[]');
						if(id=='')
						{
							alert("No Item Selected");
							return false;
						}
						return true;

				}						

			  </script>
                <div id="list">
                <div id="tab">
                  <ul>
                    <li class="current"><a href="manageNews.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (<?php echo $total_testimonial_on_display; ?>)</a></li>
                    <li class=""><a href="manageNews.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (<?php echo $total_testimonial_not_on_display; ?>)</a></li>
                  </ul>
                </div>
                <div class="function"> <span class="content">Select
				    <input type="checkbox" name="checkbox" value="checkbox" checked disabled> 
				    to:
                    <input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)">
                </span>&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="update" value="Save & Update" onClick="return saveUpdate();" title="Save & Update item(s) position" style="width:120px; color:#333;">
                    </div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="5%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">
                    </th>
                    <th width="15%" class="content">On Display</th>
					 <th width="26%" class="content">News</th>
                    <th width="47%" class="content">Category</th>
                    <th width="7%" class="content" align="center">Edit</th>
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
                    <th width="5%" class="content">
                      <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">
                      <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['id'];?>">
                        <br />
                    </th>
                    <!--onClick="return displayProduct();"-->
                    <td width="15%" class="content">
                      <input type="submit" name="<?php echo $row_Rs1['id']; ?>" value="Not Display" title="Not Display This Product At Your Online List"/>                      </td>
					<td class="content" align="center">
                    <?php echo $row_Rs1['name']; ?><br>
                    <img src="<?php echo "../../".$row_Rs1['image1']; ?>" width="133" height="100" border="0"></td>
					<td class="content">
                     
					 <?php 
	$cat_Rs1=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and section_type=2 and length(position)=1 ORDER BY position ASC, maincat_name ASC");
	$cat_row=mysqli_fetch_assoc($cat_Rs1);
					do{
	$check_cat01_q=mysqli_query($conn, "SELECT * FROM events_02 WHERE category like '%|".$cat_row['maincat_id']."|%' and category!='' and id='".$row_Rs1['id']."' ");
	$check_cat01=mysqli_num_rows($check_cat01_q);

					if(strlen($cat_row['position'])==1){ 
								

				?>
                          <div style="float:left; width:80%;">
                          <img src="../images/space.gif" width="1" height="21">
                          <input type="checkbox" name="<?php echo $cat_row['maincat_id'].'category'.$row_Rs1['id'];?>" value="<?php echo $cat_row['maincat_id'];?>" <?php if($check_cat01>='1'){?> checked<?php }?>><?php echo $cat_row['maincat_name']; ?>
                            </div>
                          
<?
		$previous_code2 = $cat_row['position'];
		$next_position_len2 = 2;
		$next_level_query2 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' ORDER BY position ASC, maincat_name ASC");
		$next_level2 = mysqli_fetch_assoc($next_level_query2);

do{if(strlen($next_level2['position'])==$next_position_len2){ 

	$check_cat02_q=mysqli_query($conn, "SELECT * FROM events_02 WHERE category like '%|".$next_level2['maincat_id']."|%' and category!='' and id='".$row_Rs1['id']."' ");
	$check_cat02=mysqli_num_rows($check_cat02_q);

?>
          <div style="float:left; width:80%; margin-left:15px;"><img src="../images/next-arrow.png" width="24" height="18">
          <input type="checkbox" name="<?php echo $next_level2['maincat_id'].'category'.$row_Rs1['id'];?>" value="<?php echo $next_level2['maincat_id'];?>" <?php if($check_cat02>='1'){?> checked<?php }?>><?php echo $next_level2['maincat_name']; ?></div>
         
   
<?
		$previous_code3 = $next_level2['position'];
		$next_position_len3 = 3;
		$next_level_query3 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code3."%' ORDER BY position ASC, maincat_name ASC");
		$next_level3 = mysqli_fetch_assoc($next_level_query3);

do{if(strlen($next_level3['position'])>=$next_position_len3){ 
	$check_cat03_q = mysqli_query($conn, "SELECT * FROM events_02 WHERE category like '%|".$next_level3['maincat_id']."|%' and category!='' and id='".$row_Rs1['id']."' ");
	$check_cat03 = mysqli_num_rows($check_cat03_q);
?>
          <div style="float:left; width:80%; margin-left:50px;">
          <img src="../images/next-arrow.png" width="24" height="18">
          <input type="checkbox" name="<?php echo $next_level3['maincat_id'].'category'.$row_Rs1['id'];?>" value="<?php echo $next_level3['maincat_id'];?>" <?php if($check_cat03>='1'){?> checked<?php }?>><?php echo $next_level3['maincat_name']; ?></div>
         
   
   <?php }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    
   <?php }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));
					}
} while($cat_row = mysqli_fetch_assoc($cat_Rs1));

?>                       
                    
                    
                    
                    </td>
					<td class="content" align="center"><a href="editNews.php?id=<?php echo base64_encode($row_Rs1['id'])?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a>
<!--<input type="submit" name="<?php //echo 'changes'.$row_Rs1['id'];?>" value="Save Changes">--></td>
                  </tr>
                  <?php
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="5%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
						}
					}
					else
					{ ?>
                  <tr>
                    <th width="5%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
				<tr><td colspan="5">
				  	<table width="50%" border="0" cellpadding="2" cellspacing="1">
						<tr>
						  <td class="content" align="left" colspan="15">Search By Title </td>
						</tr>
					  <tr>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
					  </tr>
					</table>
				  </td></tr>				  				  
                </table>
              </form>
              <span class="content">
              <!--On Display End-->
              <?php } else if($_GET['tab']=="approvednotondisplay") { ?>
              <!--Not On Display-->
              </span>
              <form name="ProductListForm2" method="post" action="manageNews.php?tab=approvednotondisplay">
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
                    <li class=""><a href="manageNews.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (<?php echo $total_testimonial_on_display; ?>)</a></li>
                    <li class="current"><a href="manageNews.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (<?php echo $total_testimonial_not_on_display; ?>)</a></li>
                  </ul>
                </div>
                <div class="content"> Select 
				    <input type="checkbox" name="checkbox" value="checkbox" checked disabled> 
				    to:
                    <input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />
                &nbsp;&nbsp;&nbsp;
                    <input type="submit" name="update" value="Save & Update" onClick="return saveUpdate();" title="Save & Update item(s) position" style="width:120px; color:#333;">
                </div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="8%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">
                    </th>
                    <th width="12%" class="content">Not On Display</th>
					<th width="26%" class="content">News</th>
                    <th width="47%" class="content">Category</th>
                    <th width="7%" class="content" align="center">Edit</th>
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
                    <th width="5%" class="content">
                      <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">
                      <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['id'];?>">
                        <br />
                    </th>
                    <!--onClick="return displayProduct();"-->
                    <td width="15%" class="content">
                      <input type="submit" name="<?php echo $row_Rs1['id']; ?>" value="Not Display" title="Not Display This Product At Your Online List"/>                      </td>
					<td class="content" align="center">
                    <?php echo $row_Rs1['name']; ?><br>
                    <img src="<?php echo "../../".$row_Rs1['image1']; ?>" width="133" height="100" border="0"></td>
					<td class="content">
                     
					 <?php 
	$cat_Rs1=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and section_type=2 and length(position)=1 ORDER BY position ASC, maincat_name ASC");
	$cat_row=mysqli_fetch_assoc($cat_Rs1);
					do{
	$check_cat01_q=mysqli_query($conn, "SELECT * FROM events_02 WHERE category like '%|".$cat_row['maincat_id']."|%' and category!='' and id='".$row_Rs1['id']."' ");
	$check_cat01=mysqli_num_rows($check_cat01_q);

					if(strlen($cat_row['position'])==1){ 
								

				?>
                          <div style="float:left; width:80%;">
                          <img src="../images/space.gif" width="1" height="21">
                          <input type="checkbox" name="<?php echo $cat_row['maincat_id'].'category'.$row_Rs1['id'];?>" value="<?php echo $cat_row['maincat_id'];?>" <?php if($check_cat01>='1'){?> checked<?php }?>><?php echo $cat_row['maincat_name']; ?>
                            </div>
                          
<?
		$previous_code2 = $cat_row['position'];
		$next_position_len2 = 2;
		$next_level_query2 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' ORDER BY position ASC, maincat_name ASC");
		$next_level2 = mysqli_fetch_assoc($next_level_query2);

do{if(strlen($next_level2['position'])==$next_position_len2){ 

	$check_cat02_q=mysqli_query($conn, "SELECT * FROM events_02 WHERE category like '%|".$next_level2['maincat_id']."|%' and category!='' and id='".$row_Rs1['id']."' ");
	$check_cat02=mysqli_num_rows($check_cat02_q);

?>
          <div style="float:left; width:80%; margin-left:15px;"><img src="../images/next-arrow.png" width="24" height="18">
          <input type="checkbox" name="<?php echo $next_level2['maincat_id'].'category'.$row_Rs1['id'];?>" value="<?php echo $next_level2['maincat_id'];?>" <?php if($check_cat02>='1'){?> checked<?php }?>><?php echo $next_level2['maincat_name']; ?></div>
         
   
<?
		$previous_code3 = $next_level2['position'];
		$next_position_len3 = 3;
		$next_level_query3 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code3."%' ORDER BY position ASC, maincat_name ASC");
		$next_level3 = mysqli_fetch_assoc($next_level_query3);

do{if(strlen($next_level3['position'])>=$next_position_len3){ 
	$check_cat03_q = mysqli_query($conn, "SELECT * FROM events_02 WHERE category like '%|".$next_level3['maincat_id']."|%' and category!='' and id='".$row_Rs1['id']."' ");
	$check_cat03 = mysqli_num_rows($check_cat03_q);
?>
          <div style="float:left; width:80%; margin-left:50px;">
          <img src="../images/next-arrow.png" width="24" height="18">
          <input type="checkbox" name="<?php echo $next_level3['maincat_id'].'category'.$row_Rs1['id'];?>" value="<?php echo $next_level3['maincat_id'];?>" <?php if($check_cat03>='1'){?> checked<?php }?>><?php echo $next_level3['maincat_name']; ?></div>
         
   
   <?php }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    
   <?php }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));
					}
} while($cat_row = mysqli_fetch_assoc($cat_Rs1));

?>                       
                    
                    
                    
                    </td>
					<td class="content" align="center"><a href="editNews.php?id=<?php echo base64_encode($row_Rs1['id'])?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a>
<!--<input type="submit" name="<?php //echo 'changes'.$row_Rs1['id'];?>" value="Save Changes">--></td>
                  </tr>
					<?php
					} while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="8%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
												}
											}
											else
											{ ?>
                  <tr>
                    <th width="8%"></th>
                    <td colspan="3" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
				<tr><td colspan="5">
				  	<table width="50%" border="0" cellpadding="2" cellspacing="1">
						<tr>
						  <td class="content" align="left" colspan="15">Search By Title </td>
						</tr>
					  <tr>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="manageNews.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
					  </tr>
					</table>
				  </td></tr>				  
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
        Contact Web And You <a href="mailto:support@webnyou.com">project administrator </a>for further assistance. </font></b></font></b></font></b></font></div></td>
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

