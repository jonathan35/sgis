<?php 

require_once('../../Connections/pamconnection.php');

require_once('../../pro/security.php');

session_start();



	if($_SESSION['validation']=='YES')

	{}	

	else{mysqli_query($conn, 

	header("Location:../authentication/login.php");

	}

mysqli_query($conn, 

	

	$mysqli_query($conn, ders->escapeInjection(base64_decode($_GET['id']));

	if($_GET['wp']==1){

		$ssss = mysqli_query($conn, "select image1 from events_02 where id='".$abc."' ");

		$asdss= mysqli_fetch_assoc($ssss);

		$myFile = $asdss['image1'];

			if(file_exists($myFile)){

			@unlink($myFile);

			}

			mysqli_query($conn, "update events_02 set image1='' where id='".$abc."'");

	}



	if($_GET['cmd']=='pdf'){

		mysqli_query($conn, "update events_02 set pdf_file='' where id='$abc'");

	}



	if($_POST['submit']=='Submit')

	{

	if($mysqli_query($conn, o1']!='')

		{

			$file_source1 = $_FILES['photo1']['tmp_name'];

			$type = $_FILES['photo1']['type']; 

			$file1 = ''; 

			$ext = substr(strrchr($type, "/"), 1);

		

			switch ( $ext )

			{ 

				case 'pjpeg':

					$file1 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'jpg':

					$file1 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'jpeg':

					$file1 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'gif':
mysqli_query($conn, 
					$file1 = 'photo/'.uniqid('').'.gif';

					break;

				case 'png':

					$file1 = 'photo/'.uniqid('').'.png';

					break;

			}

			if (( $file1 != '' ) )

			{ 

				if ( move_uploaded_file( $file_source1, "../../".$file1 ) ) 

				{

					mysqli_query($conn, "update events_02 set image1='$file1' where id='$abc'");

				} 

				else 

				{		

					echo 'File could not be uploaded to server.<BR>';

				} 

			}

		}

	if($_FILES['photo2']!='')
mysqli_query($conn, 
		{

			$file_source2 = $_FILES['photo2']['tmp_name'];

			$type = $_FILES['photo2']['type']; 

			$file2 = ''; 

			$ext = substr(strrchr($type, "/"), 1);

		

			switch ( $ext )

			{ 

				case 'pjpeg':

					$file2 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'jpg':

					$file2 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'jpeg':

					$file2 = 'photo/'.uniqid('').'.jpg';

					break;
mysqli_query($conn, 
				case 'gif':

					$file2 = 'photo/'.uniqid('').'.gif';

					break;

				case 'png':

					$file2 = 'photo/'.uniqid('').'.png';

					break;

			}

			if (( $file2 != '' ) )

			{ 

				mysqli_query($conn, loaded_file( $file_source2, "../../".$file2 ) ) 

				{

					mysqli_query($conn, "update events_02 set image2='$file2' where id='$abc'");
mysqli_query($conn, 
				} 

				else 

				{		

					echo 'File could not be uploaded to server.<BR>';

				} 

			}

		}		

		

	if($_FILES['photo3']!='')

		{

			$file_source3 = $_FILES['photo3']['tmp_name'];

			$type = $_FILES['photo3']['type']; 

			$file3 = ''; 

			$ext = substr(strrchr($type, "/"), 1);

		

			switch ( $ext )

			{ 

				case 'pjpeg':

					$file3 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'jpg':

					$file3 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'jpeg':

					$file3 = 'photo/'.uniqid('').'.jpg';

					break;

				case 'gif':

					$file3 = 'photo/'.uniqid('').'.gif';

					break;

				case 'png':

					$file3 = 'photo/'.uniqid('').'.png';

					break;

			}

			if (( $file3 != '' ) )

			{ 

				if ( move_uploaded_file( $file_source3, "../../".$file3 ) ) 

				{

					mysqli_query($conn, "update events_02 set image3='$file3' where id='$abc'");

				} 

				else 

				{		

					echo 'File could not be uploaded to server.<BR>';

				} 

			}

		}		

		

	//upload pdf pdf_file

		if($_FILES['pdf_file']!='')

	{

		$pdf_source = $_FILES['pdf_file']['tmp_name'];

		$type = $_FILES['pdf_file']['type']; 

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

			if ( move_uploaded_file( $pdf_source, "../../".$pdf ) ) 

			{

				mysqli_query($conn, "update events_02 set pdf_file='$pdf' where id='$abc'");

			}  

			else 

			{echo 'File could not be uploaded to server.<BR>';} 

		}

	}

	

	$nameP = $defenders->escapeInjection($_POST['name']);

	$weblinkP = $defenders->escapeInjection($_POST['weblink']);

	$dateP = $defenders->escapeInjection($_POST['date']);

	

	$brief = $_POST['brief'];

	$description=$_POST['description'];

	$description = str_replace ("'","&#39;",$description);

	$description = str_replace ("<br>","", $description);		

	$description = str_replace ("\\","", $description);	

	$description = str_replace ("'","\'", $description);

	//$feedback=$_POST['feedback'];

	

	if(mysqli_query($conn, "update events_02 set name='".$nameP."', weblink='".$weblinkP."', briefing='".$brief."', description='".$description."', date='".$dateP."' where id='".$abc."'"))

	$save='<font color=#336600>Successful</font>';

	else

	$save='<font color=#CC3300>Failed</font>';

}

$selected_query=mysqli_query($conn, "select * from events_02 where id='$abc'");

$selected=mysqli_fetch_assoc($selected_query);



include("../field_title.php");



?>	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<script language="JavaScript" src="../js/bbcode.js"></script>

<script language="JavaScript" src="../js/validate.js"></script>

<script language="JavaScript" src="../js/message.js"></script>

<script language="javascript" src="../js/menuAtNews.js"></script>



<!-- TinyMCE -->

<script type="text/javascript" src="../../tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">

tinymce.init({

    selector: "textarea",

    plugins: [

        "advlist autolink lists link image charmap print preview anchor",

        "searchreplace visualblocks code fullscreen",

        "insertdatetime media table contextmenu paste "//moxiemanager

    ],

    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | styleselect fontselect fontsizeselect",theme_advanced_fonts : "Arial=arial,helvetica,sans-serif; xxx; Courier New=courier new,courier,monospace;Times New Roman=times new roman,times,serif;Verdana=verdana,arial,helvetica,sans-serif;Tahoma=tahoma,arial,helvetica,sans-serif;",

	content_css : "css/content.css"

});

</script>

<!-- TinyMCE -->



<title>CMS</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../css/common.css" rel="stylesheet" type="text/css">

<link href="../css/component.css" rel="stylesheet" type="text/css">

<link href="../css/font.css" rel="stylesheet" type="text/css">

<link href="../css/layout.css" rel="stylesheet" type="text/css">

<style type="text/css">

<!--

.style3 {font-size: 10px;

	font-family: Verdana;

}

-->

</style>

<script language="javascript">

function check()

{

	if(form1.name.value=="")

	{

		alert("Please enter title.");

		form1.name.focus();

		return false;

	}

	if(form1.date.value=="")

	{

		alert("Please enter date.");

		form1.date.focus();

		return false;

	}

	return true;

}

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

function jumpMenu(target,selObj,restore){ 

  if (selObj.selectedIndex>0 && selObj.options[selObj.selectedIndex].value != ''){

    window.open(selObj.options[selObj.selectedIndex].value,target);}

  else if(selObj.options[selObj.selectedIndex].value == '')  {selObj.selectedIndex=0;}

  if (restore) selObj.selectedIndex=0;

}

</script>

</head>



<body><img src="../images/cmservice.jpg" width="800" height="50">

<table width="799" border="0" align="center" cellpadding="0" cellspacing="0">

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

<!--main category -->	

<table width="630" border="1" cellspacing="0" cellpadding="0">

<tr>

<td height="288" align="left" valign="top">

<table width="100%" align="left" cellpadding="2"  cellspacing="3">

	<form name="form1" method="post" action="editNews.php?id=<?php echo $defenders->escapeInjection($_GET['id'])?>" enctype="multipart/form-data">

	<tr>

	  <td colspan="2" height="32" class="main_title" align="center" bgcolor="#CCCCCC" valign="middle">EDIT NEWS </td>

	</tr>

	<tr><td><span class="red">* Required Fields</span></td></tr>

	<tr>

	  <td colspan="2" align="left" class="main_title">

	<?php echo $save;?>

		</td>

	  </tr>

	  <tr>

<th align="right" bgcolor="#EFEFEF" class="main_title" valign="top"><?php echo image02("$field")?></th>

          <td width="80%" class="content"> Photo 1&nbsp;&nbsp;&nbsp;<?php if($selected['image1']!=''){?><a href="editNews.php?<?php echo $_SERVER['QUERY_STRING']?>&wp=1"><img src="../images/b_drop.png" width="16" height="15" border="0"></a><?php }?><br>

				<?php if($selected['image1']!=''&& file_exists("../../".$selected['image1'])){$photo1="../../".$selected['image1'];}else{$photo1='../images/no_photo.gif';}?>

                  <img name="thisImage1" id="thisImage1" src="<?php echo $photo1?>" width="100" height="75"><br>

                  <input name="photo1" type="file" class="content" onChange="javascript:findItem('thisImage1').src = findItem('photo1').value;">

            </td>

</tr>





	  	<tr>

	  	  <th width="20%" align="right" bgcolor="#EFEFEF" class="content"><span class="red">*</span> Title</th>

	  	  <td><input name="name" type="text" id="name" value="<?php echo $selected['name']?>"></td>

	  	  </tr>

	<tr>

	  <th align="right" bgcolor="#EFEFEF" class="content"><?php echo attachment("$field")?></th>

	  <td><input name="pdf_file" type="file" id="pdf_file"><?php if($selected['pdf_file']!=''){?> 

		<a href="editNews.php?id=<?php echo $defenders->escapeInjection($_GET['id'])?>&cmd=pdf">

		<img src="../images/b_drop.png" width="15" height="15" border="0"></a>

		<a href="<?php echo "../../".$selected['pdf_file']?>" target="_blank" class="content">view</a><?php }?></td>

	  </tr>

	 <tr>

	  <th align="right" bgcolor="#EFEFEF" class="content"><span class="main_title"><?php echo hyperlink("$field")?></span></th>

	  <td class="content"><input name="weblink" type="text" id="weblink" value="<?php echo $selected['weblink']?>"></td>

	  </tr>

      <tr>

	  <th align="right" bgcolor="#EFEFEF" class="content"><span class="main_title"><?php echo date_field("$field")?></span></th>

	  <td class="content"><input name="date" type="text" id="date" value="<?php echo $selected['date']?>"></td>

	  </tr>

      

	<tr>

		<th align="right" bgcolor="#EFEFEF" class="content" valign="top"><span class="main_title"><?php echo brief("$field")?></span></th>

		<td align="left">

		<textarea name="brief" rows="5" cols="50"><?php echo $selected['briefing']?></textarea>

		</td>

	</tr>      

	<tr>

		<th align="right" bgcolor="#EFEFEF" class="content" valign="top"><span class="main_title"><?php echo tiny01("$field")?></span></th>

		<td align="left">

		<textarea name="description" rows="15" class="mceEditor" cols="50"><?php echo $selected['description']?></textarea>

		</td>

	</tr>

    

    

	<tr>

	  <th align="right" class="content">&nbsp;</th>

	  <td class="content">&nbsp;</td>

	  </tr>

	<tr>

	<td>&nbsp;</td>

	<td align="left">

	<input type="submit" name="submit" value="Submit" onClick="return check();">&nbsp;<input type="reset" name="reset" value=" Reset ">

	</td></tr>

	<tr><td>&nbsp;</td></tr>

	</form> 

</table>

</td>

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

    <td width="169" align="left" valign="top">

	<!--menu-->

	<?php include("../menu.php");?>

	<!--menu-->		

	</td>

  </tr>

  <tr>

    <td align="left" valign="top">&nbsp;</td>

  </tr>

</table>

<div id="Layer1" style="position:absolute; width:200px; height:40px; z-index:1; left: 740px; top: 4px;">

<table width="200" cellspacing="2" cellpadding="2">

  <tr>

	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>

  </tr>

</table>

</div>

</body>

</html>

