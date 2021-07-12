<style type="text/css">
</style>
<span class="bottom">
<?php 
	require_once("Connections/pamconnection.php");
	$timeoutseconds=300;        // Timeout value in seconds
	$timestamp=time();
	$timeout=$timestamp-$timeoutseconds;

	//mysqli_connect($server, $db_user, $db_pass) or die ("Useronline Database CONNECT Error");
	$a=$_SERVER['REMOTE_ADDR'];
	mysqli_query($conn, "INSERT INTO pro_useronline VALUES ('$timestamp','$a','$PHP_SELF')") or die(mysqli_error());
	mysqli_query($conn, "DELETE FROM pro_useronline WHERE timestamp<$timeout") or die(mysqli_error());
	$result=mysqli_query($conn, "SELECT DISTINCT ip FROM pro_useronline WHERE file='$PHP_SELF'") or die(mysqli_error());
	$user=mysqli_num_rows($result);
	//mysqli_close();
	
	if ($user==1) {echo"Online : $user";} else {echo"Onlines : $user";}
?>
</span>
