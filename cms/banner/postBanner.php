<?php 

require_once('../../Connections/pamconnection.php'); 

require_once('../../pro/security.php');

session_start();

	if($_SESSION['validation']=='YES'){

	}else{

		header("Location:../authentication/login.php");

	}

	if($_POST['submit']=='Submit'){

		if($_FILES['topbanner']!=''){

			$file_source = $_FILES['topbanner']['tmp_name']; 

			$type = $_FILES['topbanner']['type']; 

			$ext = substr(strrchr($type, "/"), 1); 



			switch ( $ext ){ 

				case 'pjpeg':

					$file = 'photo/'.uniqid('').'.jpg';

					break;			

				case 'jpg':

					$file = 'photo/'.uniqid('').'.jpg';

					break;		

				case 'jpeg': 

					$file = 'photo/'.uniqid('').'.jpg';

					break;

					
				case 'gif':

					$file = 'photo/'.uniqid('').'.gif';

					break;

				case 'png':

					$file = 'photo/'.uniqid('').'.png';

					break;

				

				case 'pdf':

				$file = 'photo/'.uniqid('').'.pdf';

				break;

		

				case 'vnd.ms-excel': 

				$file = 'photo/'.uniqid('').'.xls';

				break; 

	

				case 'msword': 

				$file = 'photo/'.uniqid('').'.doc';

			

					

					

			}

			if (($file != '')){ 	

				if ( move_uploaded_file($file_source, "../../".$file ) ) 

				{if(mysqli_query($conn, "INSERT INTO banner (banner_id, banner_file) VALUES ('', '$file')"))

						$success='yes';

					else

						$success='no';

				}else{		

					echo 'File could not be uploaded to server.<BR>';

				} 

			}

		}

	}

	

	

if($_POST['update']=='Save & Sort'){	

	$items_update_array = $_POST['productIdListUpdate'];

	if(!empty($_POST['productIdListUpdate'])){

		foreach($items_update_array as $items_update){	 

			$position_value = $defenders->escapeInjection($_POST['position'.$items_update]);

			mysqli_query($conn, "update banner set position='".$position_value."' where banner_id='".$items_update."'");

		}

	}

}

		

if($_POST['display']=='Hide'){	

	$items_hide_array=$_POST['productIdList'];

	if(!empty($_POST['productIdList'])){

		foreach($items_hide_array as $items_hide){

			$del_data = $defenders->escapeInjection($_POST['position'.$items_hide]);

			mysqli_query($conn, "update banner set status='0' where banner_id='".$items_hide."'");

		}

	}

}

if($_POST['display']=='Display'){	

	$items_display_array=$_POST['productIdList'];

	if(!empty($_POST['productIdList'])){

		foreach($items_display_array as $items_display){

			$del_data = $defenders->escapeInjection($_POST['position'.$items_display]);

			mysqli_query($conn, "update banner set status='1' where banner_id='".$items_display."'");

		}

	}

}



if($_POST['delete']=='Delete'){

	$items_delete_array=$_POST['productIdList'];

	if(!empty($_POST['productIdList'])){

		foreach($items_delete_array as $items_delete){

			$del_data=mysqli_query($conn, "UPDATE banner SET status='-1' WHERE banner_id='$items_delete'");

		}

	}

}



