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

if($_POST['update']=='Save & Sort'){	
	$update_data_array = $_POST['productIdListUpdate'];
	
	if(!empty($_POST['productIdListUpdate']))
	{
		foreach($update_data_array as $update_data)
		{	 
			////////////Positioning of the product ////////
			$position_value = $defenders->escapeInjection($_POST['position'.$update_data]);
			mysqli_query($conn, "update mydf_product set position='".$position_value."' where id='".$update_data."'");
			
			////////////Update product's section id////////
				$category_check_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1");
				$category_check_set = mysqli_fetch_assoc($category_check_query);
				
				do{
					if($_POST[$category_check_set['maincat_id'].'category'.$update_data]!=''){
						$data_check.= mysqli_real_escape_string($conn, $_POST[$category_check_set['maincat_id'].'category'.$update_data]);
					}
				}while($category_check_set = mysqli_fetch_assoc($category_check_query));		
				
				if($data_check!=''){
					$category_list_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1");
					$category_list_set = mysqli_fetch_assoc($category_list_query);
				
					do{
						if($_POST[$category_list_set['maincat_id'].'category'.$update_data]!=''){
							//echo ">>".$_POST[$category_list_set['maincat_id'].'category'.$update_data]."<br>";
							$data_final.= "|".mysqli_real_escape_string($conn, $_POST[$category_list_set['maincat_id'].'category'.$update_data]);
						}
					}while($category_list_set = mysqli_fetch_assoc($category_list_query));
					$data_final.= "|";
					$mcat_name = $data_final;//echo $mcat_name;
					mysqli_query($conn, "update mydf_product set maincat_id='".$mcat_name."' where id='".$update_data."'");
					$data_final="";
				}else{
					$mcat_name = "";
					mysqli_query($conn, "update mydf_product set maincat_id='' where id='".$update_data."'");
				}
			}
	}
}
		
if($_POST['display']=='Hide'){	
	$items_hide_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_hide_array as $items_hide)
		{
			$hide_data="update mydf_product set status='0' where id='$items_hide'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $hide_data) or die(mysqli_error());			
		}
	}
}

if($_POST['display']=='Display'){	
	$items_display_array = $_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_display_array as $items_display)
		{
			$display_data="update mydf_product set status='1' where id='$items_display'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $display_data) or die(mysqli_error());			
		}
	}
}
		
if($_POST['delete']=='Delete'){	
	$items_delete_array = $_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$display_data="update mydf_product set status='-1' where id='$items_delete'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $display_data) or die(mysqli_error());			
		}
	}
}		


if($_GET['sub']!=''){
	$get_scat = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
	$get_scat_query = "and category_id like '%|".$get_scat."|%'";
}
if($_GET['main']!=''){
	$get_mcat = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
	$get_mcat_query = "and maincat_id like '%|".$get_mcat."|%'";
}elseif($_GET['nocat']==1){
	$get_mcat_query = "and (maincat_id='' or maincat_id='|')";
}


