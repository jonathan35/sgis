<?
require_once("Connections/pamconnection.php");
session_start();
$domain = $_SERVER['HTTP_HOST'];
$path = $_SERVER['SCRIPT_NAME'];
$queryString = $_SERVER['QUERY_STRING'];
$url = "http://" . $domain . $path . "?" . $queryString;
$_SESSION['prevurl']= $url;
$curr_date=date("Y-m-d");
mysqli_query($conn, "update file_upload02 set hit_rates=hit_rates+1 where file_id=".base64_decode($_GET['v'])); 
$query=mysqli_query($conn, "SELECT * FROM file_upload02 WHERE file_id=".base64_decode($_GET['v']));
$query_set=mysqli_fetch_array($query);


	$v_query=mysqli_query($conn, "select * from file_upload02 where file_id='".base64_decode($_GET['v'])."' ");
	$video=mysqli_fetch_assoc($v_query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multimedia Library</title>
</head>

<body style="text-align:center">
<?php echo $video['video_link']?>
</body>
</html>