if($_GET['tab']=="approvedondisplay"||$_GET['tab']==""){

			$query="SELECT * FROM banner WHERE status=1 ORDER BY position asc, banner_id DESC";

}else if($_GET['tab']=="approvednotondisplay"){

			$query="SELECT * FROM banner WHERE status=0 ORDER BY position asc, banner_id DESC";

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

	

	$query2=mysqli_query($conn, "SELECT * FROM banner WHERE status=0");

	$total_testimonial_not_on_display = mysqli_num_rows($query2);

	$query=mysqli_query($conn, "SELECT * FROM banner WHERE status=1");

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

<?/*

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

*/?>

</style>

<?/*
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
*/?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>

function toggleChecked(status) {

	$(".checkbox").each( function() {
		alert(status);
		$(this).attr("checked",status);

	})

}

</script>

<script language="JavaScript">

function check(){

	if(document.form1.topbanner.value==""){

		alert("Please insert banner");

		document.form1.topbanner.focus();

		return false;

	}

	return true;

} 

function errorCheck(){

	if(form1.maincatname.value==""){

		alert("Please enter main category name.");

		form1.maincatname.focus();

		return false;

	}

	return true;

}

function findItem(n, d){

	var p,x,i;

	if(!d) d=document;

	if((p=n.indexOf("?"))>0&&parent.frames.length){

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

function category(zap,obj){

	if (document.getElementById){

		var abra = document.getElementById(zap).style;

		if (abra.display == "block"){

			abra.display = "none";

		}else{

			abra.display = "block";

		}

		return false;

	}else{

		return true;

	}

}



function deleteProduct5(){

	var id= new Array('productIdListUpdate[]');

	if(id==''){

		alert("No Item Selected");

		return false;

	}

	return true;

	}

}



</script>

</head>



<body>



  <div id="Layer1" style="position:absolute; width:184px; height:24px; z-index:1; left: 747px; top: 3px;">

	<table width="200" cellspacing="2" cellpadding="2">

	  <tr>

		<td class="main_title">| <a href="../authentication/logout2.php" class="main_title"> Sign Out</a> |</td>

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

            <div id="titlename"><span class="white_title">BANNER MANAGER</span></div>

          </div>

        </div>	

	</td>

  </tr>

  <tr>

    <td width="269" align="left" valign="top">

	<!--menu-->

	<?php include("../menu.php");?>

	<!--menu-->	

	</td>

    <td width="630" align="left" valign="top">

    

    <table width="630" border="1" cellspacing="0" cellpadding="0">

      <tr>

        <td height="288" align="left" valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td align="left" valign="top"><table width="100%" align="left" cellpadding="0"  cellspacing="0" border="0">

          <form name="form1" method="post" action="postBanner.php" enctype="multipart/form-data" id="form">

            <tr>

              <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">UPLOAD  BANNER </td>

            </tr>



          <tr>

            <td colspan="2" class="main_title"><?php if($success=='yes'){ echo '<font color=#006633>File Uploaded..!!</font><br><br>';}

				elseif($success=='no')

				{echo '<font color=#FF0000>Fail To Upload File..!!</font><br><br>';}?></td>

          </tr>

          <tr>

            <td colspan="2" class="red">* Required fields </td>

          </tr>           

           

            <tr valign="top">

              <th width="37%" align="right" bgcolor="#EFEFEF" class="content" style="padding:4px;">Upload Banner              </th>

              <td width="63%" style="padding:4px; padding-left:10px;"><input name="topbanner" type="file" class="content" size="40">

                <span class="red">

                <br>

                Recommended size: 960px X 350px<br>

Format: jpg</span></td>

            </tr>

            <tr>

              <td>&nbsp;</td>

              <td align="left" style="padding-left:10px;"><input type="submit" name="submit" value="Submit" onClick="return check();">

                &nbsp;

                <input type="reset" name="reset" value=" Reset "><br></td></tr>

          </form>

        </table></td>

      </tr>

    </table></td>

  </tr>

  



<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>



  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td height="32" align="center" valign="middle" bgcolor="#CCCCCC"><span class="main_title">MANAGE BANNER</span></td>

      </tr>

      <tr>

        <td align="left" valign="top"><table width="100%" align="left" cellpadding="0"  cellspacing="0">

          <tr>

            <td width="100%" height="244" align="left" valign="top"><div align="left">

              <?php 

			if($_GET['tab']=="approvedondisplay"||$_GET['tab']=="") { ?>

              <!--On Display-->

              <form name="ProductListForm1" method="post" action="postBanner.php?tab=approvedondisplay">

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

                    <li class="current"><a href="postBanner.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (<?php echo $total_testimonial_on_display; ?>)</a> </li>

                    <li class=""><a href="postBanner.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (<?php echo $total_testimonial_not_on_display; ?>)</a></li>

                  </ul>

                </div>

                <div class="function"><span class="content">Select

                  <input type="checkbox" name="checkbox" value="checkbox" checked disabled>to:

                  <input type="submit" name="delete" value="Delete" onClick="return deleteProduct1();" title="Delete selected item(s)">

                </span>

                &nbsp;

                     <input type="submit" name="display" value="Hide" onClick="return deleteProduct5();" title="Hide selected item(s)" style="width:90px; color:#333;"/>

&nbsp;

<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;">

                

                

                </div>

                <table border="0" cellpadding="4" cellspacing="1" width="100%">

                  <tr>

                    <th width="7%" class="content">

                    	<input type="checkbox" onclick="toggleChecked(this.checked)">

                    </th>

                    <th width="77%" class="content"><div align="center">Banner</div></th>

                    <th width="16%" class="content" align="center">Position No.</th>

                  </tr>

                  <?

					if($row_Rs1!=''){											

						do{ 

					//list($width, $height)=getimagesize($row_Rs1['banner_file']);

					//$width=$width * 0.3;

					//$height=$height * 0.3;

					?>

                  <tr>

                    <th width="7%" class="content"> 

                    	<input type="checkbox" value="<?php echo $row_Rs1['banner_id']; ?>" name="productIdList[]" class="checkbox">

                        <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['banner_id'];?>"> <br />

                    </th>



                    <td align="center" class="content"><img src="<?php echo "../../".$row_Rs1['banner_file']?>" width="470" height="171"><br></td>

                    <td class="content" align="center">

                    <input name="<?php echo 'position'.$row_Rs1['banner_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:50px;">

                    <br></td>

                  </tr>

                  <?php } while($row_Rs1 = mysqli_fetch_assoc($Rs1));

					}else{ ?>

                  <tr>

                    <th width="7%"></th>

                    <td colspan="3" class="content">NO Record Found.</td>

                    <!--<td></td>-->

                  </tr>

                  <?php } ?>

                  <!--Empty Detection End-->

                  <tr>

                    <td colspan="5">&nbsp;</td>

                  </tr>

                </table>

              </form>

              <span class="content">

                <!--On Display End-->

                <?php } else if($_GET['tab']=="approvednotondisplay") { ?>

                <!--Not On Display-->

                </span>

              <form name="ProductListForm2" method="post" action="postBanner.php?tab=approvednotondisplay">

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

                    <li class=""><a href="postBanner.php?tab=approvedondisplay" title="Display Product Item Online" class="content">On Display (<?php echo $total_testimonial_on_display; ?>)</a></li>

                    <li class="current"><a href="postBanner.php?tab=approvednotondisplay" title="Not Display Product Item Online" class="content">Not On Display (<?php echo $total_testimonial_not_on_display; ?>)</a></li>

                  </ul>

                </div>

                <div class="content"> Select

                  <input type="checkbox" name="checkbox" value="checkbox" checked disabled>

                  to:

                  <input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />

                &nbsp;

                     <input type="submit" name="display" value="Display" onClick="return deleteProduct5();" title="Display selected item(s)" style="width:90px; color:#333;"/>

&nbsp;

<input type="submit" name="update" value="Save & Sort" onClick="return deleteProduct5();" title="Save & Sort item(s) position" style="width:90px; color:#333;"></div>

                <table border="0" cellpadding="4" cellspacing="1" width="100%">

                  <tr>

                    <th width="7%" class="content">

                    	<input type="checkbox" onclick="toggleChecked(this.checked)">

                    </th>

                    <th width="75%" class="content"><div align="center">Banner</div></th>

                    <th width="18%" class="content" align="center">Position No.</th>

                  </tr>

                  <?php if($row_Rs1!=''){											

						do{ 

							//list($width, $height)=getimagesize($row_Rs1['banner_file']);

							//$width=$width * 0.3;

							//$height=$height * 0.3;

				?>

                  <tr>

                    <th width="7%" class="content"> <input type="checkbox" value="<?php echo $row_Rs1['banner_id']; ?>" name="productIdList[]"  class="checkbox">

                     <input name="productIdListUpdate[]" type="hidden" value="<?php echo $row_Rs1['banner_id'];?>"> <br />

                    </th>

                  

                    <td align="center" class="content"><img src="<?php echo "../../".$row_Rs1['banner_file']?>" width="400" height="217"></td>

                    <td class="content" align="center"><input name="<?php echo 'position'.$row_Rs1['banner_id']?>" type="text" value="<?php echo $row_Rs1['position'];?>" style="width:50px;"><br></td>

                  </tr>

                  <?php  } while($row_Rs1 = mysqli_fetch_assoc($Rs1));

					}else{ ?>

                  <tr>

                    <th width="7%"></th>

                    <td colspan="3" class="content">NO Record Found.</td>

                    <!--<td></td>-->

                  </tr>

				  <?php } ?>

                  <!--Empty Detection End-->

                  <tr>

                    <td colspan="5">&nbsp;</td>

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

</table>        

        

        </td>

      </tr>

    </table>

    

    

    </td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>









</body>

</html>

