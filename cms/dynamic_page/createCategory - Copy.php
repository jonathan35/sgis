<?php 

require_once('../../Connections/pamconnection.php');

require_once('../../pro/security.php');

session_start();

	if($_SESSION['validation']=='YES')

	{}	

	else{

	header("Location:../authentication/login.php");

	}mysqli_query($conn, 

//******************************************Add Country*************************************************



mysqli_query($conn, 

	if($_GET['wp']=='1'&&$_GET['cat']!=''){

		
mysqli_query($conn, 
		$catG = $defenders->escapeInjection(base64_decode($_GET['cat']));

		

		$ssss = mysqli_query($conn, "select photo from murum_section where maincat_id='".$catG ."' ");
mysqli_query($conn, 
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





	if($_POST['submit']==' Submit ')

	{mysqli_query($conn, 

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
mysqli_query($conn, 
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

	

		if(mysqli_query($conn, "INSERT INTO murum_section (maincat_id, photo, section_type, maincat_name, status, date_posted) 

												   	VALUES ('', '$file', 1,'$maincat', 1, '".date('Y-m-d')."')"))

			$success='<font color="#336600">category added</font>';

		else

			$success='<font color="#CC3300">Failed to add category</font>';

	}
mysqli_query($conn, 
//*************************************************Manage Country*************************************************





if($_POST['update']=='Save & Sort'){

	

	$items_delete_array = $_POST['productIdListUpdate'];

	

	if(!empty($_POST['productIdListUpdate']))
mysqli_query($conn, 
	{

		foreach($items_delete_array as $items_update)

		{	 

	

		if($_FILES['upld_photo'.$items_update]!='')

			{	

				$file_name = $_FILES['upld_photo'.$items_update]['name'];

				$file_source =mysqli_query($conn, ld_photo'.$items_update]['tmp_name'];

				$type = $_FILES['upld_photo'.$items_update]['type']; 

				

				$file = ''; 

				$ext = substr(strrchr($type, "/"), 1);

			

				switch ( $ext )
mysqli_query($conn, 
				{ 

					case 'pjpeg':

						$file = $file_name;

						break;

					case 'jpg':

						$file = $file_name;

						break;

					case 'jpeg':mysqli_query($conn, 

						$file = $file_mysqli_query($conn, 

						break;

					case 'gif':

						$file = $file_name;

						break;

					case 'png':

						$file = $file_name;

						break;mysqli_query($conn, 

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
mysqli_query($conn, 
				}

			}	

			
mysqli_query($conn, 
		if($_FILES['brand'.$items_update]!='')

			{

				$file_name = $_FILES['brand'.$items_update]['name'];

				$file_source = $_FILES['brand'.$items_update]['tmp_name'];

				$type = $_FILES['brand'.$items_update]['type']; 

				$file02 = ''; 

				$ext = substr(strrchr($type, "/"), 1);

			

				switch ( $ext )

				{ 

					casemysqli_query($conn, 

						$fmysqli_query($conn, e_name;

						break;mysqli_query($conn, 

					case 'jpg':
mysqli_query($conn, 
						$file02 = $file_name;

						break;

					case 'jpeg':
mysqli_query($conn, 
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

			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			

		}

	}

}

		

if($_POST['display']=='Hide'){

	

	$items_delete_array=$_POST['productIdList'];

	

	if(!empty($_POST['productIdList']))

	{

		foreach($items_delete_array as $items_delete)

		{

			$del_data="update murum_section set status='0' where maincat_id='".$items_delete."'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			

		}

	}

}

if($_POST['display']=='Display'){	

	$items_delete_array=$_POST['productIdList'];

	

	if(!empty($_POST['productIdList']))

	{

		foreach($items_delete_array as $items_delete)

		{

			$del_data="update murum_section set status='1' where maincat_id='".$items_delete."'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());			

		}

	}

}



if($_POST['trash']=="Trash")

{		

	$items_delete_array=$_POST['productIdList'];

	

	if(!empty($_POST['productIdList']))

	{

		foreach($items_delete_array as $items_delete)

		{

			$del_data="UPDATE murum_section SET status='-1' WHERE maincat_id='".$items_delete."'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $del_data) or die(mysqli_error());

			

			$product_query = mysqli_query($conn, "UPDATE mydf_product SET maincat_id='' WHERE maincat_id like '%|".$items_delete."|%'");

		}

	}

}



if($_POST['restore']=='Restore'){	

	$items_restore_array=$_POST['productIdList'];

	

	if(!empty($_POST['productIdList']))

	{

		foreach($items_restore_array as $items_restore)

		{

			$hide_data="UPDATE murum_section set status='0' where maincat_id='".$items_restore."'";

			mysqli_select_db($conn, $database_pamconnection);

			$dataResult1 = mysqli_query($conn, $hide_data) or die(mysqli_error());			

		}

	}

}



if($_GET['tab']=="approvedondisplay"||$_GET['tab']==""){

	$query="SELECT * FROM murum_section WHERE status=1 and length(position)=1 ORDER BY position ASC, maincat_name ASC";

}else if($_GET['tab']=="approvednotondisplay"){

	$query="SELECT * FROM murum_section WHERE status=0 and length(position)=1 ORDER BY position ASC, maincat_name ASC";

}else if($_GET['tab']=="trash"){

	$query="SELECT * FROM murum_section WHERE status=-1 and length(position)=1 ORDER BY position ASC, maincat_name ASC";

}



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

	

	$query2=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=0 and length(position)=1");

	$total_testimonial_not_on_display = mysqli_num_rows($query2);

	$query=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and length(position)=1");

	$total_testimonial_on_display = mysqli_num_rows($query);

	$trash_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=-1 and length(position)=1");

	$total_testimonial_trash = mysqli_num_rows($trashQuery);

	

	$limit_check_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE (status=1 or status=0) and length(position)=1 and section_type=1");

	$limit_check_set = mysqli_num_rows($limit_check_query);

	

	$limitation = $limit_check_set;

	

	

	$dcui_limit_query=mysqmysqli_query($conn, ECT * FROM dcui_section_cpanel WHERE id=1");

	$dcui_limit_set = mysqli_fetch_assoc($dcui_limit_query);

	

	

	

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

<link href="../css/commmysqli_query($conn, "stylesheet" type="text/css">

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

		alert("Please add the category in the provided field.");

		document.form1.maincatname.focus();

		return false;

	}

	return true;
mysqli_query($conn, 
}

</script>

mysqli_query($conn, 

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
mysqli_query($conn, 
<table width="630" border="1" cellspacing="0" cellpadding="0">

<tr>

<td height="288" align="left" valign="top"><table width="630" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="left" valign="top">

      <table width="100%" align="left" cellpadding="2"  cellspacing="2" border="0">

        <form name="form1" method="post" action="createCategory.php?add=1" enctype="multipart/form-data">

          <tr>
mysqli_query($conn, 
            <td colspan="4" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">CREATE CATEGORY</td>

          </tr>

          <tr>

            <td colspan="4" class="main_title"><?php echo $success;?></td>

          </tr>

          <tr>

            <td colspan="4" class="red">*Indicate required fields </td>

          </tr>          

          <tr>

            <th width="35%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span>Add Category :&nbsp;</th>

            <td width="32%" class="content01">

            <?php 	if($limitation>=$dcui_limit_set['record']){ echo "Max Free Format section is ".$dcui_limit_set['record']." only, please delete some section before you can create the new one.";}else{?>

            <input type="text" name="maincatname"><?php echo "<br>Max Free Format section is ".$dcui_limit_set['record']." only.<br>Current Free Format section is ".$limitation; }?>            </td>

            <td width="33%" rowspan="2" class="red02" valign="top">

            

                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>

                    <td>

                        Max. up to 3 level of category only.<br>

                        Sample of correct level or positioning:                    </td>

                  </tr>

                  <tr>

                  <td>

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td>Sample Level 1:</td>

                        <td>A</td>

                        <td>B</td>

                        <td>C</td>

                      </tr>

                      <tr>

                        <td>Sample Level 2:</td>

                        <td>A1</td>

                        <td>BA</td>

                        <td>CA</td>

                      </tr>

                      <tr>

                        <td>Sample Level 3:</td>

                        <td>A11</td>

                        <td>BAA</td>

                        <td>CA1</td>

                      </tr>

                    </table>                    </td>

                  </tr>

                </table>            </td>

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

                    <?php 

			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>

                    <!--On Display-->

                    <form name="form2" method="post" action="createCategory.php?tab=approvedondisplay" enctype="multipart/form-data">
mysqli_query($conn, 
                      <script>

			  	function deleteProduct1()

				{

					var point = confirm("Are You Sure You Want To Delete?");

					if(point==true)

					{

						var id= new Array('productIdList[]');

						if(id=='')
mysqli_query($conn, 
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

                          <li class="current"><a href="createCategory.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (

                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>

                            0

                            <?php }?>

                            )</a></li>

                          <li class=""><a href="createCategory.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (

                                <?php if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>

                            0

                            <?php }?>

                            )</a></li> 

                        </ul>

                      </div>

                      <div class="function"><span class="content">Select

                            <input type="checkbox" name="checkbox" value="checkbox" checked disabled>

                        to:

                        <!--<input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)">

                     &nbsp; -->

                    <input type="submit" name="display" value="Hide" title="Hide selected item(s)" style="width:90px; color:#333;"/>&nbsp;&nbsp;

                    <input type="submit" name="update" value="Save & Sort" title="Save & Sort item(s) position" style="width:90px; color:#333;">&nbsp;&nbsp;

                    <input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)" style="width:90px; color:#333;"/>



                     

                     

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

                        <?php  $count=1;

					if($row_Rs1!=''){											

						do{

							if($count%2==0)

							$bgcolor='#E6E6E6';

							else

							$bgcolor='#FFFFFF';

				?>

                        <tr bgcolor="<?php echo $bgcolor;?>">

                          <td align="left" class="content" valign="top" colspan="4" style="padding-left:20px;">



                          <div style="float:left; width:60%;">

       						<div>

                          <img src="../images/space.gif" width="1" height="21">

                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">

                          

                          <input type="checkbox" value="<?php echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<?php }?> >&nbsp;

                          

                            <input type="text" name="<?php echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<?php echo $row_Rs1['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?> ><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><?php if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><?php }?>

       </div>

                           

       <div style=" float:left; width:140px; position:relative;">

       <img src="../../images/space.gif" width="25" height="10" border="0">

 <?php if($row_Rs1['photo']!=''&&file_exists("../../photo/".$row_Rs1['photo'])){?>

         <img src="<?php echo "../../photo/".$row_Rs1['photo']?>" width="86" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;"> <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=1&cat=<?=base64_encode($row_Rs1['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>

         <?php }?>

         </div>

         

      

         <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

         <input type="file" name="<?php echo 'upld_photo'.$row_Rs1['maincat_id'];?>" style="width:50px;"> 

         </div> -->

         

         <div style="float:left; width:120px; position:relative; overflow:hidden;" align="right">

          <?php if($row_Rs1['brand_logo']!=''&&file_exists("../../photo/".$row_Rs1['brand_logo'])){?>

         <img src="<?php echo "../../photo/".$row_Rs1['brand_logo']?>" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">     <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=2&cat=<?=base64_encode($row_Rs1['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>

         <?php }?>  

         <!--<span class="content01">Brand</span>&nbsp; -->

         </div>

         <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

         <input type="file" name="<?php echo 'brand'.$row_Rs1['maincat_id'];?>" style="width:50px;">

         </div> -->

         

                           

                           

                           </div>

                           <div style="float:right; width:25%; text-align:center;">

                            <input name="<?php echo 'showing'.$row_Rs1['maincat_id']?>" type="radio" value="true" style="width:30px;" id="<?php echo 'showing'.$row_Rs1['maincat_id']?>On"  <?php if($row_Rs1['showing'] == 'true'){?> checked<?php }?>>

                            <label for="<?php echo 'showing'.$row_Rs1['maincat_id']?>On">On</label>

                            <input name="<?php echo 'showing'.$row_Rs1['maincat_id']?>" type="radio" value="false" style="width:30px;" id="<?php echo 'showing'.$row_Rs1['maincat_id']?>Off" <?php if($row_Rs1['showing'] == 'false'){?> checked<?php }?>> 

                            <label for="<?php echo 'showing'.$row_Rs1['maincat_id']?>Off">Off</label>

                            

                            </div>

                          

                           <div style="float:right; width:15%; text-align:center;">

                            <input name="<?php echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?> maxlength="3"> 

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

         <input type="checkbox" value="<?php echo $next_level2['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level2['maincat_id'];?>" value="<?php echo $next_level2['maincat_name']; ?>" style="width:140px;">

         </div>

            <div style="float:left; width:120px; position:relative; overflow:hidden;" align="right">

			 <?php if($next_level2['brand_logo']!=''&&file_exists("../../photo/".$next_level2['brand_logo'])){?>

                     <img src="<?php echo "../../photo/".$next_level2['brand_logo']?>" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">  <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=2&cat=<?=base64_encode($next_level2['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>  

                     <?php }?>              

            

             <!--<span class="content01">Brand</span>&nbsp; -->

             </div>

             <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

             <input type="file" name="<?php echo 'brand'.$next_level2['maincat_id'];?>" style="width:50px;">

               </div> -->       

         </div>

         <div style="float:right; width:25%; text-align:center;">&nbsp;</div>

         

         <div style="float:right; width:15%; text-align:center;">

         <input type="text" name="<?php echo 'position'.$next_level2['maincat_id'];?>" value="<?php echo $next_level2['position']; ?>" style="width:30px;" maxlength="3">

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

         <input type="checkbox" value="<?php echo $next_level3['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level3['maincat_id'];?>" value="<?php echo $next_level3['maincat_name']; ?>" style="width:140px;">

         </div>

         

            <div style="float:left; width:85px; position:relative; overflow:hidden;" align="right">

 <?php if($next_level3['brand_logo']!=''&&file_exists("../../photo/".$next_level3['brand_logo'])){?>

         <img src="<?php echo "../../photo/".$next_level3['brand_logo']?>" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">    <a href="createCategory.php?pageNum_Rs1=<?=$_GET['pageNum_Rs1']?>&tab=<?=$_GET['tab']?>&wp=2&cat=<?=base64_encode($next_level3['maincat_id'])?>"><img src="../images/b_drop.png" style="vertical-align:middle;" width="16" height="15" border="0"></a>  

         <?php }?>                  

             <!--<span class="content01">Brand</span>&nbsp; -->

             </div>

             <!--<div style="float:left; width:85px; position:relative; overflow:hidden;">

             <input type="file" name="<?php echo 'brand'.$next_level3['maincat_id'];?>" style="width:50px;">

               </div>       -->   

         

         

         

         </div>

         <div style="float:right; width:25%; text-align:center;">&nbsp;</div>

         

         <div style="float:right; width:15%; text-align:center;">         

         <input type="text" name="<?php echo 'position'.$next_level3['maincat_id'];?>" value="<?php echo $next_level3['position']; ?>" style="width:30px;" maxlength="3">

         </div>

   

   <?php }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    

   <?php }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));?>

   

   



                          

                          </td>

                        </tr>

                        <?php  $count++;?>

                        

                        <?

						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));

							

					}else{ ?>

                        <tr>

                          <th width="20%"></th>

                          <td colspan="6" class="content">No Record Found.</td>

                          <!--<td></td>-->

                        </tr>

                        <?php } ?>

                        

                        

<?							

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

         <input type="checkbox" value="<?php echo $escape_level['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<?php }?>>&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$escape_level['maincat_id'];?>" value="<?php echo $escape_level['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?>><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><?php if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><?php }?> 

         </div>

         <div style="float:right; width:11%;">

         <input type="text" name="<?php echo 'position'.$escape_level['maincat_id'];?>" value="<?php echo $escape_level['position']; ?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?>>&nbsp;&nbsp;<img src="../images/error.png" style="vertical-align:middle;" title="Level error">

         </div>

<?php }}while($escape_level = mysqli_fetch_assoc($escape_query));?>	                         

                        

                          </td>

                        </tr>

                        

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

                    <?php } else if($_GET['tab']=="approvednotondisplay") { ?>

                    <!--Not On Display-->

                    </span>

                    <form name="ProductListForm2" method="post" action="createCategory.php?tab=approvednotondisplay" enctype="multipart/form-data">

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

                          <li class=""><a href="createCategory.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display(

                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>

                            0

                            <?php }?>

                            )</a></li>

                          <li class="current"><a href="createCategory.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (

                                <?php if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>

                            0

                            <?php }?>

                            )</a></li>

                        </ul>

                      </div>

                      <div class="content"> Select

                          <input type="checkbox" name="checkbox" value="checkbox" checked disabled>

                        to:

                        <!--<input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />

                      &nbsp; -->

                     <input type="submit" name="display" value="Display" onClick="return deleteProduct2();" title="Display selected item(s)" style="width:90px; color:#333;"/>

&nbsp;

<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;">&nbsp;

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

                        <?php  $count=1;

					if($row_Rs1!=''){											

						do{

								if(strlen($row_Rs1['position'])==1){ 

							if($count%2==0)

							$bgcolor='#E6E6E6';

							else

							$bgcolor='#FFFFFF';

				?>

                        <tr bgcolor="<?php echo $bgcolor;?>">

                          <td align="left" class="content" valign="top" colspan="4" style="padding-left:20px;">

                          <div style="float:left; width:80%;">

                          <img src="../images/space.gif" width="1" height="21">

                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">

                          

                          <input type="checkbox" value="<?php echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<?php }?> >&nbsp;

                          

                            <input type="text" name="<?php echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<?php echo $row_Rs1['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?>><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><?php if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><?php }?> 

                            

                            

<!--<br><img src="../../images/space.gif" width="25" height="10" border="0">

 <?php /*if($row_Rs1['photo']!=''&&file_exists("../../photo/".$row_Rs1['photo'])){?>

         <img src="<?php echo "../../photo/".$row_Rs1['photo']?>" width="86" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">

         <?php }?>

         <input type="file" name="<?php echo 'upld_photo'.$row_Rs1['maincat_id'];?>"> &nbsp; <input type="file" name="<?php echo 'brand'.$row_Rs1['maincat_id'];*/?>">                        

                           </div> --></div>

                           <div style="float:right; width:11%;">

                            <input name="<?php echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?> maxlength="3"> 

                            </div>

                          

<?

		$previous_code2 = $row_Rs1['position'];

		$next_position_len2 = 2;

		$next_level_query2 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' ORDER BY position ASC, maincat_name ASC");

		$next_level2 = mysqli_fetch_assoc($next_level_query2);



do{if(strlen($next_level2['position'])==$next_position_len2){ 

?>

          <div style="float:left; width:70%; padding-left:15px;"><img src="../images/next-arrow.png" width="24" height="21">

         <input name="productIdListUpdate[]" type="hidden" value="<?php echo $next_level2['maincat_id'];?>">

         <input type="checkbox" value="<?php echo $next_level2['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level2['maincat_id'];?>" value="<?php echo $next_level2['maincat_name']; ?>" style="width:140px;"></div>

         <div style="float:right; width:11%;">

         <input type="text" name="<?php echo 'position'.$next_level2['maincat_id'];?>" value="<?php echo $next_level2['position']; ?>" style="width:30px;" maxlength="3">

         </div>

   

<?

		$previous_code3 = $next_level2['position'];

		$next_position_len3 = 3;

		$next_level_query3 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code3."%' ORDER BY position ASC, maincat_name ASC");

		$next_level3 = mysqli_fetch_assoc($next_level_query3);



do{if(strlen($next_level3['position'])>=$next_position_len3){ 

?>

          <div style="float:left; width:70%; padding-left:50px;">

          <img src="../images/next-arrow.png" width="24" height="21">

         <input name="productIdListUpdate[]" type="hidden" value="<?php echo $next_level3['maincat_id'];?>">

         <input type="checkbox" value="<?php echo $next_level3['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level3['maincat_id'];?>" value="<?php echo $next_level3['maincat_name']; ?>" style="width:140px;"></div>

         <div style="float:right; width:11%;">         

         <input type="text" name="<?php echo 'position'.$next_level3['maincat_id'];?>" value="<?php echo $next_level3['position']; ?>" style="width:30px;" maxlength="3">

         </div>

   

   <?php }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    

   <?php }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));?>

   

   



                          

                          </td>

                        </tr>

                        

                        

                        

                        <?php  $count++;}else{}

						 

						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));

					}

					else

					{ ?>

                        <tr>

                          <th width="5%"></th>

                          <td colspan="6" class="content">No Record Found.</td>

                          <!--<td></td>-->

                        </tr>

                        <?php } ?>

                        <!--Empty Detection End-->

                        <tr>

                          <td colspan="5" class="red">&nbsp;</td>

                        </tr>

                      </table>

                    </form>

                    <!--Not On Display End-->

                    <?php }else if($_GET['tab']=="trash"){ ?>

                    <!--Not On Display-->

                    

                    <form name="ProductListForm2" method="post" action="createCategory.php?tab=trash" enctype="multipart/form-data">

                      <script>

			  	function deleteProduct3()

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

                          <li class=""><a href="createCategory.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display(

                                <?php if ($total_testimonial_on_display!=0){ echo $total_testimonial_on_display;}else{?>

                            0

                            <?php }?>

                            )</a></li>

                          <li class="current"><a href="createCategory.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (

                                <?php if ($total_testimonial_not_on_display!=0){echo $total_testimonial_not_on_display;}else{?>

                            0

                            <?php }?>

                            )</a></li>

                        </ul>

                      </div>

                      <div class="content"> Select

                          <input type="checkbox" name="checkbox" value="checkbox" checked disabled>

                        to:

                        <!--<input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />

                      &nbsp; -->

                     <input type="submit" name="display" value="Display" onClick="return deleteProduct3();" title="Display selected item(s)" style="width:90px; color:#333;"/>

&nbsp;

<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;">&nbsp;

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

                        <?php  $count=1;

					if($row_Rs1!=''){											

						do{

								if(strlen($row_Rs1['position'])==1){ 

							if($count%2==0)

							$bgcolor='#E6E6E6';

							else

							$bgcolor='#FFFFFF';

				?>

                        <tr bgcolor="<?php echo $bgcolor;?>">

                          <td align="left" class="content" valign="top" colspan="4" style="padding-left:20px;">

                          <div style="float:left; width:80%;">

                          <img src="../images/space.gif" width="1" height="21">

                          <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['maincat_id'];?>">

                          

                          <input type="checkbox" value="<?php echo $row_Rs1['maincat_id']; ?>" name="productIdList[]" <?php if($row_Rs1['section_type']=='2' || $row_Rs1['lock_status']=='true'){?> disabled<?php }?> >&nbsp;

                          

                            <input type="text" name="<?php echo 'maincat_name'.$row_Rs1['maincat_id'];?>" value="<?php echo $row_Rs1['maincat_name']; ?>" style="width:140px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?>><?php if($row_Rs1['section_type']=='2') echo " <img src=\"../images/Design_template.png\"  style=\"vertical-align:middle\" title=\"Pre-Design\">"; else echo " <img src=\"../images/tiny_edit.png\"  style=\"vertical-align:middle\" title=\"Free Format\">";?><?php if($row_Rs1['lock_status']=="true"){?><img src="../images/lock.png" width="22" height="22" style="vertical-align:middle" title="Uneditable in CMS"><?php }?> 

                            

                            

<!--<br><img src="../../images/space.gif" width="25" height="10" border="0">

 <?php /*if($row_Rs1['photo']!=''&&file_exists("../../photo/".$row_Rs1['photo'])){?>

         <img src="<?php echo "../../photo/".$row_Rs1['photo']?>" width="86" height="24" style=" margin-left:5px; border:1px #ccc solid; vertical-align:middle;">

         <?php }?>

         <input type="file" name="<?php echo 'upld_photo'.$row_Rs1['maincat_id'];?>"> &nbsp; <input type="file" name="<?php echo 'brand'.$row_Rs1['maincat_id'];*/?>">                        

                           </div> --></div>

                           <div style="float:right; width:11%;">

                            <input name="<?php echo 'position'.$row_Rs1['maincat_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:30px;" <?php if($row_Rs1['lock_status']=='true'){?> readonly<?php }?> maxlength="3"> 

                            </div>

                          

<?

		$previous_code2 = $row_Rs1['position'];

		$next_position_len2 = 2;

		$next_level_query2 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' ORDER BY position ASC, maincat_name ASC");

		$next_level2 = mysqli_fetch_assoc($next_level_query2);



do{if(strlen($next_level2['position'])==$next_position_len2){ 

?>

          <div style="float:left; width:70%; padding-left:15px;"><img src="../images/next-arrow.png" width="24" height="21">

         <input name="productIdListUpdate[]" type="hidden" value="<?php echo $next_level2['maincat_id'];?>">

         <input type="checkbox" value="<?php echo $next_level2['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level2['maincat_id'];?>" value="<?php echo $next_level2['maincat_name']; ?>" style="width:140px;"></div>

         <div style="float:right; width:11%;">

         <input type="text" name="<?php echo 'position'.$next_level2['maincat_id'];?>" value="<?php echo $next_level2['position']; ?>" style="width:30px;" maxlength="3">

         </div>

   

<?

		$previous_code3 = $next_level2['position'];

		$next_position_len3 = 3;

		$next_level_query3 = mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code3."%' ORDER BY position ASC, maincat_name ASC");

		$next_level3 = mysqli_fetch_assoc($next_level_query3);



do{if(strlen($next_level3['position'])>=$next_position_len3){ 

?>

          <div style="float:left; width:70%; padding-left:50px;">

          <img src="../images/next-arrow.png" width="24" height="21">

         <input name="productIdListUpdate[]" type="hidden" value="<?php echo $next_level3['maincat_id'];?>">

         <input type="checkbox" value="<?php echo $next_level3['maincat_id']; ?>" name="productIdList[]">&nbsp;

         <input type="text" name="<?php echo 'maincat_name'.$next_level3['maincat_id'];?>" value="<?php echo $next_level3['maincat_name']; ?>" style="width:140px;"></div>

         <div style="float:right; width:11%;">         

         <input type="text" name="<?php echo 'position'.$next_level3['maincat_id'];?>" value="<?php echo $next_level3['position']; ?>" style="width:30px;" maxlength="3">

         </div>

   

   <?php }}while($next_level3 = mysqli_fetch_assoc($next_level_query3));?>    

   <?php }}while($next_level2 = mysqli_fetch_assoc($next_level_query2));?>

   

   



                          

                          </td>

                        </tr>

                        

                        

                        

                        <?php  $count++;}else{}

						 

						 } while($row_Rs1 = mysqli_fetch_assoc($Rs1));

					}

					else

					{ ?>

                        <tr>

                          <th width="5%"></th>

                          <td colspan="6" class="content">No Record Found.</td>

                          <!--<td></td>-->

                        </tr>

                        <?php } ?>

                        <!--Empty Detection End-->

                        <tr>

                          <td colspan="5" class="red">&nbsp;</td>

                        </tr>

                      </table>

                    </form>

                    <!--Not On Display End-->

                    <?php 

					

					} ?>

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
