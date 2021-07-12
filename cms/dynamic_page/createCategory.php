<? 

require_once('../../Connections/pamconnection.php');

require_once('../../pro/security.php');

session_start();

	if($_SESSION['validation']=='YES')

	{}	

	else{

	header("Location:../authentication/login.php");

	}

//******************************************Add Country*************************************************





	if($_GET['wp']=='1'&&$_GET['cat']!=''){

		

		$catG = $defenders->escapeInjection(base64_decode($_GET['cat']));

		

		$ssss = mysqli_query($conn, "select photo from murum_section where maincat_id='".$catG ."' ");

		$asdss= mysqli_fetch_assoc($ssss);

		$myFile = "../../photo/".$asdss['photo'];

			if(file_exists($myFile)){

			@unlink($myFile);

			}

			mysqli_query($conn, "update murum_section set photo='' where maincat_id='".$catG ."'");

	}elseif($_GET['wp']=='2'&&$_GET['cat']!=''){

		

		$catG = $defenders->escapeInjection(base64_decode($_GET['cat']));

		

		$ssss = mysqli_query($conn, "select brand_logo from murum_section where maincat_id='".$catG ."' ");

		$asdss= mysqli_fetch_assoc($ssss);

		$myFile = "../../photo/".$asdss['brand_logo'];

			if(file_exists($myFile)){

			@unlink($myFile);

			}

			mysqli_query($conn, "update murum_section set brand_logo='' where maincat_id='".$catG ."'");

		

	}







	$lvl1_curr = '0';

	$lvl2_curr = '0';

	$lvl3_curr = '0';

	$lvl1_max = '';

	$lvl2_max = '';

	$lvl3_max = '';

	

	$current_lvl1_qty_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE (status=1 or status=0) and length(position)=1 ");//and section_type=1

	$current_lvl1_qty = mysqli_num_rows($current_lvl1_qty_query);

	if(!empty($current_lvl1_qty)){ $lvl1_curr = $current_lvl1_qty;}

	

	$current_lvl2_qty_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE (status=1 or status=0) and length(position)=2 ");

	$current_lvl2_qty = mysqli_num_rows($current_lvl2_qty_query);

	if(!empty($current_lvl2_qty)){$lvl2_curr = $current_lvl2_qty;}

	

	$current_lvl3_qty_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE (status=1 or status=0) and length(position)=3 ");

	$current_lvl3_qty = mysqli_num_rows($current_lvl3_qty_query);

	if(!empty($current_lvl3_qty)){$lvl3_curr = $current_lvl3_qty;}

	

	$category1_query = mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE status=1 and id=1");

	$category1_set = mysqli_fetch_assoc($category1_query);

	if(!empty($category1_set['record'])){$lvl1_max = $category1_set['record'];}

	

	$category2_query = mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE status=1 and id=37");

	$category2_set = mysqli_fetch_assoc($category2_query);							

	if(!empty($category2_set['record'])){$lvl2_max = $category2_set['record'];}

	

	$category3_query = mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE status=1 and id=38");

	$category3_set = mysqli_fetch_assoc($category3_query);

	if(!empty($category3_set['record'])){$lvl3_max = $category3_set['record'];}





	if($_POST['submit']==' Submit ')

	{

		if(strlen($_POST['lvlpost']) == 1 && $lvl1_curr >= $lvl1_max){

			$success = '<span style="color:#FF0000">Failed to submit, You has reach the max. level 1 category.</span>';

		}elseif(strlen($_POST['lvlpost']) == 2 && $lvl2_curr >= $lvl2_max){

			$success = '<span style="color:#FF0000">Failed to submit, You has reach the max. level 2 category.</span>';

		}elseif(strlen($_POST['lvlpost']) == 3 && $lvl3_curr >= $lvl3_max){

			$success = '<span style="color:#FF0000">Failed to submit, You has reach the max. level 3 category.</span>';

		}else{

			

			if($_FILES['file']!='')

			{

				$file_source = $_FILES['file']['tmp_name']; 

				$type = $_FILES['file']['type']; 

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

			$lvlpost=mysqli_real_escape_string($conn, $_POST['lvlpost']);

		

			if(mysqli_query($conn, "INSERT INTO murum_section (maincat_id, photo, section_type, maincat_name, status, position, date_posted) 

														VALUES ('', '$file', 1,'".$maincat."', 1, '".$lvlpost."', '".date('Y-m-d')."')"))

				$success='<font color="#336600">category added</font>';

			else

				$success='<font color="#CC3300">Failed to add category</font>';

		}

	}

//*************************************************Manage Country*************************************************









if($_POST['update']=='Save & Sort'){

	

	$items_array = $_POST['productIdListUpdate'];

	

	$items_lvlPost = array();

	$lvl1_upd = 0;

	$lvl2_upd = 0;

	$lvl3_upd = 0;

	

	foreach($items_array as $item_pos)

	{	 

		if(strlen($_POST['position'.$item_pos]) == 1){

			$lvl1_upd++;

		}elseif(strlen($_POST['position'.$item_pos]) == 2){

			$lvl2_upd++;

		}elseif(strlen($_POST['position'.$item_pos]) == 3){

			$lvl3_upd++;

		}

		

		$items_lvlPost[] = $_POST['position'.$item_pos];

	}



	$val_count = array_count_values($items_lvlPost);

	

	if (in_array("2", $val_count) || in_array("3", $val_count) || in_array("4", $val_count) || in_array("5", $val_count) || in_array("6", $val_count)) {

		$success = '<span style="color:#FF0000">Failed to save, duplication of level & position is not allowed.</span>';

	}elseif($lvl1_upd > $lvl1_max){

		$success = '<span style="color:#FF0000">Failed to save, you has reach the max. level 1 category.</span>';

	}elseif($lvl2_upd > $lvl2_max){

		$success = '<span style="color:#FF0000">Failed to save, you has reach the max. level 2 category.</span>';

	}elseif($lvl3_upd > $lvl3_max){

		$success = '<span style="color:#FF0000">Failed to save, you has reach the max. level 3 category.</span>';

	}else{

	

		

		if(!empty($_POST['productIdListUpdate']))

		{

			foreach($items_array as $items_update)

			{	 

		

			if($_FILES['upld_photo'.$items_update]!='')

				{	

					$file_name = $_FILES['upld_photo'.$items_update]['name'];

					$file_source = $_FILES['upld_photo'.$items_update]['tmp_name'];

					$type = $_FILES['upld_photo'.$items_update]['type']; 

					

					$file = ''; 

					$ext = substr(strrchr($type, "/"), 1);

				

					switch ( $ext )

					{ 

						case 'pjpeg':

							$file = $file_name;

							break;

						case 'jpg':

							$file = $file_name;

							break;

						case 'jpeg':

							$file = $file_name;

							break;

						case 'gif':

							$file = $file_name;

							break;

						case 'png':

							$file = $file_name;

							break;

					}

					if (( $file != '' ))

					{ 

						if ( move_uploaded_file( $file_source, "../../photo/".$file )) 

						{

							mysqli_query($conn, "update murum_section set photo='".$file."' where maincat_id='".$items_update."'");

							

						} 

						else 

						{

							echo 'File could not be uploaded to server.<BR>';

						} 

					}

				}	

				

			if($_FILES['brand'.$items_update]!='')

				{

					$file_name = $_FILES['brand'.$items_update]['name'];

					$file_source = $_FILES['brand'.$items_update]['tmp_name'];

					$type = $_FILES['brand'.$items_update]['type']; 

					$file02 = ''; 

					$ext = substr(strrchr($type, "/"), 1);

				

					switch ( $ext )

					{ 

						case 'pjpeg':

							$file02 = $file_name;

							break;

						case 'jpg':

							$file02 = $file_name;

							break;

						case 'jpeg':

							$file02 = $file_name;

							break;

						case 'gif':

							$file02 = $file_name;

							break;

						case 'png':

							$file02 = $file_name;

							break;

					}

					if (( $file02 != '' ))

					{ 

						if ( move_uploaded_file( $file_source, "../../photo/".$file02 )) 

						{

							mysqli_query($conn, "update murum_section set brand_logo='".$file02."' where maincat_id='".$items_update."'");

							

						} 

						else 

						{

							echo 'File could not be uploaded to server.<BR>';

						} 

					}

				}					

			

				$position_value = $defenders->escapeInjection($_POST['position'.$items_update]);

				$mcat_name = $defenders->escapeInjection($_POST['maincat_name'.$items_update]);

				$showing = $defenders->escapeInjection($_POST['showing'.$items_update]);

				

				$del_data="update murum_section set position='".$position_value."', maincat_name='".$mcat_name."', showing='".$showing."' where maincat_id='".$items_update."'";

				mysqli_select_db($conn, $database_pamconnection);

				$dataResult1 = mysqli_query($conn, $del_data, $pamconnection) or die(mysqli_error());			

			}

		}

	}

}

		

if($_POST['display']=='Hide'){

	

	$items_hide_array = $_POST['productIdList'];

	

	if(!empty($_POST['productIdList'])){

		foreach($items_hide_array as $items_hide){

			

			$firstLen_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE maincat_id='".$items_hide ."'");

			$firstLen= mysqli_fetch_assoc($firstLen_query);

			$p = $firstLen['position'];

			

			if($firstLen['position'] == '0'){

					$hide_data="update murum_section set status='0' where maincat_id='".$items_hide."'";

					mysqli_select_db($conn, $database_pamconnection);

					$dataResult1 = mysqli_query($conn, $hide_data, $pamconnection) or die(mysqli_error());

			}else{

			

				if(strlen($firstLen['position'])=='1'){

					$secondtLen_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position LIKE '$p%' and length(position)=2");

					$secondtLen= mysqli_fetch_assoc($secondtLen_query);

					do{

						$hide_data="UPDATE murum_section set status='0', position='0' where maincat_id='".$secondtLen['maincat_id']."'";

						mysqli_select_db($conn, $database_pamconnection);

						$dataResult1 = mysqli_query($conn, $hide_data, $pamconnection) or die(mysqli_error());

					}while($secondtLen= mysqli_fetch_assoc($secondtLen_query));	

					

					$hide_data="update murum_section set status='0', position='0' where maincat_id='".$items_hide."'";

					mysqli_select_db($conn, $database_pamconnection);

					$dataResult1 = mysqli_query($conn, $hide_data, $pamconnection) or die(mysqli_error());

					

				}else{

					$hide_data="update murum_section set status='0', position='0' where maincat_id='".$items_hide."'";

					mysqli_select_db($conn, $database_pamconnection);

					$dataResult1 = mysqli_query($conn, $hide_data, $pamconnection) or die(mysqli_error());			

				}

			}

			$product_query = mysqli_query($conn, "UPDATE mydf_product SET maincat_id='' WHERE maincat_id like '%|".$items_hide."|%'");

		}

	}

}

if($_POST['display']=='Display'){	

	$items_display_array=$_POST['productIdList'];

	

	if(!empty($_POST['productIdList'])){

		foreach($items_display_array as $items_display){

			$display_data="update murum_section set status='1' where maincat_id='".$items_display."'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $display_data, $pamconnection) or die(mysqli_error());			

		}

	}

}



if($_POST['trash']=="Trash"){		

	$items_trash_array=$_POST['productIdList'];

	

	if(!empty($_POST['productIdList'])){

		foreach($items_trash_array as $items_trash){

			$trash_data="UPDATE murum_section SET status='-1' WHERE maincat_id='".$items_trash."'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $trash_data, $pamconnection) or die(mysqli_error());

			

			$product_query = mysqli_query($conn, "UPDATE mydf_product SET maincat_id='' WHERE maincat_id like '%|".$items_trash."|%'");

		}

	}

}



if($_POST['restore']=='Restore'){	

	$items_restore_array=$_POST['productIdList'];

	

	if(!empty($_POST['productIdList'])){

		foreach($items_restore_array as $items_restore){

			$restore_data="update murum_section set status='0' where maincat_id='".$items_restore."'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $restore_data, $pamconnection) or die(mysqli_error());			

		}

	}

}



if($_POST['delete']=='Delete'){	

	$items_delete_array=$_POST['productIdList'];

	if(!empty($_POST['productIdList'])){

		foreach($items_delete_array as $items_delete){

			$del_data="DELETE FROM murum_section WHERE maincat_id='".$items_delete."' and status='-1'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $del_data, $pamconnection) or die(mysqli_error());

		}

	}

}



if($_GET['tab']=="approvedondisplay"||$_GET['tab']==""){

	$status_cond =" status = '1' ";

}else if($_GET['tab']=="approvednotondisplay"){

	$status_cond =" status = '0' ";

}else if($_GET['tab']=="trash"){

	$status_cond =" status = '-1' ";

}



	$query="SELECT * FROM murum_section WHERE $status_cond ORDER BY position ASC, maincat_name ASC";//and length(position)=1





	$currentPage = $_SERVER["PHP_SELF"];	

	$maxRows_Rs1 = 20;

	$pageNum_Rs1 = 0;

	if(!empty($_GET['pageNum_Rs1'])) {

	  $pageNum_Rs1 = $_GET['pageNum_Rs1'];

	}

	$startRow_Rs1 = $pageNum_Rs1 * $maxRows_Rs1;

	

	$colname_Rs1 = "";

	mysqli_select_db($conn, $database_pamconnection);

	

	$query_limit_Rs1 = sprintf("%s LIMIT %d, %d", $query, $startRow_Rs1, $maxRows_Rs1);

	$Rs1 = mysqli_query($conn, $query_limit_Rs1, $pamconnection) or die(mysqli_error());

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

	

	$query2=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=0 and length(position)=1");//

	$total_testimonial_not_on_display = mysqli_num_rows($query2);

	$query=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and length(position)=1" ); //

	$total_testimonial_on_display = mysqli_num_rows($query);

	$trash_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=-1");

	$total_testimonial_trash = mysqli_num_rows($trash_query);

	

	

	$current_lvl1_qty_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE (status=1 or status=0) and length(position)=1 ");//and section_type=1

	$current_lvl1_qty = mysqli_num_rows($current_lvl1_qty_query);

	if(!empty($current_lvl1_qty)){ $lvl1_curr = $current_lvl1_qty;}

	

	$current_lvl2_qty_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE (status=1 or status=0) and length(position)=2 ");

	$current_lvl2_qty = mysqli_num_rows($current_lvl2_qty_query);

	if(!empty($current_lvl2_qty)){$lvl2_curr = $current_lvl2_qty;}

	

	$current_lvl3_qty_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE (status=1 or status=0) and length(position)=3 ");

	$current_lvl3_qty = mysqli_num_rows($current_lvl3_qty_query);

	if(!empty($current_lvl3_qty)){$lvl3_curr = $current_lvl3_qty;}	

	

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

<script language="javascript">

function check()

{

	if(document.form1.maincatname.value=="")

	{

		alert("Please enter category name.");

		document.form1.maincatname.focus();

		return false;

	}

	if(document.form1.lvlpost.value=="")

	{

		alert("Please define the level and position of category.");

		document.form1.lvlpost.focus();

		return false;

	}	

	

	return true;

}

</script>



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

            <div class="white_title" id="titlename">SECTION AND CATEGORY</div>

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

        <form name="form1" method="post" action="createCategory.php?add=1" enctype="multipart/form-data">

          <tr>

            <td colspan="4" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">CREATE CATEGORY</td>

          </tr>

          <tr>

            <td colspan="4" class="main_title"><? echo $success;?></td>

          </tr>

          <tr>

            <td colspan="4" class="red">*Indicate required fields </td>

          </tr>          

          <tr>

            <th width="25%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span>Add Category :&nbsp;</th>

            <td width="25%" class="content01">

            <input type="text" name="maincatname">

            </td>

            <td width="50%" rowspan="2" valign="top" style="font-size:10px; font-family:Arial, Helvetica, sans-serif; color:#003399;">

            

                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>

                    <td>

                        Max. up to 3 level of category only.<br>

                        Sample of correct level or positioning:

                    </td>

                  </tr>

                  <tr>

                  <td>

                    <table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#999999">

                    

                      <tr>

                        <td bgcolor="#CCCCCC">Level</td>

                        <td bgcolor="#CCCCCC">Sample A</td>

                        <td bgcolor="#CCCCCC">Sample B</td>

                        <td bgcolor="#CCCCCC">Sample C</td>

                        <td bgcolor="#CCCCCC">Used</td>

                        <td bgcolor="#CCCCCC">Max.</td>

                      </tr>                    

                    

                      <tr>

                        <td bgcolor="#FFFEF0">Level 1:</td>

                        <td bgcolor="#FFFEF0">A</td>

                        <td bgcolor="#FFFEF0">B</td>

                        <td bgcolor="#FFFEF0">C</td>

                        <td bgcolor="#FFFEF0"><? echo $lvl1_curr; ?></td>

                        <td bgcolor="#FFFEF0"><? if(!empty($lvl1_max)){ echo $lvl1_max; }?></td>

                      </tr>

                      <tr>

                        <td bgcolor="#FFFEF0">Level 2:</td>

                        <td bgcolor="#FFFEF0">A1</td>

                        <td bgcolor="#FFFEF0">BA</td>

                        <td bgcolor="#FFFEF0">CA</td>

                        <td bgcolor="#FFFEF0"><? echo $lvl2_curr; ?></td>

                        <td bgcolor="#FFFEF0"><? if(!empty($lvl2_max)){ echo $lvl2_max; }?></td>

                      </tr>

                      <tr>

                        <td bgcolor="#FFFEF0">Level 3:</td>

                        <td bgcolor="#FFFEF0">A11</td>

                        <td bgcolor="#FFFEF0">BAA</td>

                        <td bgcolor="#FFFEF0">CA1</td>

                        <td bgcolor="#FFFEF0"><? echo $lvl3_curr; ?></td>

                        <td bgcolor="#FFFEF0"><? if(!empty($lvl3_max)){ echo $lvl3_max; }?></td>

                      </tr>

                    </table>

                    </td>

                  </tr>

                </table>

             </td>

          </tr>

          <tr>

              <td align="right" bgcolor="#EFEFEF" class="main_title">

                  Level & Position

              </td>

              <td class="content01">

                  <input type="text" name="lvlpost" >

              </td>

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

          <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE CATEGORY</span></td>

        </tr>

        <tr>

          <td height="288" align="left" valign="top"><table width="630" align="left" cellpadding="0"  cellspacing="0">

              <tr>

                <td width="636" height="244" align="left" valign="top"><div align="left">

                    <? 

			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>

                    <!--On Display-->

                    <form name="form2" method="post" action="createCategory.php?tab=approvedondisplay" enctype="multipart/form-data">

                    <script>

                    function deleteProduct1(){

                        var id= new Array('productIdList[]');

                        if(id==''){

                            alert("No Item Selected");

                            return false;

                        }

                        

                        var point=confirm("Are You Sure You Want To Delete?");

                        if(point==true){

                            return true;

                        }else{

                            return false;

                        }

                    }

                    </script>

                      <div id="tab">

                        <ul>

                          <li class="current">

                          	<a href="createCategory.php?tab=approvedondisplay" title="Display Product Item Online" class="content">

                            	On Display (<? if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>0<? }?> )</a></li>

                          <li class="">

                          	<a href="createCategory.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">

                            	Not On Display (<? if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>0<? }?> )</a></li>

                          <li class="">

                          	<a href="createCategory.php?tab=trash" title="Trash Product Item Online" class="content">

                            	Trash (<? if ($total_testimonial_trash!=0){ echo $total_testimonial_trash;}else{?>0<? }?> )</a></li>

                        </ul>

                      </div>

                      <div class="function"><span class="content">Select

                            <input type="checkbox" name="checkbox" value="checkbox" checked disabled>

                        to:

        <input type="submit" name="display" value="Hide" title="Hide selected item(s)" style="width:90px; color:#333;"/>&nbsp;&nbsp;

        <input type="submit" name="update" value="Save & Sort" title="Save & Sort item(s) position" style="width:90px; color:#333;">&nbsp;&nbsp;

        <input type="submit" name="trash" value="Trash" onClick="return deleteProduct1();" title="Delete selected item(s)" style="width:90px; color:#333;"/>



                     

                     

                      </span></div>

                      <table border="0" cellpadding="4" cellspacing="1" width="100%">

                        <tr bgcolor="#CCCCCC">

                          <th width="20%" class="content">

                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>

                          <th width="40%" class="content"> Category </th>

                          <!--<th width="39%" class="content" align="center">Brand Logo</th> -->

                          <th width="15%" class="content" align="center">Level & Position </th>

                          <th width="25%" class="content" align="center">Show</th>

                        </tr>

                        <?  $count=1;

					if($row_Rs1!=''){											

						do{

							

							if($count%2==0)

							$bgcolor='#E6E6E6';

							else

							$bgcolor='#FFFFFF';

							

							

							$parentExist_qry = mysqli_query($conn, "SELECT * FROM murum_section 

											WHERE $status_cond and length(position)=1 and position ='".substr($row_Rs1['position'], 0, 1)."' ");

							$parentExist = mysqli_fetch_assoc($parentExist_qry);

							

							if(empty($parentExist) &&  strlen($row_Rs1['position']) > 1 ){

							

				?>

                

 <tr bgcolor="#FFD7D8">

                          <td align="left" class="content" valign="top" colspan="4" style="padding-left:20px;">



                          <div style="float:left; width:60%;">

       						<div>

                          <img src="../images/space.gif" width="1" height="21">

                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">

                          

                          <input type="checkbox" value="<? echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<? }?> >&nbsp;

                          

                            <input type="text" name="<?php echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<? echo $row_Rs1['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?> ><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><? if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><? }?>

                            <span class="red02">index.php?root=<?=base64_encode($row_Rs1['maincat_id'])?></span>

       </div>

                           

       <div style=" float:left; width:140px; position:relative;">

       <img src="../../images/space.gif" width="25" height="10" border="0">

 <? if($row_Rs1['photo']!=''&&file_exists("../../photo/".$row_Rs1['photo'])){?>

         <img src="<? echo "../../photo/".$row_Rs1['photo']?>" width="86" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;"> <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=1&cat=<?=base64_encode($row_Rs1['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>

         <? }?>

         </div>

         <div style="float:left; width:120px; position:relative; overflow:hidden;" align="right">

          <? if($row_Rs1['brand_logo']!=''&&file_exists("../../photo/".$row_Rs1['brand_logo'])){?>

         <img src="<? echo "../../photo/".$row_Rs1['brand_logo']?>" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">     <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=2&cat=<?=base64_encode($row_Rs1['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>

         <? }?>  

         </div>

                           </div>

                           <div style="float:right; width:25%; text-align:center;">

                            <input name="<?php echo 'showing'.$row_Rs1['maincat_id']?>" type="radio" value="true" style="width:30px;" id="<?php echo 'showing'.$row_Rs1['maincat_id']?>On"  <? if($row_Rs1['showing'] == 'true'){?> checked<? }?>>

                            <label for="<?php echo 'showing'.$row_Rs1['maincat_id']?>On">On</label>

                            <input name="<?php echo 'showing'.$row_Rs1['maincat_id']?>" type="radio" value="false" style="width:30px;" id="<?php echo 'showing'.$row_Rs1['maincat_id']?>Off" <? if($row_Rs1['showing'] == 'false'){?> checked<? }?>> 

                            <label for="<?php echo 'showing'.$row_Rs1['maincat_id']?>Off">Off</label>

                            </div>

                          

                           <div style="float:right; width:15%; text-align:center;">

                            <input name="<?php echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?> maxlength="3"> 

                            </div>

                          

                          </td>

                        </tr>                            

                        

                        <? $count++; ?>

                        

                        <? }elseif(strlen($row_Rs1['position']) == 1){?>

							

                    <tr bgcolor="<? echo $bgcolor;?>">

                          <td align="left" class="content" valign="top" colspan="4" style="padding-left:20px;">



                          <div style="float:left; width:60%;">

       						<div>

                          <img src="../images/space.gif" width="1" height="21">

                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">

                          

                          <input type="checkbox" value="<? echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<? }?> >&nbsp;

                          

                            <input type="text" name="<?php echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<? echo $row_Rs1['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?> ><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><? if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><? }?>

                            <span class="red02">index.php?root=<?=base64_encode($row_Rs1['maincat_id'])?></span>

       </div>

                           

       <div style=" float:left; width:140px; position:relative;">

       <img src="../../images/space.gif" width="25" height="10" border="0">

 <? if($row_Rs1['photo']!=''&&file_exists("../../photo/".$row_Rs1['photo'])){?>

         <img src="<? echo "../../photo/".$row_Rs1['photo']?>" width="86" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;"> <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=1&cat=<?=base64_encode($row_Rs1['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>

         <? }?>

         </div>

         

      

         <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

         <input type="file" name="<?php echo 'upld_photo'.$row_Rs1['maincat_id'];?>" style="width:50px;"> 

         </div> -->

         

         <div style="float:left; width:120px; position:relative; overflow:hidden;" align="right">

          <? if($row_Rs1['brand_logo']!=''&&file_exists("../../photo/".$row_Rs1['brand_logo'])){?>

         <img src="<? echo "../../photo/".$row_Rs1['brand_logo']?>" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">     <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=2&cat=<?=base64_encode($row_Rs1['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>

         <? }?>  

         <!--<span class="content01">Brand</span>&nbsp; -->

         </div>

         <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

         <input type="file" name="<?php echo 'brand'.$row_Rs1['maincat_id'];?>" style="width:50px;">

         </div> -->

         

                           

                           

                           </div>

                           <div style="float:right; width:25%; text-align:center;">

                            <input name="<?php echo 'showing'.$row_Rs1['maincat_id']?>" type="radio" value="true" style="width:30px;" id="<?php echo 'showing'.$row_Rs1['maincat_id']?>On"  <? if($row_Rs1['showing'] == 'true'){?> checked<? }?>>

                            <label for="<?php echo 'showing'.$row_Rs1['maincat_id']?>On">On</label>

                            <input name="<?php echo 'showing'.$row_Rs1['maincat_id']?>" type="radio" value="false" style="width:30px;" id="<?php echo 'showing'.$row_Rs1['maincat_id']?>Off" <? if($row_Rs1['showing'] == 'false'){?> checked<? }?>> 

                            <label for="<?php echo 'showing'.$row_Rs1['maincat_id']?>Off">Off</label>

                            

                            </div>

                          

                           <div style="float:right; width:15%; text-align:center;">

                            <input name="<?php echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?> maxlength="3"> 

                            </div>

                          

<?

		$previous_code2 = $row_Rs1['position'];

		$next_position_len2 = 2;

		$next_level_query2 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' ORDER BY position ASC, maincat_name ASC");

		$next_level2 = mysqli_fetch_assoc($next_level_query2);



do{if(strlen($next_level2['position'])==$next_position_len2){ 

?>

          <div style="float:left; width:50%; padding-left:15px;">

           <div style="float:left; width:210px; position:relative; overflow:hidden;">

          <img src="../images/next-arrow.png" width="24" height="21">

         <input name="productIdListUpdate[]" type="hidden" value="<?php echo $next_level2['maincat_id'];?>">

         <input type="checkbox" value="<? echo $next_level2['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level2['maincat_id'];?>" value="<? echo $next_level2['maincat_name']; ?>" style="width:140px;">

         <span class="red02">index.php?root=<?=base64_encode($row_Rs1['maincat_id'])?>&main=<?=base64_encode($next_level2['maincat_id'])?></span>

         </div>

            <div style="float:left; width:120px; position:relative; overflow:hidden;" align="right">

			 <? if($next_level2['brand_logo']!=''&&file_exists("../../photo/".$next_level2['brand_logo'])){?>

                     <img src="<? echo "../../photo/".$next_level2['brand_logo']?>" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">  <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=2&cat=<?=base64_encode($next_level2['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>  

                     <? }?>              

            

             <!--<span class="content01">Brand</span>&nbsp; -->

             </div>

             <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

             <input type="file" name="<?php echo 'brand'.$next_level2['maincat_id'];?>" style="width:50px;">

               </div> -->       

         </div>

         <div style="float:right; width:25%; text-align:center;">&nbsp;</div>

         

         <div style="float:right; width:15%; text-align:center;">

         <input type="text" name="<?php echo 'position'.$next_level2['maincat_id'];?>" value="<? echo $next_level2['position']; ?>" style="width:30px;" maxlength="3">

         </div>

   

<?

		$previous_code3 = $next_level2['position'];

		$next_position_len3 = 3;

		$next_level_query3 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code3."%' ORDER BY position ASC, maincat_name ASC");

		$next_level3 = mysqli_fetch_assoc($next_level_query3);



do{if(strlen($next_level3['position'])>=$next_position_len3){ 

?>

          <div style="float:left; width:50%; padding-left:50px;">

           <div style="float:left; width:210px; position:relative; overflow:hidden;">

          <img src="../images/next-arrow.png" width="24" height="21">

         <input name="productIdListUpdate[]" type="hidden" value="<?php echo $next_level3['maincat_id'];?>">

         <input type="checkbox" value="<? echo $next_level3['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level3['maincat_id'];?>" value="<? echo $next_level3['maincat_name']; ?>" style="width:140px;">

         </div>

         

            <div style="float:left; width:85px; position:relative; overflow:hidden;" align="right">

 <? if($next_level3['brand_logo']!=''&&file_exists("../../photo/".$next_level3['brand_logo'])){?>

         <img src="<? echo "../../photo/".$next_level3['brand_logo']?>" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">    <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=2&cat=<?=base64_encode($next_level3['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>  

         <? }?>                  

             <!--<span class="content01">Brand</span>&nbsp; -->

             </div>

             <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

             <input type="file" name="<?php echo 'brand'.$next_level3['maincat_id'];?>" style="width:50px;">

               </div>       -->   

         

         

         

         </div>

         <div style="float:right; width:25%; text-align:center;">&nbsp;</div>

         

         <div style="float:right; width:15%; text-align:center;">         

         <input type="text" name="<?php echo 'position'.$next_level3['maincat_id'];?>" value="<? echo $next_level3['position']; ?>" style="width:30px;" maxlength="3">

         </div>

   

   <? }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    

   <? }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));?>

   

   



                          

                          </td>

                        </tr>                            

							

						<? $count++;}

						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));

							

					}else{ ?>

                        <tr>

                          <th width="20%"></th>

                          <td colspan="6" class="content">No Record Found.</td>

                          <!--<td></td>-->

                        </tr>

                        <? } ?>

                        

                        

