<? 

require_once('../../Connections/pamconnection.php'); 

session_start();

	if($_SESSION['validation']=='YES')

	{}	

	else{

	header("Location:../authentication/login.php");

	}



	$id = mysqli_real_escape_string($conn, base64_decode($_GET['id']));

	if($_GET['cmd']=='pdf')

	mysqli_query($conn, "update mydf_product set attachment_file='' where id='".$id."' ");





	if($_POST['submit']=='Submit'){

	

	if($_FILES['pdf']!='')

	{

		$pdf_source = $_FILES['pdf']['tmp_name'];

		$type = $_FILES['pdf']['type']; 

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

			{mysqli_query($conn, "update mydf_product set attachment_file='".$pdf."' where id='".$id."' ");} 

			else 

			{		

				echo 'File could not be uploaded to server.<BR>';

			} 

		}

	}		

		

		//$maincat=mysqli_real_escape_string($conn, $_POST['cat']);

		$prod_name=mysqli_real_escape_string($conn, $_POST['prod_name']);

		$description=$_POST['description'];

		$hyperlink=mysqli_real_escape_string($conn, $_POST['link']);

		$pdf_caption=mysqli_real_escape_string($conn, $_POST['pdf_caption']);

		

		$result=mysqli_query($conn, "update mydf_product set product_name='$prod_name', description='$description',  hyper_link='$hyperlink', pdfcaption='$pdf_caption' where id='".$id."' "); 

	

		if($result)

			$save='true';

		else

			$save='false';

	}

	

	if($_GET['cmd']=='pdf'){

		mysqli_query($conn, "update mydf_product set attachment_file='' where id='".$id."'");

	}

	

	$selected_query=mysqli_query($conn, "select * from mydf_product where id='".$id."' ");

	$selected_set=mysqli_fetch_assoc($selected_query);

	

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



</head>



<body><img src="../images/cmservice.jpg" width="800" height="50">

<table width="799" border="0" cellpadding="0" cellspacing="0" align="center"

  <tr bgcolor="#FFFFFF">

    <td height="32" colspan="2">

	<div align="left">

          <div id="title">

            <div id="titlename"></div>

            <div class="shadow"></div>

        </div>	

	</div></td>

  </tr>

  <tr>

      <td align="left" valign="top"></td>

    <td rowspan="4" align="left" valign="top">

<table width="630" border="1" cellspacing="0" cellpadding="0">

<tr>

<td height="288" align="left" valign="top"><table width="100%" align="left" cellpadding="2"  cellspacing="3">

  <form name="form1" method="post" action="editProduct.php?id=<? echo $_GET['id']?>&main=<? echo $_GET['main']; ?>" enctype="multipart/form-data">

          <tr>

            <td colspan="4" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">EDIT DETAILPAGE</td>

          </tr>

    <tr>

      <td><span class="red">* Required Fields</span></td>

    </tr>

    <tr>

      <td colspan="2" align="left" class="main_title">

        <? if($save=='true')

echo '<font color="#336600">Product is successfully updated</font>';

elseif($save=='false')

echo '<font color="#CC3300">Failed to update Product</font>';

?>      </td>

    </tr>

	<!--<tr>

<th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Section</th>



            <td width="78%">	

          

            <? /*$category_query=mysqli_query($conn, "select * from mydf_maincat where status=1 and section_type=1 order by position asc");

			$category_set=mysqli_fetch_assoc($category_query); 

			if($category_set!=''){

			?>

            <select name="cat" class="SelectField">

		  <option value="">Select section...</option>

		  <? do{?>

		  <option value="<? echo $category_set['maincat_id']; ?>"<? if($selected_set['maincat_id']==$category_set['maincat_id']){?> selected<? }?>> <? echo $category_set['maincat_name']; ?></option>

		  <? }while($category_set= mysqli_fetch_assoc($category_query));?>

		</select>

        <? }else{?> <span class="red">Please create the section first</span><? }*/?>          

          

          

               </td>

               </tr> -->





			<tr>

                        <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"><span class="red">*</span> Title</th>

                        <td width="78%"><input type="text" name="prod_name" value="<? echo $selected_set['product_name']?>" class="logfield02"></td>

			</tr>

                        <tr>

                          <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title"> Hyperlink</th>

                          <td><input type="text" name="link" value="<? echo $selected_set['hyper_link']?>" class="logfield02"></td>

                </tr>     

            

          <tr valign="top">

            <th width="31%" align="right" bgcolor="#EFEFEF" class="main_title">Brochure / Catalogue</th>

            <td class="content">

            Caption:<img src="../../images/space.gif" width="96" height="10"><input type="text" name="pdf_caption" class="logfield02" value="<? echo $selected_set['pdfcaption']; ?>">

                <br><img src="../../images/space.gif" width="140" height="10"><span class="red02"> Eg. Catalogue (5MB)</span>

                <br><img src="../../images/space.gif" width="140" height="5"><br>

                Upload File attachment:<img src="../../images/space.gif" width="8" height="10">

                <input type="file" name="pdf">

                

            

                <? if($selected_set['attachment_file']!=''){ ?> 

          <a href="../../<? echo $selected_set['attachment_file']; ?>" target="_blank">view</a>

          <a href="editProduct.php?cmd=pdf&id=<? echo $_GET['id']?>&main=<? echo $_GET['main']; ?>">

          <img src="../images/b_drop.png" width="15" height="15" border="0"></a><? } ?>	

                

<br><img src="../../images/space.gif" width="140" height="10"><span class="red02"> Max. size: 10MB. File format: PDF, doc, xls</span>            </td></tr>

            

            <tr>

            <td colspan="2" align="center" bgcolor="#CCCCCC">

                    <div style="text-shadow: #333333 2px -1px 3px; color:#FFF; font-size:20px; font-weight:bold;">EDIT CONTENT OF DETAIL PAGE</div>            </td>

            </tr>

            

            

            <tr valign="top">

              <td colspan="2">

                <table cellpadding="0" cellspacing="0" border="0" width="100%">

                  <tr>

                    <td align="left">

                      <textarea name="description" style="width:610px; height:700px;"><? echo $selected_set['description']?></textarea><!--class="Textareafield" -->

					</td>

				  </tr>

				</table>

			  </td>

            </tr>

                

                



    <tr>

      <td>&nbsp;</td>

      <td align="left">

        <input type="submit" name="submit" value="Submit" onClick="return check();">

&nbsp;

        <input type="reset" name="reset" value=" Reset ">      </td>

    </tr>

    <tr>

      <td>&nbsp;</td>

    </tr>

  </form>

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

<div id="Layer1" style="position:absolute; width:200px; height:46px; z-index:1; left: 740px; top: 4px;">

<table width="200" cellspacing="2" cellpadding="2">

  <tr>

	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>

  </tr>

</table>

</div>

</body>

</html>

