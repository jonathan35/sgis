<?
session_start();
require_once('Connections/pamconnection.php');


if (!empty($_COOKIE['first_access']))
	{
		mysqli_query($conn, "UPDATE counter SET count = count+1");
		setcookie("first_access",'1111',time()+300);
	}

	$dcui_title_query = mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=30");
	$dcui_title_set = mysqli_fetch_assoc($dcui_title_query);


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

	$_GET['event'] = 'MjI1';
	$_GET['new'] = 'MjI2';
	$category_event_id = mysqli_real_escape_string($conn, base64_decode($_GET['event']));
	$category_new_id = mysqli_real_escape_string($conn, base64_decode($_GET['new']));
	


$news_qry = mysqli_query($conn, "select * from events_02 where status='1' and category like '%|".$category_new_id."|%' order by date desc limit 4"); //and category=''
$news = mysqli_fetch_assoc($news_qry);
	
$event_qry = mysqli_query($conn, "select * from events_02 where status='1' and category like '%|".$category_event_id."|%' order by date desc limit 4"); //and category=''
$event = mysqli_fetch_assoc($event_qry);

$random_qry = mysqli_query($conn, "select * from events_02 where status='1' order by rand() limit 2"); //and category=''
$random = mysqli_fetch_assoc($random_qry);

?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $dcui_title_set['record'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
	background-repeat: y-repeat;
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-43407528-1', 'tentex.com.my');
  ga('send', 'pageview');
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
        <td height="355" align="center" valign="top" background="images/home.jpg"><div align="center"><img src="images/space.gif" width="20" height="75"><br>
          <table width="970" border="0" cellspacing="20" cellpadding="12">
            <tr>
              <td width="33%" align="left" valign="top" class="content_text9"><div align="left">
                <?php 
					$home_query = mysqli_query($conn, "SELECT * FROM home_content WHERE id='1' and status='1'");
					$home = mysqli_fetch_assoc($home_query);
					$find = array("../../","<p>","</p>");
					echo str_replace($find," ", $home['content']);?>
              </div></td>
              <td width="33%" align="left" valign="top" class="content_text9"><div align="left">
                <?php include("home_products.php");?>
              </div></td>
              <td width="33%" align="left" valign="top" class="content_textA5"><div align="left">
                <?php include("home_news.php");?>
              </div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><div align="left"><a href="result.php?root=MTc4"><img src="images/space.gif" width="160" height="50" border="0"></a></div></td>
              <td align="left"><div align="left"><a href="result.php?root=MTc2"><img src="images/space.gif" width="160" height="50" border="0"></a></div></td>
              <td align="left"><div align="left"><a href="result.php?root=MjIy"><img src="images/space.gif" width="160" height="50" border="0"></a></div></td>
            </tr>
          </table>
          </div></td>
      </tr>
      <tr>
        <td align="left" valign="top"><?php include("btm.php");?>          <br></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