if($_GET['tab']=="approvedondisplay"||$_GET['tab']==""){
		if(!empty($_GET['alphabet'])) {
			$colname1_Rs1=(get_magic_quotes_gpc()) ? $_GET['alphabet'] : addslashes($_GET['alphabet']);
			$query="SELECT * FROM mydf_product WHERE status=1 AND product_name like '$colname1_Rs1%' $get_mcat_query $get_scat_query ORDER BY position asc, product_name asc";
		 }
		 else
			$query="SELECT * FROM mydf_product WHERE status=1 $get_mcat_query $get_scat_query ORDER BY position asc, product_name asc";
}
else if($_GET['tab']=="approvednotondisplay"){
		if(!empty($_GET['alphabet'])) {
			$colname1_Rs1=(get_magic_quotes_gpc()) ? $_GET['alphabet'] : addslashes($_GET['alphabet']);
			$query="SELECT * FROM mydf_product WHERE status=0 AND product_name like '$colname1_Rs1%' $get_mcat_query $get_scat_query ORDER BY position asc, product_name asc";
		 }
		 else
			$query="SELECT * FROM mydf_product WHERE status=0 $get_mcat_query $get_scat_query ORDER BY position asc, product_name asc";
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
	
	$query2=mysqli_query($conn, "SELECT * FROM mydf_product WHERE status=0 $get_mcat_query $get_scat_query ");
	$total_testimonial_not_on_display = mysqli_num_rows($query2);
	$query=mysqli_query($conn, "SELECT * FROM mydf_product WHERE status=1 $get_mcat_query $get_scat_query");
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

function jumpMenu(target,selObj,restore){ 
  if (selObj.selectedIndex>0 && selObj.options[selObj.selectedIndex].value != ''){
    window.open(selObj.options[selObj.selectedIndex].value,target);}
  else if(selObj.options[selObj.selectedIndex].value == '')  {selObj.selectedIndex=0;}
  if (restore) selObj.selectedIndex=0;
}
</script>

<script language="JavaScript">

function hideProduct()
				{
						var id= new Array('productIdList[]');
						if(id=='')
						{
							alert("No Item Selected");
							return false;
						}
						return true;
					}

function saveProduct()
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



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="Layer1" style="position:absolute; width:200px; height:41px; z-index:1; left: 696px; top: 4px;">
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
            <div id="titlename"><span class="white_title">FREE FORMAT PAGE</span></div></div>
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
        <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE   CONTENT DETAIL PAGE</span> </td>
      </tr>
      <tr>
        <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
<tr>
    <td>
    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
                    <td width="72%" align="right">
                     <?php $qry=mysqli_query($conn, "select * from murum_section where status=1 and length(position)=1 and section_type!=2 order by maincat_name asc");
					 	$main=mysqli_fetch_assoc($qry); ?>
                              <span class="content" style="padding-right:5px;">
                                Filter:
                                <select name="filter" style="width:150px;" onChange="javascript:jumpMenu('_self',this,0)">
                                	<option value="">Select section...</option>
                                    <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&all=1" <?php if($_GET['all']==1){?> selected<?php }?>> All section</option>
                                    <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&nocat=1" <?php if($_GET['nocat']==1){?> selected<?php }?>> No section</option>
                                  <?php do{ $maincat_Rs1=base64_encode($main['maincat_id']);?>
                                  <option value="<?php printf($currentPage); ?>?main=<?php echo $maincat_Rs1;?>&tab=<?php echo $_GET['tab'];?>" <?php if($_GET['main']==$maincat_Rs1){?>selected<?php }?>><?php echo $main['maincat_name']; ?></option>
                                  <?php }while($main=mysqli_fetch_assoc($qry)); ?>
                                </select>
                                </span>  
                                
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                
<?php 
if($_GET['main']!=''){
$get_main = $defenders->escapeInjection(base64_decode($_GET['main']));
$main_position_q = mysqli_query($conn, "select * from murum_section where maincat_id='".$get_main."%' ");
$main_position=mysqli_fetch_assoc($main_position_q); 

$qry02=mysqli_query($conn, "select * from murum_section where status=1 and length(position)=2 and section_type!=2 and position like '".$main_position['position']."%' order by maincat_name asc");
$main02=mysqli_fetch_assoc($qry02);

}else{
$qry02=mysqli_query($conn, "select * from murum_section where status=1 and length(position)=2 and section_type!=2 order by maincat_name asc");
$main02=mysqli_fetch_assoc($qry02); 
}
?>
                              <span class="content" style="padding-right:5px;">
                               
                                <select name="filter" style="width:150px;" onChange="javascript:jumpMenu('_self',this,0)">
                                	<option value="">Select category...</option>
                                    <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&all=1" <?php if($_GET['all']==1){?> selected<?php }?>> All category</option>
                                    <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&nocat=1" <?php if($_GET['nocat']==1){?> selected<?php }?>> No category</option>
                                  <?php do{ $maincat_Rs102=base64_encode($main02['maincat_id']);?>
                                  <option value="<?php printf($currentPage); ?>?sub=<?php echo $maincat_Rs102;?>&tab=<?php echo $_GET['tab'];?>" <?php if($_GET['sub']==$maincat_Rs102){?>selected<?php }?>><?php echo $main02['maincat_name']; ?></option>
                                  <?php }while($main02=mysqli_fetch_assoc($qry02)); ?>
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
              <form name="ProductListForm1" method="post" action="manageProduct.php?tab=approvedondisplay&pageNum_Rs1=<?php echo $_GET['pageNum_Rs1'];?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>">
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
                    <li class="current"><a href="manageProduct.php?tab=approvedondisplay&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>" title="Display Product Item Online" class="content">On Display(
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                    <li class=""><a href="manageProduct.php?tab=approvednotondisplay&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>" title="Not Display Product Item Online" class="content">Not On Display (
                                <?php if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                  </ul>
                </div>
                <div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td>
				  	<table width="100%" border="0" cellpadding="1" cellspacing="1">
						<tr><td class="content" align="left" colspan="15">Find product item name by first alphabet</td></tr>
					  <tr>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
					  </tr>
					</table>
				  </td></tr>                
                
                
                </table>
                </div>
                <div class="function"> <span class="content">Select
				    <input type="checkbox" name="checkbox" value="checkbox" checked disabled> 
				    to:
                    <input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)">
                </span>
                <span class="content" style="color:#666">&nbsp;
<input type="submit" name="display" value="Hide" onClick="return hideProduct();" title="Hide selected item(s)" style="width:90px; color:#333;"/>
&nbsp;&nbsp;
<input type="submit" name="update" value="Save & Sort" onClick="return saveProduct();" title="Save & Sort item(s) position" style="width:90px; color:#333;">
                
                </div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="9%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                    </th>
                    <th width="110" class="content">Title</th>
                    <th width="50%" class="content">Section & Category</th>
                    <th width="12%" class="content" align="center">Position No. </th>
                    <th width="5%" class="content" align="center">Edit</th>
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
                    <th width="9%" class="content" bgcolor="<?php echo $bgcolor;?>">
                      <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">
                      <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['id'];?>">
                        <br />                    </th>

                      <td class="content">
					  
					  <?php echo $row_Rs1['product_name']; ?><br>
                      
					  

					  <span class="red02">
                      <?
					  if($row_Rs1['id']==39 ||$row_Rs1['id']==40||$row_Rs1['id']==41 ||$row_Rs1['id']==42||$row_Rs1['id']==43)
					  echo "Pre Design Template."; else echo "Dynamic Template"
					  ?>
                      <br>URL: <?php echo "result.php?id=".base64_encode($row_Rs1['id']);?>
                      </span>
                      </td>
                     <td class="content">
                    
<?
		$root_Rs1 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and length(position)=1 and section_type!=2 ORDER BY position ASC, maincat_name ASC");
		$rotcat = mysqli_fetch_assoc($root_Rs1);
		do{
			
	$check_level1_q=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$rotcat['maincat_id']."|%' and maincat_id!='' and id='".$row_Rs1['id']."' ");
	$check_level1=mysqli_num_rows($check_level1_q);
			
?>
                    
                          <div style="float:left; width:70%;">
                          <img src="../images/space.gif" width="1" height="15">
                          <input type="checkbox" value="<?php echo $rotcat['maincat_id']; ?>" name="<?php echo $rotcat['maincat_id'].'category'.$row_Rs1['id'];?>" <?php if($check_level1>='1'){?> checked<?php }?>>&nbsp;
                          
                            <?php echo $rotcat['maincat_name']; ?><?php if($rotcat['section_type']=='2') echo " <span class=\"red\">P</span>"; else echo " <span class=\"red\">F</span>";?> 
                           </div>
                          
<?
		$previous_code2 = $rotcat['position'];
		$next_position_len2 = 2;
		$next_level_query2 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' and length(position)=2 ORDER BY position ASC, maincat_name ASC");
		$next_level2 = mysqli_fetch_assoc($next_level_query2);

do{
	$check_level2_q=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$next_level2['maincat_id']."|%' and maincat_id!='' and id='".$row_Rs1['id']."' ");
	$check_level2=mysqli_num_rows($check_level2_q);
	
	if(strlen($next_level2['position'])==$next_position_len2){ 
?>
          <div style="float:left; width:70%; padding-left:15px;"><img src="../images/next-arrow.png" width="24" height="15">
         <input type="checkbox" value="<?php echo $next_level2['maincat_id']; ?>" name="<?php echo $next_level2['maincat_id'].'category'.$row_Rs1['id'];?>" <?php if($check_level2>='1'){?> checked<?php }?>>&nbsp;
         <?php echo $next_level2['maincat_name']; ?></div>
         
   
<?
		$previous_code3 = $next_level2['position'];
		$next_position_len3 = 3;
		$next_level_query3 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code3."%' and length(position)>=3 ORDER BY position ASC, maincat_name ASC");
		$next_level3 = mysqli_fetch_assoc($next_level_query3);

do{
			
	$check_level3_q=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$next_level3['maincat_id']."|%' and maincat_id!='' and id='".$row_Rs1['id']."' ");
	$check_level3=mysqli_num_rows($check_level3_q);
	
	if(strlen($next_level3['position'])>=$next_position_len3){ 
?>
          <div style="float:left; width:70%; padding-left:50px;">
          <img src="../images/next-arrow.png" width="24" height="15">
         <input type="checkbox" value="<?php echo $next_level3['maincat_id']; ?>" name="<?php echo $next_level3['maincat_id'].'category'.$row_Rs1['id'];?>" <?php if($check_level3>='1'){?> checked<?php }?>>&nbsp;
         <?php echo $next_level3['maincat_name']; ?></div>
   
   <?php }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    
   <?php }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));?>
   <?php }while($rotcat = mysqli_fetch_assoc($root_Rs1));?>
   
                       
                    
                     </td>

                    <td class="content" align="center"><input name="<?php echo 'position'.$row_Rs1['id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:20px;" width="3"></td>
                    <td class="content" align="center"><a href="editProduct.php?id=<?php echo base64_encode($row_Rs1['id'])?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a></td>
                  </tr>
                  <?php $count++;
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="9%"></th>
                    <td colspan="6" class="content">NO Record Found.</td>
                  </tr>
                  <?php
						}
					}
					else
					{ ?>
                  <tr>
                    <th width="9%"></th>
                    <td colspan="6" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                                          <tr>
                          <td colspan="5" class="red">
                          P = Pre-design ; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F = Free Format<br>
                         
                          </td>
                        </tr>
                  
                  <!--Empty Detection End-->
				<tr><td colspan="8">
				  	<table width="100%" border="0" cellpadding="2" cellspacing="1">
						<tr><td class="content" align="left" colspan="15">Find product item name by first alphabet</td></tr>
					  <tr>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
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
              <form name="ProductListForm2" method="post" action="manageProduct.php?tab=approvednotondisplay&pageNum_Rs1=<?php echo $_GET['pageNum_Rs1'];?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>">
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
                    <li class=""><a href="manageProduct.php?tab=approvedondisplay&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>" title="Display Product Item Online" class="content">On Display(
                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                    <li class="current"><a href="manageProduct.php?tab=approvednotondisplay&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>" title="Not Display Product Item Online" class="content">Not On Display (
                                <?php if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>
                            0
                            <?php }?>
                            )</a></li>
                  </ul>
                </div>
<div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td>
				  	<table width="100%" border="0" cellpadding="1" cellspacing="1">
						<tr><td class="content" align="left" colspan="15">Find product item name by first alphabet</td></tr>
					  <tr>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
					  </tr>
					</table>
				  </td></tr>                
                
                
                </table>
                </div>                
                
                <div class="content"> Select 
				    <input type="checkbox" name="checkbox" value="checkbox" checked disabled> 
				    to:
                    <input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />
                &nbsp;&nbsp;
                <input type="submit" name="display" value="Display" onClick="return hideProduct();" title="Display selected item(s)" style="width:90px; color:#333;"/>
&nbsp;&nbsp;
<input type="submit" name="update" value="Save & Sort" onClick="return saveProduct();" title="Save & Sort item(s) position" style="width:90px; color:#333;">
                
                </div>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                  <tr>
                    <th width="8%" class="content">
                      <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                    </th>
                    <th width="110" class="content">Title</th>
                    <th width="50%" class="content">Section & Category</th>
                    <th width="12%" class="content" align="center">Position No. </th>
                    <th width="5%" class="content" align="center">Edit</th>
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
                    <th width="9%" class="content" bgcolor="<?php echo $bgcolor;?>">
                      <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">
                      <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['id'];?>">
                        <br />                    </th>

                      <td class="content">
					  
					  <?php echo $row_Rs1['product_name']; ?><br>
                      
					  

					  <span class="red02">
                      <?
					  if($row_Rs1['id']==39 ||$row_Rs1['id']==40||$row_Rs1['id']==41 ||$row_Rs1['id']==42||$row_Rs1['id']==43)
					  echo "Pre Design Template."; else echo "Dynamic Template"
					  ?>
                      <br>URL: <?php echo "result.php?id=".base64_encode($row_Rs1['id']);?>
                      </span>
                      </td>
                     <td class="content">
                    
<?
		$root_Rs1 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and length(position)=1 and section_type!=2 ORDER BY position ASC, maincat_name ASC");
		$rotcat = mysqli_fetch_assoc($root_Rs1);
		do{
			
	$check_level1_q=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$rotcat['maincat_id']."|%' and maincat_id!='' and id='".$row_Rs1['id']."' ");
	$check_level1=mysqli_num_rows($check_level1_q);
			
?>
                    
                          <div style="float:left; width:70%;">
                          <img src="../images/space.gif" width="1" height="15">
                          <input type="checkbox" value="<?php echo $rotcat['maincat_id']; ?>" name="<?php echo $rotcat['maincat_id'].'category'.$row_Rs1['id'];?>" <?php if($check_level1>='1'){?> checked<?php }?>>&nbsp;
                          
                            <?php echo $rotcat['maincat_name']; ?><?php if($rotcat['section_type']=='2') echo " <span class=\"red\">P</span>"; else echo " <span class=\"red\">F</span>";?> 
                           </div>
                          
<?
		$previous_code2 = $rotcat['position'];
		$next_position_len2 = 2;
		$next_level_query2 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' and length(position)=2 ORDER BY position ASC, maincat_name ASC");
		$next_level2 = mysqli_fetch_assoc($next_level_query2);

do{
	$check_level2_q=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$next_level2['maincat_id']."|%' and maincat_id!='' and id='".$row_Rs1['id']."' ");
	$check_level2=mysqli_num_rows($check_level2_q);
	
	if(strlen($next_level2['position'])==$next_position_len2){ 
?>
          <div style="float:left; width:70%; padding-left:15px;"><img src="../images/next-arrow.png" width="24" height="15">
         <input type="checkbox" value="<?php echo $next_level2['maincat_id']; ?>" name="<?php echo $next_level2['maincat_id'].'category'.$row_Rs1['id'];?>" <?php if($check_level2>='1'){?> checked<?php }?>>&nbsp;
         <?php echo $next_level2['maincat_name']; ?></div>
         
   
<?
		$previous_code3 = $next_level2['position'];
		$next_position_len3 = 3;
		$next_level_query3 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code3."%' and length(position)>=3 ORDER BY position ASC, maincat_name ASC");
		$next_level3 = mysqli_fetch_assoc($next_level_query3);

do{
			
	$check_level3_q=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$next_level3['maincat_id']."|%' and maincat_id!='' and id='".$row_Rs1['id']."' ");
	$check_level3=mysqli_num_rows($check_level3_q);
	
	if(strlen($next_level3['position'])>=$next_position_len3){ 
?>
          <div style="float:left; width:70%; padding-left:50px;">
          <img src="../images/next-arrow.png" width="24" height="15">
         <input type="checkbox" value="<?php echo $next_level3['maincat_id']; ?>" name="<?php echo $next_level3['maincat_id'].'category'.$row_Rs1['id'];?>" <?php if($check_level3>='1'){?> checked<?php }?>>&nbsp;
         <?php echo $next_level3['maincat_name']; ?></div>
   
   <?php }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    
   <?php }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));?>
   <?php }while($rotcat = mysqli_fetch_assoc($root_Rs1));?>
   
                       
                    
                     </td>

                    <td class="content" align="center"><input name="<?php echo 'position'.$row_Rs1['id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:20px;" width="3"></td>
                    <td class="content" align="center"><a href="editProduct.php?id=<?php echo base64_encode($row_Rs1['id'])?>"><img src="../images/b_edit.png" width="16" height="15" border="0"></a></td>
                  </tr>
                  <?php $count++;
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
					}
					else
					{ ?>
                  <tr>
                    <th width="8%"></th>
                    <td colspan="6" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php
												}
											}
											else
											{ ?>
                  <tr>
                    <th width="8%"></th>
                    <td colspan="7" class="content">NO Record Found.</td>
                    <!--<td></td>-->
                  </tr>
                  <?php } ?>
                                          <tr>
                          <td colspan="5" class="red">
                          P = Pre-design ; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F = Free Format<br>
                         
                          </td>
                        </tr>
                  
                  
                  <!--Empty Detection End-->
				<tr><td colspan="8">
				  	<table width="100%" border="0" cellpadding="2" cellspacing="1">
						<tr><td class="content" align="left" colspan="15">Find product item name by first alphabet</td></tr>
					  <tr>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=A">A</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=B">B</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=C">C</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=D">D</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=E">E</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=F">F</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=G">G</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=H">H</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=I">I</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=J">J</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=K">K</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=L">L</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=M">M</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=N">N</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=O">O</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=P">P</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Q">Q</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=R">R</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=S">S</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=T">T</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=U">U</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=V">V</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=W">W</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=X">X</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Y">Y</a></strong></span></td>
						<td><span class="content"><strong><a href="manageProduct.php?tab=<?php echo $_GET['tab']?>&alphabet=Z">Z</a></strong></span></td>
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

