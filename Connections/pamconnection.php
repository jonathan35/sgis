<?php

error_reporting(0);

Class DBConn{
	var $hostname = "localhost";
	var $database = "tentex";//easy
	var $username = "root";//easyuser
	var $password = "";//hoasd182oasdDs1
}

$DB = New DBConn;
$conn = mysqli_connect($DB->hostname, $DB->username, $DB->password) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_select_db($conn, $DB->database);	
?>