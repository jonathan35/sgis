<? 

require_once('../../Connections/pamconnection.php');  

session_start();

	if($_SESSION['validation']=='YES')

	{}	

	else{

	header("Location:../authentication/login.php");

	}



	if($_GET['add']==1){

	if($_POST['submit']==' Submit ')

	{

		

	if($_FILES['pdf']!='')

	{

		$pdf_source = $_FILES['pdf']['tmp_name'];

		$type = $_FILES['pdf']['type']; 

		$pdf = ''; 

		$ext = substr(strrchr($type, "/"), 1);

	

		switch ( $ext )

		{ 

			case 'pdf':

				$pdf = 'attachment/'.uniqid('').'.pdf';

				break;

				

			case 'octet': 

				$pdf = 'attachment/'.uniqid('').'.pdf';

				break; 

	

		

			case 'vnd.ms-excel': 

				$pdf = 'attachment/'.uniqid('').'.xls';

				break; 

	

			case 'msword': 

				$pdf = 'attachment/'.uniqid('').'.doc';

				break; 				 

		}

		if (( $pdf != '' ) )

		{ 

			$pdfasd="../../".$pdf;

			if ( move_uploaded_file( $pdf_source, $pdfasd ) ) 

			{} 

			else 

			{		

				echo 'File could not be uploaded to server.<BR>';

			} 

		}

	}

		$pdf=$pdf;

		//$maincat=mysqli_real_escape_string($conn, $_POST['cat']);

		$prod_name=mysqli_real_escape_string($conn, $_POST['prod_name']);

		$description=$_POST['description'];

		$hyperlink=mysqli_real_escape_string($conn, $_POST['link']);

		$pdf_caption=mysqli_real_escape_string($conn, $_POST['pdf_caption']);

		$date_posted=date("Y-m-d");

	

		if(mysqli_query($conn, "INSERT INTO mydf_product ( product_name, description,  hyper_link, pdfcaption, attachment_file, status) 

		values ('".$prod_name."', '".$description."','".$hyperlink."','".$pdf_caption."','".$pdf."','1')"))		

			$success='<font color="#336600">Content added</font>';

		else

			$success='<font color="#CC3300">Failed to add Content</font>';

	}

	}

	$today=date("Y-m-d");

	

	

	

	$limit_check_query=mysqli_query($conn, "SELECT * FROM mydf_product WHERE (status=1 or status=0)");

	$limit_check_set = mysqli_num_rows($limit_check_query);

	

	$limitation = $limit_check_set;

	

	$dcui_limit_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=21");

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

<link href="../css/common.css" rel="stylesheet" type="text/css">

<link href="../css/component.css" rel="stylesheet" type="text/css">

<link href="../css/font.css" rel="stylesheet" type="text/css">

<link href="../css/layout.css" rel="stylesheet" type="text/css">

<script type="text/javascript">

function check()

{

	if(document.form1.prod_name.value=="")

	{

		alert("Please add in the title for the page in the provided field.");

		document.form1.prod_name.focus();

		return false;

	}

	

	return true;

}

</script>

<script type="text/javascript" src="../../tiny_mce/tiny_mce.js"></script>

<? include("../../tiny_mce/tinymce.int.php");?>



<SCRIPT LANGUAGE="JavaScript">

function textCounter(field, countfield, maxlimit) {

if (field.value.length > maxlimit) // if too long...trim it!

field.value = field.value.substring(0, maxlimit);

else 

countfield.value = maxlimit - field.value.length;

}

</script>

<script> 

function getdivHTML(){

var divArray = document.getElementsByTagName("div");

for (var i = 0; i<divArray.length; i++){

if (divArray[i].class="sibling")

return divArray[i].innerHTML;

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

            <div class="white_title" id="titlename"><span class="white_title">FREE FORMAT PAGE</span></div></div>

            <div class="shadow"></div>

        </div>	

	</div></td>

  </tr>

  <tr>

      <td align="left" valign="top"></td>

    <td rowspan="4" align="left" valign="top">

<table width="630" border="1" cellspacing="0" cellpadding="0">

   <? 	if($limitation>=$dcui_limit_set['record']){ echo "<tr><td class=\"content\" align=\"center\"><br><br><br><br><br><br><br><br><br><br>Max Free Format page is limited to ".$dcui_limit_set['record']." only, please delete some page before you can create the new one.<br><br><br><br><br><br><br><br><br><br><br><br><br></td></tr>";}else{?>



<tr>

<td height="288" align="left" valign="top"><table width="630" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="left" valign="top">

      <table width="100%" align="left" cellpadding="2"  cellspacing="2" border="0">

        <form name="form1" method="post" action="createProduct.php?add=1&main=<? echo $_GET['main']?>" enctype="multipart/form-data">

          <tr>

            <td colspan="4" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">CREATE   DETAIL PAGE</td>

          </tr>

          <tr>

            <td colspan="4" class="main_title"><? echo $success;?></td>

          </tr>

          <tr>

            <td colspan="4" class="red">* Required fields </td>

          </tr>

          

          <!--<tr>

            <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span>  Section</th>

            <? /*$category_query=mysqli_query($conn, "select * from mydf_maincat where status=1 and section_type=1 order by position asc");

			$category_set=mysqli_fetch_assoc($category_query); 

			if($category_set!=''){

			?>

            <td width="69%">	

            <select name="cat" class="SelectField">

		  <option value="">Select section...</option>

		  <? do{?>

		  <option value="<? echo $category_set['maincat_id']; ?>" > <? echo $category_set['maincat_name']; ?></option>

		  <? }while($category_set= mysqli_fetch_assoc($category_query));?>

		</select>

        <? }else{?> <span class="red">Please create the section first</span><? }*/?>

		

		        </td>

               </tr>   -->         





			<tr>

				<th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Title</th>

                <td width="69%"><input type="text" name="prod_name" class="logfield02" maxlength="100" width="200"></td>

            </tr>

            <tr>

                <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"> Hyperlink</th>

            	<td><input type="text" name="link" value="http://www." class="logfield02"></td>

            </tr>                     

            <tr valign="top">

                <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title">  Attachment File</th>

                <td class="content" style="padding-left:5px;">

               Caption:<img src="../../images/space.gif" width="96" height="10"><input type="text" name="pdf_caption" class="logfield02">

                <br><img src="../../images/space.gif" width="140" height="10"><span class="red02"> Eg. Catalogue (5MB)</span>

                <br><img src="../../images/space.gif" width="140" height="5"><br>

                Upload File attachment:<img src="../../images/space.gif" width="8" height="10">

                <input type="file" name="pdf">

                <br><img src="../../images/space.gif" width="140" height="10"><span class="red02"> Max. size: 10MB. File format: PDF, doc, xls</span>

               </td>

            </tr>            

                        

            

                     

            <tr>

            <td colspan="2" align="center" bgcolor="#CCCCCC">

                    <div style="text-shadow: #333333 2px -1px 3px; color:#FFF; font-size:20px; font-weight:bold;">CONTENT OF DETAIL PAGE</div>   

            </td>

            </tr>

            

            

            <tr valign="top">

              <td colspan="2">

                <table cellpadding="0" cellspacing="0" border="0" width="100%">

                  <tr>

                    <td align="center">

                      <textarea name="description" class="Textareafield" style="width:610px; height:700px;"></textarea>

                      </td>

                    </tr>

                  </table>

                </td>

            </tr>

   

          

          

          

          

          <tr>

            <td align="center" colspan="2">

              <input type="submit" name="submit" value=" Submit " onClick="return check();">

&nbsp;

              <input type="reset" name="reset" value=" Reset ">            </td>

          </tr>

        </form>

    </table></td>

  </tr>

</table></td>

</tr>



<? }?>	



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



	</td>

  </tr>

  <tr>

    <td width="169" align="left" valign="top"> </td>

  </tr>

  <tr>

    <td align="left" valign="top">

	<?php include("../menu.php");?>

	</td>

  </tr>

  <tr>

    <td align="left" valign="top">&nbsp;</td>

  </tr>

</table>

<div id="Layer1" style="position:absolute; width:200px; height:39px; z-index:1; left: 740px; top: 4px;">

<table width="200" cellspacing="2" cellpadding="2">

  <tr>

	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>

  </tr>

</table>

</div>

</body>

</html>

