<?
require_once('Connections/pamconnection.php');  
session_start();

if ($_COOKIE['first_access']=='')
	{
		mysqli_query($conn, "UPDATE counter SET count = count+1");
		setcookie("first_access",'1111',time()+300);
	}
	
if($_GET['root']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
	$rootcat_check_query=mysqli_query($conn, "select * from murum_section where maincat_id='".$section_id."' and status=1 ");
	$rootcat_check_set=mysqli_fetch_assoc($rootcat_check_query);
	
}elseif($_GET['main']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
	$title_query=mysqli_query($conn, "select * from murum_section where maincat_id='".$section_id."' and status=1 ");
	$title_set=mysqli_fetch_assoc($title_query);
	
	$parent_of_current_id = substr($title_set['position'],0,1);
	$rootcat_check_query=mysqli_query($conn, "select * from murum_section where position='".$parent_of_current_id."' and status=1 ");
	$rootcat_check_set=mysqli_fetch_assoc($rootcat_check_query);
}elseif($_GET['sub']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
	$title_query=mysqli_query($conn, "select * from murum_section where maincat_id='".$section_id."' and status=1 ");
	$title_set=mysqli_fetch_assoc($title_query);
	
	$parent_of_current_id = substr($title_set['position'],0,1);
	$rootcat_check_query=mysqli_query($conn, "select * from murum_section where position='".$parent_of_current_id."' and status=1 ");
	$rootcat_check_set=mysqli_fetch_assoc($rootcat_check_query);
}else{
	$rootcat_check_query=mysqli_query($conn, "select * from murum_section where status=1 and position!='' order by position asc limit 1 ");
	$rootcat_check_set=mysqli_fetch_assoc($rootcat_check_query);
}

if($rootcat_check_set!=''){

		if($rootcat_check_set['section_type']==2){
			$pre_url = $rootcat_check_set['url_file'];
		}else{
			$pre_url = 123;
		}
}else{
	$pre_url = 123;	
	
}
	$dcui_title_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=30");
	$dcui_title_set=mysqli_fetch_assoc($dcui_title_query);


if (preg_match("/opera/i",$_SERVER["HTTP_USER_AGENT"])) {
    $browser = "opera";
} else if (preg_match("/gecko/i",$_SERVER["HTTP_USER_AGENT"])) {
    $browser = "gecko";
} else if (preg_match("/msie.[4|5|6|7]/i",$_SERVER["HTTP_USER_AGENT"])) {
    $browser = "ie";
} else if (preg_match("/nav/i",$_SERVER["HTTP_USER_AGENT"]) ||
preg_match("/Mozilla\/5\./", $_SERVER["HTTP_USER_AGENT"])) {
    $browser = "netscape";
} else {
    $browser = "other";
}
	 

	
	$news_id=base64_decode($_GET['news']);

	$query1=mysqli_query($conn, "select * from events_02 where status=1 and id='$news_id'");
	$set=mysqli_fetch_assoc($query1);

if($_GET['sub']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
}elseif($_GET['main']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
}

if($category_id!=''){
	$query="select * from events_02 where status=1 and id!='$news_id' and category like '%|".$category_id."|%' order by date desc";
}else{
	$query="select * from events_02 where status=1 and id!='$news_id' order by date desc";
}

