<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pamconnection = "localhost";
$database_pamconnection = "lib";
$username_pamconnection = "root";
$password_pamconnection = "";
$pamconnection = mysql_pconnect($hostname_pamconnection, $username_pamconnection, $password_pamconnection) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_select_db($conn, $database_pamconnection);	
?>