<?				/*			

		$escape_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and length(position)>=2 ORDER BY position ASC, maincat_name ASC");

		$escape_level = mysqli_fetch_assoc($escape_query);



do{

	$pos_to_check = substr($escape_level['position'],0,2);

	$check_escape_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position='".$pos_to_check."' ORDER BY position ASC, maincat_name ASC");

	$check_escape_set = mysqli_fetch_assoc($check_escape_query);

	if($check_escape_set==''){							

							?>

                        <tr bgcolor="#FFE8E8">

                          <td align="left" class="content" valign="top" colspan="4" style="padding-left:20px;">

                        

<?



?>   

         <div style="float:left; width:80%;">

         <img src="../images/space.gif" width="1" height="21">

         <input name="productIdListUpdate[]" type="hidden" value="<?php echo $escape_level['maincat_id'];?>">

         <input type="checkbox" value="<? echo $escape_level['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<? }?>>&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$escape_level['maincat_id'];?>" value="<? echo $escape_level['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?>><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><? if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><? }?> 

         </div>

         <div style="float:right; width:11%;">

         <input type="text" name="<?php echo 'position'.$escape_level['maincat_id'];?>" value="<? echo $escape_level['position']; ?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?>>&nbsp;&nbsp;<img src="../images/error.png" style="vertical-align:middle;" title="Level error">

         </div>

<? }}while($escape_level = mysqli_fetch_assoc($escape_query));?>	                         

                        

                          </td>

                        </tr> */?>

                        

                        <!--Empty Detection End-->

                        <tr>

                          <td colspan="5" class="red">

                         <br>

                         

                          </td>

                        </tr>

                      </table>

                    </form>

                    <span class="content">

                    <!--On Display End-->

                    <? } else if($_GET['tab']=="approvednotondisplay") { ?>

                    <!--Not On Display-->

                    </span>

                    <form name="ProductListForm2" method="post" action="createCategory.php?tab=approvednotondisplay" enctype="multipart/form-data">

                    <script>

                    function deleteProduct2(){

                        var id= new Array('productIdList[]');

                        if(id==''){

                            alert("No Item Selected");

                            return false;

                        }

                        

                        var point=confirm("Are You Sure You Want To Delete?");

                        if(point==true){

                            return true;

                        }else{

                            return false;

                        }

                    }

                    </script>

                      <div id="tab">

                        <ul>

                          <li class="">

                          	<a href="createCategory.php?tab=approvedondisplay" title="Display Product Item Online" class="content">

                            	On Display (<? if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>0<? }?> )</a></li>

                          <li class="current">

                          	<a href="createCategory.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">

                            	Not On Display (<? if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>0<? }?> )</a></li>

                          <li class="">

                          	<a href="createCategory.php?tab=trash" title="Trash Product Item Online" class="content">

                            	Trash (<? if ($total_testimonial_trash!=0){ echo $total_testimonial_trash;}else{?>0<? }?> )</a></li>

                        </ul>

                      </div>

                      <div class="content"> Select

                          <input type="checkbox" name="checkbox" value="checkbox" checked disabled>

                        to:

        <input type="submit" name="display" value="Display" title="Display selected item(s)" style="width:90px; color:#333;"/>&nbsp;&nbsp;

        <input type="submit" name="update" value="Save & Sort" title="Save & Sort item(s) position" style="width:90px; color:#333;">&nbsp;&nbsp;

        <input type="submit" name="trash" value="Trash" onClick="return deleteProduct2();" title="Delete selected item(s)" style="width:90px; color:#333;"/>

                      

                      

                      </div>

                      <table border="0" cellpadding="4" cellspacing="1" width="100%">

                        <tr bgcolor="#CCCCCC">

                          <th width="5%" class="content">

                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>

                          <th width="44%" class="content">  Category </th>

                            <th width="14%" class="content" align="center">Level & Position </th>

                        </tr>

                        <tr>

                          <td colspan="2"></td>

                        </tr>

                        <?  $count=1;

					if($row_Rs1!=''){											

						do{

								//if(strlen($row_Rs1['position'])==1){ 

							if($count%2==0)

								$bgcolor='#E6E6E6';

							else

								$bgcolor='#FFFFFF';

				?>

                        <tr bgcolor="<? echo $bgcolor;?>">

                          <td align="left" class="content" valign="top" style="padding-left:20px;">

                          <img src="../images/space.gif" width="1" height="21">

                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">

                          <input type="checkbox" value="<? echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<? }?> >

                          </td>

                          <td>

                            <input type="text" name="<? echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<? echo $row_Rs1['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?>><? if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><? if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><? }?>

                       </div>

                       </td>

                       <td align="center">

                            <input name="<? echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<? echo $row_Rs1['position'];?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?> maxlength="3">

                          </td>

                        </tr>

                        <?  $count++;

						 

						 }while($row_Rs1 = mysqli_fetch_assoc($Rs1));

					}else{ ?>

                        <tr>

                          <th width="5%"></th>

                          <td colspan="6" class="content">No Record Found.</td>

                          <!--<td></td>-->

                        </tr>

                        <? } ?>

                        <!--Empty Detection End-->

                        <tr>

                          <td colspan="5" class="red">&nbsp;</td>

                        </tr>

                      </table>

                    </form>

                    <!--Not On Display End-->

                    <? }else if($_GET['tab']=="trash"){ ?>

                    <!--Not On Display-->

                    

                    <form name="ProductListForm2" method="post" action="createCategory.php?tab=trash" enctype="multipart/form-data">

					<script>

                    function deleteProduct3(){

                        var id= new Array('productIdList[]');

                        if(id==''){

                            alert("No Item Selected");

                            return false;

                        }

                        

                        var point=confirm("Are You Sure You Want To Delete?");

                        if(point==true){

                            return true;

                        }else{

                            return false;

                        }

                    }

                    </script>

                      <div id="tab">

                        <ul>

                          <li class="">

                          	<a href="createCategory.php?tab=approvedondisplay" title="Display Product Item Online" class="content">

                            	On Display (<? if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>0<? }?> )</a></li>

                          <li class="">

                          	<a href="createCategory.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">

                            	Not On Display (<? if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>0<? }?> )</a></li>

                          <li class="current">

                          	<a href="createCategory.php?tab=trash" title="Trash Product Item Online" class="content">

                            	Trash (<? if ($total_testimonial_trash!=0){ echo $total_testimonial_trash;}else{?>0<? }?> )</a></li>

                        </ul>

                      </div>

                      <div class="content"> Select

                          <input type="checkbox" name="checkbox" value="checkbox" checked disabled>

                        to:

        <input type="submit" name="restore" value="Restore" title="Restore selected item(s)" style="width:90px; color:#333;"/>&nbsp;&nbsp;

        <input type="submit" name="delete" value="Delete" onClick="return deleteProduct3();" title="Delete selected item(s)" style="width:90px; color:#333;"/>

                      </div>

                      <table border="0" cellpadding="4" cellspacing="1" width="100%">

                        <tr bgcolor="#CCCCCC">

                          <th width="5%" class="content">

                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>

                          <th width="44%" class="content">  Category </th>

                            <th width="14%" class="content" align="center">Level & Position </th>

                        </tr>

                        <tr>

                          <td colspan="2"></td>

                        </tr>

                        <?  $count=1;

					if($row_Rs1!=''){											

						do{

								//if(strlen($row_Rs1['position'])==1){ 

							if($count%2==0)

								$bgcolor='#E6E6E6';

							else

								$bgcolor='#FFFFFF';

				?>

                        <tr bgcolor="<? echo $bgcolor;?>">

                          <td align="left" class="content" valign="top" style="padding-left:20px;">

                          <img src="../images/space.gif" width="1" height="21">

                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">

                          <input type="checkbox" value="<? echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<? }?> >

                          </td>

                          <td>

                            <input type="text" name="<? echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<? echo $row_Rs1['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?>><? if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><? if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><? }?>

                       </div>

                       </td>

                       <td align="center">

                            <input name="<? echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<? echo $row_Rs1['position'];?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<? }?> maxlength="3">

                          </td>

                        </tr>

                        <?  $count++;

						 

						 }while($row_Rs1 = mysqli_fetch_assoc($Rs1));

					}else{ ?>

                        <tr>

                          <th width="5%"></th>

                          <td colspan="6" class="content">No Record Found.</td>

                          <!--<td></td>-->

                        </tr>

                        <? } ?>

                        <!--Empty Detection End-->

                        <tr>

                          <td colspan="5" class="red">&nbsp;</td>

                        </tr>

                      </table>

                    </form>

                    <!--Not On Display End-->

                    <? 

					

					} ?>

                    <!--End-->

                </div></td>

              </tr>

              <tr>

                <td colspan="4"><div align="left" class="content">

                    <? if ($totalRows_Rs1 > 0 ) { ?>

&nbsp;Total Records <? echo ($startRow_Rs1 + 1) ?> to <? echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1) ?> of <? echo $totalRows_Rs1 ?> <br>

&nbsp;<a href="<? printf("%s?pageNum_Rs1=%d%s", $currentPage, 0, $queryString_Rs1); ?>">First</a> <a href="<? printf("%s?pageNum_Rs1=%d%s", $currentPage, max(0, $pageNum_Rs1 - 1), $queryString_Rs1); ?>">| Previous</a> | <a href="<? printf("%s?pageNum_Rs1=%d%s", $currentPage, min($totalPages_Rs1, $pageNum_Rs1 + 1), $queryString_Rs1); ?>">Next</a> <a href="<? printf("%s?pageNum_Rs1=%d%s", $currentPage, $totalPages_Rs1, $queryString_Rs1); ?>">| Last</a> |

                    <? } ?>

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

