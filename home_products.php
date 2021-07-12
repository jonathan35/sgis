<?php 
	$home_query1 = mysqli_query($conn, "SELECT * FROM home_content WHERE id='2' and status='1'");
	$home1 = mysqli_fetch_assoc($home_query1);
	$find = array("../../","<p>","</p>");
	echo str_replace($find," ", $home1['content']);?>
