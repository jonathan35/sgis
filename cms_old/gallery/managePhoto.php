<?php 
require_once('../../Connections/pamconnection.php'); 
require_once('../../pro/security.php');

	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
	$today=date("Y-m-d");
	
	$temp_query_Recordset1 = "SELECT * FROM washington_gallery WHERE status=1";					 
	$temp_Recordsetexist = mysqli_query($conn, $temp_query_Recordset1) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist);
	
	do
	{
		if($_POST[$row_Rs1['id']]=="Not Display")
		{	
			$this_host_product_id=$row_Rs1['id'];
			$insertSQL1 = "UPDATE washington_gallery SET 
			status='0' WHERE id='$this_host_product_id'"; 
			
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($temp_Recordsetexist));
		
	
	$temp_query_Recordset2 = "SELECT * FROM washington_gallery WHERE status=0";					 
	$Rs1 = mysqli_query($conn, $temp_query_Recordset2) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);

	do
	{
		if($_POST[$row_Rs1['id']]=="Display")
		{	
			$this_host_product_id=$row_Rs1['id']; 
			$insertSQL1 = "UPDATE washington_gallery SET 
			status='1' WHERE id='$this_host_product_id'"; 
			//echo $insertSQL1;
			mysqli_select_db($conn, $database_pamconnection);
			$Result1 = mysqli_query($conn, $insertSQL1) or die(mysqli_error());
		}
	} while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	
	$temp_query = "SELECT * FROM washington_gallery";					 
	$tempexist = mysqli_query($conn, $temp_query) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($tempexist);
	
	do
	{
		if($_POST['save'.$row_Rs1['id']]=="Save")
			mysqli_query($conn, "update washington_gallery set position='".$defenders->escapeInjection($_POST['position'.$row_Rs1['id']])."' 
								WHERE id='".$row_Rs1['id']."'"); 
	} while($row_Rs1 = mysqli_fetch_assoc($tempexist));
	
	//Change Status - End
if($_POST['delete']=='Delete'){	
	//Delete Testimonial - Start
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$del_data="delete from washington_gallery WHERE id='$items_delete'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}

if($_GET['id']){
		
		$id = $defenders->escapeInjection(base64_decode($_GET['id']));
		$ablum_id = "AND album_id ='".$id."' "; 
}
	

if($_GET['tab']=="approvedondisplay" ||$_GET['tab']=="" )
{
	if(!empty($_GET['alphabet'])) {
	 	$colname1_Rs1=(get_magic_quotes_gpc()) ? $_GET['alphabet'] : addslashes($_GET['alphabet']);
	 	$query="SELECT * FROM washington_gallery WHERE status=1 AND product_name like '$colname1_Rs1%' ORDER BY album_id desc, position asc";
	
	}else
		$query="SELECT * FROM washington_gallery WHERE status=1 $ablum_id ORDER BY album_id desc, position asc";
}
else if($_GET['tab']=="approvednotondisplay")
{
	if(!empty($_GET['alphabet'])) {
	 $colname1_Rs1=(get_magic_quotes_gpc()) ? $_GET['alphabet'] : addslashes($_GET['alphabet']);
	 $query="SELECT * FROM washington_gallery WHERE status=0 AND product_name like '$colname1_Rs1%' ORDER BY album_id desc, position asc";
	 }
	 else	
		$query="SELECT * FROM washington_gallery WHERE status=0 ORDER BY album_id desc, position asc";
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
	
	$query2=mysqli_query($conn, "SELECT * FROM washington_gallery WHERE status=0");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM washington_gallery WHERE status=1");
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
  <div id="Layer1" style="position:absolute; width:200px; height:36px; z-index:1; left: 716px; top: 0px;">
	<table width="200" cellspacing="2" cellpadding="2">
	  <tr>
		<td class="main_title">| <a href="../authentication/logout2.php" class="style17"> Sign Out</a> |</td>
	  </tr>
	</table>
</div>
  
  <img src="../images/cmservice.jpg" width="800" height="50">
<table width="799" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td align="center" valign="top" colspan="5">
	<div align="left">
          <div id="title">
            <div id="titlename"><span class="white_title">PHOTO GALLERY</span></div></div>
            <div class="shadow"></div>
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
        <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE PHOTO </span> </td>
      </tr>
      <tr>
        <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
          
          
          <tr>
    <td>
    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
                    <td width="72%" align="right">
                    				
                              <?php 	
							  		$ablum_query = mysqli_query($conn, "SELECT * FROM album WHERE status='1' ORDER BY album_name ASC");
									$ablum = mysqli_fetch_assoc($ablum_query); 
							  		
									$select_query = mysqli_query($conn, "SELECT * FROM washington_gallery WHERE status='1' and album_id='".$ablum['album_id']."' order by position asc"); 
							  		$select = mysqli_fetch_assoc($select_query); ?>
                                    
                              <span class="content" style="padding-right:5px;">
                                Filter:
                                <select name="filter" style="width:150px;" onChange="javascript:jumpMenu('_self',this,0)">
                                	<option value="">Select album...</option>
                                    <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&all=1" <?php if($_GET['all']==1){?> selected<?php }?>> All album</option>
                                    <!--<option value="<?php //printf($currentPage); ?>?tab=<?php //echo $_GET['tab'];?>&nocat=1" <?php //if($_GET['nocat']==1){?> selected<?php //}?>> No section</option> -->
                                  
								  <?php do{ ?>
                                  			<option value="<?php printf($currentPage); ?>?id=<?php echo base64_encode($ablum['album_id']);?>" <?php if(base64_decode($_GET['id'])== $ablum['album_id']){?>selected<?php }?>><?php echo $ablum['album_name']; ?></option>
                                 
                                  <?php }while($ablum = mysqli_fetch_assoc($ablum_query)); ?>
                                </select>
                                </span>  
                                
                               </td>
                 			 </tr>
						</table>
						</td>
 					 </tr>
          
          
          <tr>
            <td width="636" height="244" align="left" valign="top"><div align="left">
              <?php 
			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>              
              <!--On Display-->
              <form name="ProductListForm1" method="post" action="managePhoto.php?tab=approvedondisplay&pageNum_Rs1=<?php echo $_GET['pageNum_Rs1'];?>">
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
                    <li class="current"><a href="managePhoto.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display(
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                    <li class=""><a href="managePhoto.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (
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
                  <tr>
                    <th width="6%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                    </th>
                    <th width="14%" class="content">On Display</th>
                    <th width="19%" class="content">Photo</th>
                    <th width="19%" class="content">Album</th>
                    
                    <th width="28%" class="content">Photo Caption</th>
                    <th width="15%" class="content" align="center">Position No. </th>
                    <th width="11%" class="content" align="center">Save</th>
                    <th width="7%" class="content" align="center">Edit</th>
                    <!--<th width="6%">Edit</th>-->
                  </tr>
  
                  <?php
				  $count=1;
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
                    <th width="6%" class="content" bgcolor="<?php echo $bgcolor;?>">
                      <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">
                        <br />                    </th>
                    <td width="14%" class="content">
                      <input type="submit" name="<?php echo $row_Rs1['id']; ?>" value="Not Display" title="Not Display This Product At Your Online List"/>                      </td>
                      <td><img src="../../<?php echo $row_Rs1['photo1']; ?>" width="100" height="75"></td>
                     <td class="content"><?php 
					 $album_set=mysqli_fetch_assoc(mysqli_query($conn, "select * from album where album_id='".$row_Rs1['album_id']."'"));
					 echo $album_set['album_name'];?>
                     
                     </td>
			
                    <td class="content" calss="content"><?php echo $row_Rs1['product_name']; ?></td>
                    <td class="content" align="center"><input name="<?php echo 'position'.$row_Rs1['id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:20px;" width="3"></td>
                    <td class="content" align="center"><input type="submit" name="<?php echo 'save'.$row_Rs1['id']?>" value="Save"></td>
                    <td class="content" align="center"><a href="editPhoto.php?id=<?php echo base64_encode($row_Rs1['id'])?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a></td>
                  </tr>
                  <?php $count++;
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="6%"></th>
                    <td colspan="6" class="content">NO Record Found.</td>
                  </tr>
                  <?php
						}
					}
					else
					{ ?>
                  <tr>
                    <th width="6%"></th>
                    <td colspan="6" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
				<tr><td colspan="7">
				  	<table width="50%" border="0" cellpadding="2" cellspacing="1">
						<tr><td class="content" align="left" colspan="15">Search By Title</td></tr>
					  <tr>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
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
              <form name="ProductListForm2" method="post" action="managePhoto.php?tab=approvednotondisplay&pageNum_Rs1=<?php echo $_GET['pageNum_Rs1'];?>">
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
                    <li class=""><a href="managePhoto.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display(
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                    <li class="current"><a href="managePhoto.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (
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
                  <tr>
                    <th width="5%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                    </th>
                    <th width="14%" class="content">Not On Display</th>
                    <th width="19%" class="content">Photo</th>
                    <th width="19%" class="content">Category</th>
                    
                    <th width="28%" class="content">Product Name</th>
                    <th width="15%" class="content" align="center">Position No.</th>
                    <th width="12%" class="content" align="center">Save</th>
                    <th width="7%" class="content" align="center">Edit</th>
                    <!--<th width="6%">Edit</th>-->
                  </tr>
                  <?php $count=1;
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
                      <br />                    </th>
                    <!--onClick="return displayProduct();"-->
                    <td width="14%" class="content">
                      <input type="submit" name="<?php echo $row_Rs1['id']; ?>" value="Display" title="Display This Product At Your Online List"/>                    </td>
                    <td><img src="<?php echo $row_Rs1['photo1']; ?>" width="100" height="75"></td>
					<td class="content">
					  <?php 
					 $album_set=mysqli_fetch_assoc(mysqli_query($conn, "select * from album where album_id='".$row_Rs1['album_id']."'"));
					 echo $album_set['album_name'];?></td>
                     <?php 
					     
					    //$sub_set=mysqli_fetch_assoc(mysqli_query($conn, "select * from subcat where subcat_id='".$row_Rs1['subcat_id']."'"))
					 ?>
					
                    <td class="content"><?php echo $row_Rs1['product_name']; ?></td>
                    <td class="content" align="center">
                      <input name="<?php echo 'position'.$row_Rs1['id']?>" type="text" value="<?php echo $row_Rs1['position'];?>"  style="width:20px;" width="3"></td>
                    <td class="content" align="center"><input type="submit" name="<?php echo 'save'.$row_Rs1['id']?>" value="Save"></td>
                    <td class="content" align="center"><a href="editPhoto.php?id=<?php echo base64_encode($row_Rs1['id'])?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a></td>
                  </tr>
                  <?php $count++;
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="5%"></th>
                    <td colspan="6" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
												}
											}
											else
											{ ?>
                  <tr>
                    <th width="5%"></th>
                    <td colspan="6" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                  <!--Empty Detection End-->
				<tr><td colspan="7">
				  	<table width="50%" border="0" cellpadding="2" cellspacing="1">
						<tr><td class="content" align="left" colspan="15">Search By Title</td></tr>
					  <tr>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="managePhoto.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
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

