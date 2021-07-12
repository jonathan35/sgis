<?php

require("config.php");
require("./lang/lang.admin." . LANGUAGE_CODE . ".php");

mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die(mysqli_error());
mysqli_select_db(DB_NAME) or die(mysqli_error());

mysqli_query($conn, "CREATE TABLE " . DB_TABLE_PREFIX . "mssgs (
  id mediumint(5) unsigned NOT NULL auto_increment,
  uid tinyint(3) unsigned NOT NULL default '0',
  m tinyint(2) NOT NULL default '0',
  d tinyint(2) NOT NULL default '0',
  y smallint(4) NOT NULL default '0',
  start_time time NOT NULL default '00:00:00',
  end_time time NOT NULL default '00:00:00',
  title varchar(50) NOT NULL default '',
  text text NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM") or die(mysqli_error());

mysqli_query($conn, "create index m on " . DB_TABLE_PREFIX . "mssgs (m)");
mysqli_query($conn, "create index y on " . DB_TABLE_PREFIX . "mssgs (y)");

mysqli_query($conn, "CREATE TABLE " . DB_TABLE_PREFIX . "users (
  uid smallint(6) NOT NULL auto_increment,
  username char(15) NOT NULL default '',
  password char(32) NOT NULL default '',
  fname char(20) NOT NULL default '',
  lname char(30) NOT NULL default '0',
  userlevel tinyint(2) NOT NULL default '0',
  email char(40) default NULL,
  PRIMARY KEY  (uid)
) TYPE=MyISAM") or die(mysqli_error());

mysqli_query($conn, "INSERT INTO " . DB_TABLE_PREFIX . "users 
	(username, password, fname, lname, userlevel, email) VALUES (
	'admin', 'password', 'default', 'user', 2, '');
") 
or die (mysqli_error());

echo $lang['successfulinstall'];
?>
