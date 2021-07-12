<?php 
require_once("Connections/pamconnection.php");

$my_photo_id=mysqli_real_escape_string($conn, $_GET['photo_id']);
$project_detail_query=mysqli_query($conn, "select * from washington_gallery where status=1 and id='".$my_photo_id."'");
$project_detail=mysqli_fetch_assoc($project_detail_query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<link href="css.css" rel="stylesheet" type="text/css" />
<body>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr valign="top" bgcolor="">
    <td width="50%" align="center" bgcolor=""><img src="<?php echo $project_detail['photo1']?>" width="450" height="338" border="2"  /></td>
    <td width="50%" bgcolor=""><table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td bgcolor="" class="heading4"><?php echo $project_detail['product_name']?>&nbsp;</td>
      </tr>
      <tr>
        <td class="content_text"><div align="justify"><?php echo $project_detail['description']?></div>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