$currentPage = $_SERVER["PHP_SELF"];	
$maxRows_Rs1 = 4;
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
		stristr($param, "totalRows_Rs1") == false){
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
<title><?php echo $dcui_title_set['record'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/tabpane.js"></script>
<link type="text/css" rel="StyleSheet" href="css/tab.webfx.css" />

<style type="text/css">
<!--
body {
	background-image: url(images/bg_bg.jpg);
	background-position:center top;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
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
</head>

<body onLoad="MM_preloadImages('images/more_b.gif','images/nav_001b.gif','images/nav_002b.gif','images/btn_eng02.gif','images/btn_bm02.gif')">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="980"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle"><?php include("top.php");?></td>
      </tr>
      <tr>
        <td height="295" align="center" valign="top" background="images/bg_banner.jpg"><div align="center"><?php include("banner02.php");?>
        </div></td>
        </tr>
      <tr>
        <td height="134" align="left" valign="top" background="images/btm_main02.jpg"><table width="980" border="0" cellspacing="0" cellpadding="0">
          <tr>
            
            
        <td width="33%" height="134" align="center">
        <div style=" width:300px; height:95px; margin-left:0px">
        <div class="tab-pane" id="tab-pane-1">

<script type="text/javascript">
var tabPane1 = new WebFXTabPane( document.getElementById( "tab-pane-1" ) );
</script>

   <div class="tab-page" id="tab-page-1">
      <h2 class="tab">News</h2>
		<div id="more"><a href="result.php?root=MjIy"> More +</a></div>
      <script type="text/javascript">
      tabPane1.addTabPage( document.getElementById( "tab-page-1" ) );
      </script>
       <?php if($row_Rs1!=''){ do{?>
<table  cellpadding="0" cellspacing="0" width="100%"><tr><td  width="78%" class="title3"><a href="result.php?root=<?php echo  $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&detail=<?php echo base64_encode($row_Rs1['id']);?>">

<?
$table_cell_data = $row_Rs1['name'];
$cell_limit      = 29; 

if(strlen($table_cell_data) > $cell_limit) {

   $sub_string = $cell_limit - 0; 

   $table_cell_data = substr($table_cell_data,0,$sub_string)."...";
}

echo $table_cell_data."<br />\n";
        
?>


 </a></td>
     <td width="22%" class="title3"><?php echo $row_Rs1['date'];?>
</td></tr></table>
    <?php }while($row_Rs1 = mysqli_fetch_assoc($Rs1));} ?>
 
 



                       


   </div>

   <div class="tab-page" id="tab-page-2">
      <h2 class="tab">Events</h2>
	<div id="more"><a href="result.php?root=MjIy"> More +</a></div>
      <script type="text/javascript">
      tabPane1.addTabPage( document.getElementById( "tab-page-2" ) );
      </script>

     <table  cellpadding="0" cellspacing="0" width="100%"><tr><td width="70%"  class="title3"> Coming Soon!</td><td width="30%"  class="title3">
</td></tr></table>

   </div>
</div></div>
        </td>
        
        
        <td width="33%" height="134"align="center">
        <div style=" width:290px; height:90px; margin-left:17px">
        <table  width="290" height="90" cellpadding="0" cellspacing="0"><tr>
        <td width="33%"><img src="images/test1.jpg" width="90" height="90"></td>
        <td width="67%"><table align="left" width="98%" height="100%" cellpadding="0" cellspacing="0"><tr><td height="30%"class="content_text"><strong>Night At The Museum</strong></td></tr><tr><td height="30%" class="content_text">Petroleum Museum, Miri</td></tr><tr><td height="20%" class="title3">Friday, 11 Nov - 9 Dec at 9am</td></tr><tr><td height="20%" class="title3">Sundays 20 Nov - 11 Dec at 12pm</td></tr></table></td>
        </tr>
        </table>
         </div>
        </td>
        
        
        <td width="33%" height="134"align="center">
        <div style=" width:290px; height:90px; margin-left:14px">
        <table  width="290" height="90" cellpadding="0" cellspacing="0"><tr>
        <td  width="33%"><img src="images/test2.jpg"  ></td>
        <td width="67%"><table  align="left" width="95%" height="100%" cellpadding="0" cellspacing="0"><tr><td height="30%"class="content_text"><strong>Paintful But Beautiful</strong></td></tr><tr><td height="30%" class="content_text">Baram Regional Museum, Marudi, Miri</td></tr><tr><td height="20%" class="title3"></td></tr><tr><td height="20%" class="title3">Daily, 26 Sep - 31 Dec at 9am onward</td></tr></table></td>
        </tr>
        </table>
         </div>
        </td>    
            
            
            
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><?php include("btm.php");?>          <br></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
