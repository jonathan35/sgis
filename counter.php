<?
require_once('Connections/pamconnection.php');

//////////////////////////////////////////VISITORS COUNTER START/////////////////////////////////////////////



//store the result of the query in $result
$result = mysqli_query($conn, "SELECT * FROM counter");

//retrieve the fields in our table
$fields = mysqli_fetch_row($result);

//$mycount variable is set to the first field (count)
$mycount = $fields[0];
?>
<!--<link href="../css.css" rel="stylesheet" type="text/css"> -->
<span class="copyright"><?php echo $mycount;?> visitors | </span> 
<?php //////////////////////////////////////////VISITORS COUNTER END/////////////////////////////////////////////?>
<?php 
//////////////////////////////////////////USER ONLINE START//////////////////////////////////////
	require_once('Connections/pamconnection.php');
	$timeoutseconds=300;
	// Timeout value in seconds
	$timestamp=time();
	$timeout=$timestamp-$timeoutseconds;

	//mysqli_connect($server, $db_user, $db_pass) or die ("Useronline Database CONNECT Error");
	$a=$_SERVER['REMOTE_ADDR'];
	mysqli_query($conn, "INSERT INTO useronline VALUES ('$timestamp','$a','$PHP_SELF')") or die(mysqli_error());
	mysqli_query($conn, "DELETE FROM useronline WHERE timestamp<$timeout") or die(mysqli_error());
	$result=mysqli_query($conn, "SELECT DISTINCT ip FROM useronline WHERE file='$PHP_SELF'") or die(mysqli_error());
	$user=mysqli_num_rows($result);
	//mysqli_close();
	
	?><span class="copyright"><?php echo $user." Online";?></span>
<?
//////////////////////////////////////////USER ONLINE END//////////////////////////////////////
?>
