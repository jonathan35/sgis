<?
require_once('Connections/pamconnection.php'); 
session_start();

require("calendar/config.php");
require("calendar/lang/lang." . LANGUAGE_CODE . ".php");
require("calendar/functions.php");


# testing whether var set necessary to suppress notices when E_NOTICES on
$month = 
	(isset($_GET['month'])) ? (int) $_GET['month'] : null;
$year =
	(isset($_GET['year'])) ? (int) $_GET['year'] : null;

# set month and year to present if month 
# and year not received from query string
$m = (!$month) ? date("n") : $month;
$y = (!$year)  ? date("Y") : $year;

$scrollarrows = scrollArrows($m, $y);
$auth 		  = auth();


	if($_GET['maincat']!=''){
		if($_GET['sort']=='hit'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by hit_rates desc";
		}elseif($_GET['sort']=='hit2'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by hit_rates asc";
		}elseif($_GET['sort']=='date'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by date desc";
		}elseif($_GET['sort']=='date2'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by date asc";
		}elseif($_GET['sort']=='Description'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by title asc";
		}elseif($_GET['sort']=='Description2'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by title desc";
		}elseif($_GET['sort']=='Type'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by subject asc";
		}elseif($_GET['sort']=='Type2'){
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by subject desc";
		}else{
			$query="select * from file_upload02 where category='".$_GET['maincat']."' and status=1 order by file_id desc";
		}
	}else{
		if($_GET['sort']=='hit'){
			$query="select * from file_upload02 where status=1 order by hit_rates desc";
		}elseif($_GET['sort']=='hit2'){
			$query="select * from file_upload02 where status=1 order by hit_rates asc";
		}elseif($_GET['sort']=='date'){
			$query="select * from file_upload02 where status=1 order by date desc";
		}elseif($_GET['sort']=='date2'){
			$query="select * from file_upload02 where status=1 order by date asc";
		}elseif($_GET['sort']=='Description'){
			$query="select * from file_upload02 where status=1 order by title asc";
		}elseif($_GET['sort']=='Description2'){
			$query="select * from file_upload02 where status=1 order by title desc";
		}elseif($_GET['sort']=='Type'){
			$query="select * from file_upload02 where status=1 order by subject asc";
		}elseif($_GET['sort']=='Type2'){
			$query="select * from file_upload02 where status=1 order by subject desc";
		}else{
			$query="select * from file_upload02 where status=1 order by file_id desc";
		}
	}

	$maxRows_Rs1 = 16;
	$pageNum_Rs1 = 0;
	if(!empty($_GET['pageNum_Rs1'])) {
	  $pageNum_Rs1 = $_GET['pageNum_Rs1'];
	}
	$startRow_Rs1 = $pageNum_Rs1 * $maxRows_Rs1;
	
	$colname_Rs1 = "";
	mysqli_select_db($conn, $database_pamconnection);
	
	$query_limit_Rs1 = sprintf("%s LIMIT %d, %d", $query, $startRow_Rs1, $maxRows_Rs1);
	$Rs1 = mysqli_query($conn, $query_limit_Rs1) or die(mysqli_error());
	$row_Rs1 = mysqli_fetch_assoc($Rs1);
	
	if(!empty($_GET['totalRows_Rs1'])) {
	  $totalRows_Rs1 = $_GET['totalRows_Rs1'];
	} else {
	  $all_Rs1 = mysqli_query($conn, $query);
	  $totalRows_Rs1 = mysqli_num_rows($all_Rs1);
	  
	}
	$totalPages_Rs1 = ceil($totalRows_Rs1/$maxRows_Rs1)-1;
	
	$queryString_Rs1 = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	  $params = explode("&", $_SERVER['QUERY_STRING']);
	  $newParams = array();
	  foreach ($params as $param) {
		if (stristr($param, "pageNum_Rs1") == false && 
			stristr($param, "totalRows_Rs1") == false) {
		  array_push($newParams, $param);
		}
	  }
	  if (count($newParams) != 0) {
		$queryString_Rs1 = "&" . htmlentities(implode("&", $newParams));
	  }
	}	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
body {
	background-image: url(images/bg.jpg);
}
-->
</style>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>

<a name="result"></a>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td><?php include("pre_design_header.php")?></td>
  </tr>
<tr>
   <td align="left" valign="top"><?php include("calendar/templates/default.php");?></td>
</tr>
</table>

