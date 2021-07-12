<?
require_once("Connections/pamconnection.php");
session_start();
$domain = $_SERVER['HTTP_HOST'];
$path = $_SERVER['SCRIPT_NAME'];
$queryString = $_SERVER['QUERY_STRING'];
$url = "http://" . $domain . $path . "?" . $queryString;
$_SESSION['prevurl']= $url;
$curr_date=date("Y-m-d");
mysqli_query($conn, "update file_upload02 set hit_rates=hit_rates+1 where file_id=".$_GET['id']); 
$query=mysqli_query($conn, "SELECT * FROM file_upload02 WHERE file_id=".$_GET['id']);
$query_set=mysqli_fetch_array($query);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Download File</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-image: url(images/bg.jpg);
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css">
</head>


<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100" align="center" class="title4" valign="middle">
	<a href="<?php //echo $webpath."/"; ?>cms/multimedia/<?php echo $query_set['file']?>" onclick="showUser('<?php echo $query_set['file_id']?>')">Click to open or save the file</a></td>
  </tr>
</table>
</td>
  </tr>
</table>

</body>
</html>
