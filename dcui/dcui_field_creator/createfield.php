<?php 
require_once('../../Connections/pamconnection.php');  
session_start();
	if($_SESSION['dcui_validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
	$section_id = base64_decode($_GET['m']);



	if($_POST['submit']==' Submit ')
	{
		$table_field=mysqli_real_escape_string($conn, $_POST['table_field']);
		$field_name=mysqli_real_escape_string($conn, $_POST['field_name']);
		$field_display=mysqli_real_escape_string($conn, $_POST['field_display']);
		$field_type=mysqli_real_escape_string($conn, $_POST['field_type']);
		$field_limit=mysqli_real_escape_string($conn, $_POST['field_limit']);
		$field_position=mysqli_real_escape_string($conn, $_POST['field_position']);
		$field_remark=mysqli_real_escape_string($conn, $_POST['field_remark']);
		
		$field_column_validate_query = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='".$table_field."' and table_field!='' ");
		$field_column_validate_count = mysqli_num_rows($field_column_validate_query);
		
		if($field_column_validate_count>=1){
			$success='<font color="#CC3300">Table Field Column not availabel. please use other table field column.</font>';	
		}else{
	
		if(mysqli_query($conn, "INSERT INTO dcui_template_setting (id, section_id, field_status, table_field, field_name, field_display, field_type, field_limit, field_position, field_remark, status, date_posted) VALUES ('', '".$section_id."', 1, '".$table_field."', '".$field_name."', '".$field_display."', '".$field_type."', '".$field_limit."', '".$field_position."', '".$field_remark."', 1, '".date('Y-m-d')."')"))		
			$success='<font color="#336600">Field added</font>';
		else
			$success='<font color="#CC3300">Failed to add field</font>';
		}
	}
//*************************************************Manage Country*************************************************

if($_POST['update']=='Save & Sort'){	
	$items_update_array = $_POST['productIdListUpdate'];
	if(!empty($_POST['productIdListUpdate']))
	{
		foreach($items_update_array as $items_update)
		{	 
			$field_status_value = $_POST['field_status'.$items_update];
			$table_field_value = $_POST['table_field'.$items_update];
			$field_title_display = $_POST['field_title_display'.$items_update];
			$field_name_value = $_POST['field_name'.$items_update];
			$field_type_value = $_POST['field_type'.$items_update];
			$field_display_value = $_POST['field_display'.$items_update];
			$field_limit_value = $_POST['field_limit'.$items_update];
			$field_position_value = $_POST['field_position'.$items_update];
			$field_remark_value = $_POST['field_remark'.$items_update];
			$price_currency = $_POST['price_currency'.$items_update];
			$price_note = $_POST['price_note'.$items_update];
			
			if(mysqli_query($conn, "update dcui_template_setting set 
								  field_status='".$field_status_value."', 
								  table_field='".$table_field_value."', 
								  field_title_display='".$field_title_display."', 
								  field_name='".$field_name_value."', 
								  field_type='".$field_type_value."', 
								  field_display='".$field_display_value."', 
								  field_limit='".$field_limit_value."', 
								  field_position='".$field_position_value."', 
								  field_remark='".$field_remark_value."',
								  price_currency='".$price_currency."',
								  price_note='".$price_note."'
								  where id='".$items_update."'"))
			$success='<font color="#336600">Field created successfully.</font>';
		else
			$success='<font color="#CC3300">Failed to create field</font>';
				
				
		}
	}
}
/*		
if($_POST['display']=='Unactivate'){	
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			$del_data="update dcui_template_setting set status='-1' where id='$items_delete'";
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
			$del_data="update dcui_template_setting set status='1' where id='$items_delete'";
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
			$del_data="update dcui_template_setting set lock_status='true' where id='".$items_lock."'";
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
			$del_data="update dcui_template_setting set lock_status='' where id='".$items_lock."'";
			mysqli_select_db($conn, $database_pamconnection);
			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			
		}
	}
}
*/


if($_POST['copy']=='Copy & Paste'){	
	
	$copy_data_query = mysqli_query($conn, "select * from dcui_template_setting WHERE section_id='".$section_id."' ");
	$copy_data = mysqli_fetch_assoc($copy_data_query);
			//if(
			   do{
				/*  echo "".$copy_data['field_name'];*/
			  mysqli_query($conn, "INSERT INTO dcui_template_setting ( id, section_id, table_field, field_title_display, field_status, field_name, field_limit, field_type, field_position, field_display, field_remark, price_currency, price_note, status, date_posted) 
			values ('','".$_POST['to']."','".$copy_data['table_field']."','".$copy_data['field_title_display']."','".$copy_data['field_status']."','".$copy_data['field_name']."','".$copy_data['field_limit']."','".$copy_data['field_type']."','".$copy_data['field_position']."','".$copy_data['field_display']."','".$copy_data['field_remark']."','".$copy_data['price_currency']."','".$copy_data['price_note']."','".$copy_data['status']."','".date("Y-m-d")."')");
			   }while($copy_data = mysqli_fetch_assoc($copy_data_query));
			 //  )
				//$success='<font color="#336600">Layout added</font>';
		//	else
				//$success='<font color="#CC3300">Failed to add Layout</font>';

}



if($_POST['delete']=="Delete")
{		
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
			mysqli_query($conn, "DELETE FROM dcui_template_setting WHERE id='".$items_delete."' ");
		}
	}
}

	$query="SELECT * FROM dcui_template_setting WHERE status=1 and section_id='".$section_id."' ORDER BY field_position ASC, field_name ASC, id desc";

	$currentPage = $_SERVER["PHP_SELF"];	
	$maxRows_Rs1 = 40;
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
    <td align="left" valign="top">
      <table width="100%" align="left" cellpadding="2"  cellspacing="2" border="0">
        <form name="form1" method="post" action="createfield.php?m=<?php echo $_GET['m']?>" enctype="multipart/form-data">
          <tr>
            <td colspan="3" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">CREATE FIELD</td>
          </tr>
          <tr>
            <td colspan="3" class="main_title"><?php echo $success;?></td>
          </tr>
          <tr>
            <td colspan="2" class="red">*Indicate required fields </td>
          </tr> 
          
          <tr>
            <th width="37%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span>Table Field Column :&nbsp;</th>
            <td width="63%">
<?

$rr1 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field1' ");
$ff1 = mysqli_num_rows($rr1);
$rr2 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field2' ");
$ff2 = mysqli_num_rows($rr2);
$rr3 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field3' ");
$ff3 = mysqli_num_rows($rr3);
$rr4 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field4' ");
$ff4 = mysqli_num_rows($rr4);
$rr5 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field5' ");
$ff5 = mysqli_num_rows($rr5);
$rr6 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field6' ");
$ff6 = mysqli_num_rows($rr6);
$rr7 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field7' ");
$ff7 = mysqli_num_rows($rr7);
$rr8 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field8' ");
$ff8 = mysqli_num_rows($rr8);
$rr9 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field9' ");
$ff9 = mysqli_num_rows($rr9);
$rr10 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field10' ");
$ff10 = mysqli_num_rows($rr10);
$rr11 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field11' ");
$ff11 = mysqli_num_rows($rr11);
$rr12 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field12' ");
$ff12 = mysqli_num_rows($rr12);
$rr13 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field13' ");
$ff13 = mysqli_num_rows($rr13);
$rr14 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field14' ");
$ff14 = mysqli_num_rows($rr14);
$rr15 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field15' ");
$ff15 = mysqli_num_rows($rr15);
$rr16 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field16' ");
$ff16 = mysqli_num_rows($rr16);
$rr17 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field17' ");
$ff17 = mysqli_num_rows($rr17);
$rr18 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field18' ");
$ff18 = mysqli_num_rows($rr18);
$rr19 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field19' ");
$ff19 = mysqli_num_rows($rr19);
$rr20 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field20' ");
$ff20 = mysqli_num_rows($rr20);
$rr21 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field21' ");
$ff21 = mysqli_num_rows($rr21);
$rr22 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field22' ");
$ff22 = mysqli_num_rows($rr22);
$rr23 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field23' ");
$ff23 = mysqli_num_rows($rr23);
$rr24 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field24' ");
$ff24 = mysqli_num_rows($rr24);
$rr25 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field25' ");
$ff25 = mysqli_num_rows($rr25);
$rr26 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field26' ");
$ff26 = mysqli_num_rows($rr26);
$rr27 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field27' ");
$ff27 = mysqli_num_rows($rr27);
$rr28 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field28' ");
$ff28 = mysqli_num_rows($rr28);
$rr29 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field29' ");
$ff29 = mysqli_num_rows($rr29);
$rr30 = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE section_id!='' and section_id='".$section_id."' and table_field='field30' ");
$ff30 = mysqli_num_rows($rr30);
?>            
            
            <select name="table_field">
            	<?php if($ff1==''){?><option value="field1">Field 1 (Alphanumeric)</option><?php }?>
            	<?php if($ff2==''){?><option value="field2">Field 2 (Alphanumeric)</option><?php }?>
                <?php if($ff3==''){?><option value="field3">Field 3 (Alphanumeric)</option><?php }?>
                <?php if($ff4==''){?><option value="field4">Field 4 (Alphanumeric)</option><?php }?>
                <?php if($ff5==''){?><option value="field5">Field 5 (Alphanumeric)</option><?php }?>
                <?php if($ff6==''){?><option value="field6">Field 6 (Alphanumeric)</option><?php }?>
                <?php if($ff7==''){?><option value="field7">Field 7 (Alphanumeric)</option><?php }?>
                <?php if($ff8==''){?><option value="field8">Field 8 (Alphanumeric)</option><?php }?>
                <?php if($ff9==''){?><option value="field9">Field 9 (Alphanumeric)</option><?php }?>
                <?php if($ff10==''){?><option value="field10">Field 10 (Alphanumeric)</option><?php }?>
                <?php if($ff11==''){?><option value="field11">Field 11 (Alphanumeric)</option><?php }?>
                <?php if($ff12==''){?><option value="field12">Field 12 (Alphanumeric)</option><?php }?>
                <?php if($ff13==''){?><option value="field13">Field 13 (Alphanumeric)</option><?php }?>
                <?php if($ff14==''){?><option value="field14">Field 14 (Alphanumeric)</option><?php }?>
                <?php if($ff15==''){?><option value="field15">Field 15 (Alphanumeric)</option><?php }?>
                <?php if($ff16==''){?><option value="field16">Field 16 (Alphanumeric)</option><?php }?>
                <?php if($ff17==''){?><option value="field17">Field 17 (Alphanumeric)</option><?php }?>
                <?php if($ff18==''){?><option value="field18">Field 18 (Alphanumeric)</option><?php }?>
                <?php if($ff19==''){?><option value="field19">Field 19 (Alphanumeric)</option><?php }?>
                <?php if($ff20==''){?><option value="field20">Field 20 (Alphanumeric)</option><?php }?>
                <?php if($ff21==''){?><option value="field21">Field 21 (Alphanumeric)</option><?php }?>
                <?php if($ff22==''){?><option value="field22">Field 22 (Alphanumeric)</option><?php }?>
                <?php if($ff23==''){?><option value="field23">Field 23 (Alphanumeric)</option><?php }?>
                <?php if($ff24==''){?><option value="field24">Field 24 (Alphanumeric)</option><?php }?>
                <?php if($ff25==''){?><option value="field25">Field 25 (Numeric only)</option><?php }?>
                <?php if($ff26==''){?><option value="field26">Field 26 (Numeric only)</option><?php }?>
                <?php if($ff27==''){?><option value="field27">Field 27 (Numeric only)</option><?php }?>
                <?php if($ff28==''){?><option value="field28">Field 28 (Numeric only)</option><?php }?>
                <?php if($ff29==''){?><option value="field29">Field 29 (Numeric only)</option><?php }?>
                <?php if($ff30==''){?><option value="field30">Field 30 (Numeric only)</option><?php }?>
            </select>
            </td>
          </tr>                   
          <tr>
            <th width="37%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span>Field Name :&nbsp;</th>
            <td width="63%"><input type="text" name="field_name">
            <br><span class="red02">Example: Title, Photo1, Photo2, Price, Description, PDF01, PDF02, etc..</span>
            </td>
          </tr>
          
          <tr>
            <th width="37%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Field Display on:&nbsp;</th>
            <td width="63%">
            <select name="field_display">
            	<option value="">-Select Display on-</option>
                <option value="0">Dont Display</option>
            	<option value="1">Listing page Only</option>
            	<option value="2">Detail page Only</option>
            	<option value="3">Listing page & Detail page</option>
            </select>
            
            
            
            </td>
          </tr>
          <tr>
            <th width="37%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Field Type:&nbsp;</th>
            <td width="63%">
            <select name="field_type">
            	<option value="text">text field</option>
            	<option value="textarea">textarea field</option>
                <option value="tiny">tiny field</option>
                <option value="file">File browse(Image)</option>
                <option value="file02">File browse(PDF)</option>
                <option value="position">Positing</option>
                <option value="price">Price</option>
            </select>
            </td>
          </tr>               
          
          <tr>
            <th width="37%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Field Limit:&nbsp;</th>
            <td width="63%">
            <select name="field_limit">
            	<option value="">no Limit</option>
            	<option value="11">Limit to 11</option>
                <option value="20">Limit to 20</option>
                <option value="50">Limit to 50</option>
                <option value="100">Limit to 100</option>
                <option value="500">Limit to 500</option>
                <option value="1000">Limit to 1000</option>
            </select>
            </td>
          </tr>          
          <tr>
            <th width="37%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Field Position:&nbsp;</th>
            <td width="63%"><input type="text" name="field_position"></td>
          </tr>   
          <tr>
            <th width="37%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Field Remark:&nbsp;</th>
            <td width="63%"><textarea type="text" name="field_remark" style="width:300px; height:60px;"></textarea></td>
          </tr>    
                          
          
          <tr>
            <td>&nbsp;</td>
            <td align="left">
              <input type="submit" name="submit" value=" Submit " onClick="return check();">
&nbsp;
              <input type="reset" name="reset" value=" Reset ">            </td>
          </tr>
        </form>
    </table></td>
  </tr>
  
  <tr><td>
<form name="form3" method="post" action="createfield.php?m=<?php echo $_GET['m']?>" enctype="multipart/form-data">
<div style=" border:#999 solid 1px; padding:5px 3px 5px 3px; margin:5px 2px 2px 2px;" class="content01">
	
				&nbsp;Duplicate current section's field to new section. 
                      
                    <?php 
						$to_qry=mysqli_query($conn, "select * from murum_section where status=1 and url_file='custom_field.php' order by position asc"); 
						$to_prod_set=mysqli_fetch_assoc($to_qry); 
					?>
				<select name="to">
                    <option value="">-Paste To-</option>
                    <?php do{ 
					if($to_prod_set['maincat_id']!=$section_id){
					?>
                    <option value="<?php echo $to_prod_set['maincat_id'];?>"><?php echo $to_prod_set['maincat_name']; ?><?php echo $to_prod_set['maincat_id'];?></option>
                    <?php }}while($to_prod_set=mysqli_fetch_assoc($to_qry)); ?>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="copy" value="Copy & Paste" onClick="return saveUpdate();" title="Copy Layout into selected Product" style="width:120px; color:#333;">&nbsp;&nbsp;
</div>  
</form>
  </td></tr>
  <tr><td>&nbsp;</td></tr>  
  
  <tr>
    <td>
      <table width="630" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE FIELD</span></td>
        </tr>
        <tr>
          <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">
              <tr>
                <td width="636" height="244" align="left" valign="top"><div align="left">
                    <form name="form2" method="post" action="createfield.php?m=<?php echo $_GET['m']?>">
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
              
                      <div class="function">
                      <div >
                       <span class="content">Select
                            <input type="checkbox" name="checkbox" value="checkbox" checked disabled>
                        to:
                        <!--<input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)"> -->
                    <!-- &nbsp;
                     <input type="submit" name="display" value="Unactivate" onClick="return deleteProduct5();" title="Unactivate selected item(s)" style="width:90px; color:#333;"/> -->
&nbsp;
<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;"><!--&nbsp;
<input type="submit" name="update" value="Lock" onClick="return deleteProduct5();" title="Lock item(s)" style="width:90px; color:#333;">&nbsp;
<input type="submit" name="update" value="Unlock" onClick="return deleteProduct5();" title="Unlock item(s)" style="width:90px; color:#333;">
                      -->
                     
                      </span></div>
                      
                      <table border="0" cellpadding="4" cellspacing="1" width="100%">
                        <tr bgcolor="#CCCCCC">
                          <th width="5%" class="content">
                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>
                          <th width="38%" class="content" colspan="2"> Field Setting </th>
                          <th width="19%" class="content" align="center"> Remark </th>
                        </tr>
                        <tr>
                          <td colspan="2"></td>
                        </tr>
                        <?php  $count=1;
						if($row_Rs1!='')
						{
							do
							{?>
								
							
								
								<?php 
								
				if($count%2==0)
				$bgcolor='#E6E6E6';
				else
				$bgcolor='#FFFFFF';
				?>
                        <tr bgcolor="<?php echo $bgcolor;?>">
                          <td align="left" class="content" valign="top">
                          
                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['id'];?>">
                          
                          <input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]" >&nbsp;
                          </td>
                             
                         <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                           <tr>
                             <td><span class="content01">Field Name</span></td>
                             <td><input type="text" name="<?php echo 'field_name'.$row_Rs1['id'];?>" value="<?php echo $row_Rs1['field_name']; ?>" style="width:100px;" class="content01">
                             </td>
                             </tr>
                           <tr>
                             <td><span class="content01">Type:</span> </td>
                             <td>
			<select name="<?php echo 'field_type'.$row_Rs1['id'];?>" class="content01">
            	<option value="text"<?php if($row_Rs1['field_type']=='text'){?> selected<?php }?>>text field</option>
            	<option value="textarea"<?php if($row_Rs1['field_type']=='textarea'){?> selected<?php }?>>textarea field</option>
                <option value="tiny"<?php if($row_Rs1['field_type']=='tiny'){?> selected<?php }?>>tiny field</option>
                <option value="file"<?php if($row_Rs1['field_type']=='file'){?> selected<?php }?>>File browse(Image)</option>
                <option value="file02"<?php if($row_Rs1['field_type']=='file02'){?> selected<?php }?>>File browse(PDF)</option>
                <option value="position"<?php if($row_Rs1['field_type']=='position'){?> selected<?php }?>>Positing</option>
                <option value="price"<?php if($row_Rs1['field_type']=='price'){?> selected<?php }?>>Price</option>
            </select>
                             
                                                     
                             </td>
                             </tr>
                           
<tr>
    <td><span class="content01">Table Field</span></td>
    <td>
    <select name="<?php echo 'table_field'.$row_Rs1['id'];?>" class="content01">
                <option value="">Undefined</option>            
            	<?php if($ff1==''||$row_Rs1['table_field']=='field1'){?>
<option value="field1"<?php if($row_Rs1['table_field']=='field1'){?> selected<?php }?>>Field 1 (Alphanumeric)</option><?php }?>
            	<?php if($ff2==''||$row_Rs1['table_field']=='field2'){?>
<option value="field2"<?php if($row_Rs1['table_field']=='field2'){?> selected<?php }?>>Field 2 (Alphanumeric)</option><?php }?>
                <?php if($ff3==''||$row_Rs1['table_field']=='field3'){?>
<option value="field3"<?php if($row_Rs1['table_field']=='field3'){?> selected<?php }?>>Field 3 (Alphanumeric)</option><?php }?>
                <?php if($ff4==''||$row_Rs1['table_field']=='field4'){?>
<option value="field4"<?php if($row_Rs1['table_field']=='field4'){?> selected<?php }?>>Field 4 (Alphanumeric)</option><?php }?>
                <?php if($ff5==''||$row_Rs1['table_field']=='field5'){?>
<option value="field5"<?php if($row_Rs1['table_field']=='field5'){?> selected<?php }?>>Field 5 (Alphanumeric)</option><?php }?>
                <?php if($ff6==''||$row_Rs1['table_field']=='field6'){?>
<option value="field6"<?php if($row_Rs1['table_field']=='field6'){?> selected<?php }?>>Field 6 (Alphanumeric)</option><?php }?>
                <?php if($ff7==''||$row_Rs1['table_field']=='field7'){?>
<option value="field7"<?php if($row_Rs1['table_field']=='field7'){?> selected<?php }?>>Field 7 (Alphanumeric)</option><?php }?>
                <?php if($ff8==''||$row_Rs1['table_field']=='field8'){?>
<option value="field8"<?php if($row_Rs1['table_field']=='field8'){?> selected<?php }?>>Field 8 (Alphanumeric)</option><?php }?>
                <?php if($ff9==''||$row_Rs1['table_field']=='field9'){?>
<option value="field9"<?php if($row_Rs1['table_field']=='field9'){?> selected<?php }?>>Field 9 (Alphanumeric)</option><?php }?>
                <?php if($ff10==''||$row_Rs1['table_field']=='field10'){?>
<option value="field10"<?php if($row_Rs1['table_field']=='field10'){?> selected<?php }?>>Field 10 (Alphanumeric)</option><?php }?>
                <?php if($ff11==''||$row_Rs1['table_field']=='field11'){?>
<option value="field11"<?php if($row_Rs1['table_field']=='field11'){?> selected<?php }?>>Field 11 (Alphanumeric)</option><?php }?>
                <?php if($ff12==''||$row_Rs1['table_field']=='field12'){?>
<option value="field12"<?php if($row_Rs1['table_field']=='field12'){?> selected<?php }?>>Field 12 (Alphanumeric)</option><?php }?>
                <?php if($ff13==''||$row_Rs1['table_field']=='field13'){?>
<option value="field13"<?php if($row_Rs1['table_field']=='field13'){?> selected<?php }?>>Field 13 (Alphanumeric)</option><?php }?>
                <?php if($ff14==''||$row_Rs1['table_field']=='field14'){?>
<option value="field14"<?php if($row_Rs1['table_field']=='field14'){?> selected<?php }?>>Field 14 (Alphanumeric)</option><?php }?>
                <?php if($ff15==''||$row_Rs1['table_field']=='field15'){?>
<option value="field15"<?php if($row_Rs1['table_field']=='field15'){?> selected<?php }?>>Field 15 (Alphanumeric)</option><?php }?>
                <?php if($ff16==''||$row_Rs1['table_field']=='field16'){?>
<option value="field16"<?php if($row_Rs1['table_field']=='field16'){?> selected<?php }?>>Field 16 (Alphanumeric)</option><?php }?>
                <?php if($ff17==''||$row_Rs1['table_field']=='field17'){?>
<option value="field17"<?php if($row_Rs1['table_field']=='field17'){?> selected<?php }?>>Field 17 (Alphanumeric)</option><?php }?>
                <?php if($ff18==''||$row_Rs1['table_field']=='field18'){?>
<option value="field18"<?php if($row_Rs1['table_field']=='field18'){?> selected<?php }?>>Field 18 (Alphanumeric)</option><?php }?>
                <?php if($ff19==''||$row_Rs1['table_field']=='field19'){?>
<option value="field19"<?php if($row_Rs1['table_field']=='field19'){?> selected<?php }?>>Field 19 (Alphanumeric)</option><?php }?>
                <?php if($ff20==''||$row_Rs1['table_field']=='field20'){?>
<option value="field20"<?php if($row_Rs1['table_field']=='field20'){?> selected<?php }?>>Field 20 (Alphanumeric)</option><?php }?>
                <?php if($ff21==''||$row_Rs1['table_field']=='field21'){?>
<option value="field21"<?php if($row_Rs1['table_field']=='field21'){?> selected<?php }?>>Field 21 (Alphanumeric)</option><?php }?>
                <?php if($ff22==''||$row_Rs1['table_field']=='field22'){?>
<option value="field22"<?php if($row_Rs1['table_field']=='field22'){?> selected<?php }?>>Field 22 (Alphanumeric)</option><?php }?>
                <?php if($ff23==''||$row_Rs1['table_field']=='field23'){?>
<option value="field23"<?php if($row_Rs1['table_field']=='field23'){?> selected<?php }?>>Field 23 (Alphanumeric)</option><?php }?>
                <?php if($ff24==''||$row_Rs1['table_field']=='field24'){?>
<option value="field24"<?php if($row_Rs1['table_field']=='field24'){?> selected<?php }?>>Field 24 (Alphanumeric)</option><?php }?>
                <?php if($ff25==''||$row_Rs1['table_field']=='field25'){?>
<option value="field25"<?php if($row_Rs1['table_field']=='field25'){?> selected<?php }?>>Field 25 (Numeric)</option><?php }?>
                <?php if($ff26==''||$row_Rs1['table_field']=='field26'){?>
<option value="field26"<?php if($row_Rs1['table_field']=='field26'){?> selected<?php }?>>Field 26 (Numeric)</option><?php }?>
                <?php if($ff27==''||$row_Rs1['table_field']=='field27'){?>
<option value="field27"<?php if($row_Rs1['table_field']=='field27'){?> selected<?php }?>>Field 27 (Numeric)</option><?php }?>
                <?php if($ff28==''||$row_Rs1['table_field']=='field28'){?>
<option value="field28"<?php if($row_Rs1['table_field']=='field28'){?> selected<?php }?>>Field 28 (Numeric)</option><?php }?>
                <?php if($ff29==''||$row_Rs1['table_field']=='field29'){?>
<option value="field29"<?php if($row_Rs1['table_field']=='field29'){?> selected<?php }?>>Field 29 (Numeric)</option><?php }?>
                <?php if($ff30==''||$row_Rs1['table_field']=='field30'){?>
<option value="field30"<?php if($row_Rs1['table_field']=='field30'){?> selected<?php }?>>Field 30 (Numeric)</option><?php }?>
                
                
            </select>
    
    
    </td>
  </tr>  
<tr>
    <td><span class="content01">Field Title</span></td>
    <td class="content01">
    
    <label><input type="radio" name="<?php echo 'field_title_display'.$row_Rs1['id'];?>" value="1"<?php if($row_Rs1['field_title_display']==1){?> checked<?php }?>> Show</label><br>
    <label><input type="radio" name="<?php echo 'field_title_display'.$row_Rs1['id'];?>" value="0"<?php if($row_Rs1['field_title_display']!=1){?> checked<?php }?>> Dont Show</label>
    
    </td>
  </tr>  
                             
</table>
                           </td>
                           <td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="2">

  <tr>
    <td><span class="content01">Display </span></td>
    <td><select name="<?php echo 'field_display'.$row_Rs1['id'];?>" class="content01">
      <option value="">-Select Display on-</option>
      <option value="0"<?php if($row_Rs1['field_display']==0){?> selected<?php }?>>Dont Display</option>
      <option value="1"<?php if($row_Rs1['field_display']==1){?> selected<?php }?>>Listing page Only</option>
      <option value="2"<?php if($row_Rs1['field_display']==2){?> selected<?php }?>>Detail page Only</option>
      <option value="3"<?php if($row_Rs1['field_display']==3){?> selected<?php }?>>Listing page & Detail page</option>
    </select></td>
  </tr>
  <tr>
    <td><span class="content01">Limit</span></td>
    <td><select name="<?php echo 'field_limit'.$row_Rs1['id'];?>" class="content01">
      <option value="">no Limit</option>
      <option value="11"<?php if($row_Rs1['field_limit']==11){?> selected<?php }?>>Limit to 11</option>
      <option value="20"<?php if($row_Rs1['field_limit']==20){?> selected<?php }?>>Limit to 20</option>
      <option value="50"<?php if($row_Rs1['field_limit']==50){?> selected<?php }?>>Limit to 50</option>
      <option value="100"<?php if($row_Rs1['field_limit']==100){?> selected<?php }?>>Limit to 100</option>
      <option value="500"<?php if($row_Rs1['field_limit']==500){?> selected<?php }?>>Limit to 500</option>
      <option value="1000"<?php if($row_Rs1['field_limit']==1000){?> selected<?php }?>>Limit to 1000</option>
    </select></td>
  </tr>
  
<tr>
    <td><span class="content01">Position</span></td>
    <td><input type="text" name="<?php echo 'field_position'.$row_Rs1['id'];?>" value="<?php echo $row_Rs1['field_position']; ?>" style="width:24px;" class="content01"></td>
  </tr>  
 
<?php if($row_Rs1['field_type']=='price'){?>  
<tr>
    <td><span class="content01">Currency</span></td>
    <td><input type="text" name="<?php echo 'price_currency'.$row_Rs1['id'];?>" value="<?php echo $row_Rs1['price_currency']; ?>" style="width:90px;" class="content01"></td>
  </tr>
<tr>
    <td><span class="content01">Per unit</span></td>
    <td><input type="text" name="<?php echo 'price_note'.$row_Rs1['id'];?>" value="<?php echo $row_Rs1['price_note']; ?>" style="width:90px;" class="content01"></td>
  </tr>    
 <?php }?>
</table></td>
              

                           <td valign="top" class="content01">
                           <label><input type="radio" name="<?php echo 'field_status'.$row_Rs1['id'];?>" value="1"<?php if($row_Rs1['field_status']==1){?> checked<?php }?>> On</label>
                            <label><input type="radio" name="<?php echo 'field_status'.$row_Rs1['id'];?>" value="0"<?php if($row_Rs1['field_status']!=1){?> checked<?php }?>> Off</label><br><br>
                           
<textarea name="<?php echo 'field_remark'.$row_Rs1['id'];?>" style="width:110px; height:58px;" class="content01"><?php echo $row_Rs1['field_remark']; ?></textarea>
                          </td>                          
                        </tr>
                        <?php  $count++;?>
                        <?
						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));
							
					}
					else
					{ ?>
                        <tr>
                          <th width="5%"></th>
                          <td colspan="6" class="content">No Record Found.</td>
                          <!--<td></td>-->
                        </tr>
                        <?php }?>

                      </table>
                    </form>
                </div></td>
              </tr>
              <!--<tr>
                <td colspan="4"><div align="left" class="content">
                    <?php /* if ($totalRows_Rs1 > 0 ) { ?>
&nbsp;Total Records <?php echo ($startRow_Rs1 + 1) ?> to <?php echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1) ?> of <?php echo $totalRows_Rs1 ?> <br>
&nbsp;<a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, 0, $queryString_Rs1); ?>">First</a> <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, max(0, $pageNum_Rs1 - 1), $queryString_Rs1); ?>">| Previous</a> | <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, min($totalPages_Rs1, $pageNum_Rs1 + 1), $queryString_Rs1); ?>">Next</a> <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, $totalPages_Rs1, $queryString_Rs1); ?>">| Last</a> |
                    <?php } */?>
                </div></td>
              </tr> -->
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
