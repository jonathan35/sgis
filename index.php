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
        <td height="355" style="vertical-align:top; background:#EDEDED;">
          <div style="height: 40px; width:100%; background-image:url('images/home_top_shadow.jpg')"></div>
          
          <div style="padding:0 5px 0 5px; background:white; border-left:5px solid #EDEDED; border-right:5px solid #EDEDED; ">
                  <div style="background:#EDEDED; padding:0 7px 30px 7px; display: flex; align-items: center;
  justify-content: center;">
                    <div class="home-block home-block-1">
                      <div class="block-body">
                        <div class="home-block-title">About Us</div>
                        
                        <?php 
                        $home_query = mysqli_query($conn, "SELECT * FROM home_content WHERE id='1' and status='1'");
                        $home = mysqli_fetch_assoc($home_query);
                        $find = array("../../","<p>","</p>");
                        echo str_replace($find," ", $home['content']);?>
                      </div>
                      <a href="result.php?root=MTc4" class="block-href"><div class="home-block-more">More Details</div></a>
                    </div>
                    <div class="home-block home-block-2">
                      <div class="block-body">
                        <div class="home-block-title">Products</div>
                        <?php include("home_products.php");?>
                      </div>
                      <a href="result.php?root=MTc2" class="block-href"><div class="home-block-more">More Details</div></a>
                    </div>
                    <div class="home-block home-block-3">
                      <div class="block-body">
                        <div class="home-block-title">Contact Us</div>
                        <table>
                        <tbody>
                        <tr><td style="font-size: small; padding:4px;">
                        SGIS Certification (M) Sdn. Bhd.
                        </td></tr>
                        <tr><td style="font-size: small; padding:4px;">
                        Tel: 082 579724<br>
                        </td></tr>
                        <tr><td style="font-size: small; padding:4px;">
                        Fax: 082 570136<br>
                        <tr><td style="font-size: small; padding:4px;">
                        Email: grandaa.sgiscert@gmail.com<br>
                        </td></tr>
                        </tbody>
                        </table>
                        <?php //include("home_news.php");?>
                      </div>
                      <a href="result.php?root=MTYx" class="block-href"><div class="home-block-more">More Details</div></a>
                    </div>
                    
                  </div>
          </div>
          

        </td>
      </tr>

      <tr>
        <td align="center" valign="top">
        <div align="center" style="font-family:arial; padding:40px 90px 90px 90px;">
          <img src="images/logo2.jpg">
          <div style="font-size:50px; color:#40B3A2; font-weight:bold; padding:0 0 20px 0;">Scope of consultancy </div>
          <div>
            To assist planter and oil miller in the process of implementing its Malaysian Sustainable Palm Oil (MSPO) to comply with the MS 2530-3:2013 version through the provision of training and guidance.
          </div>
        </div>
        </td>
      </tr>
      <?php /*
      <tr>
        <td height="355" align="center" valign="top" background="images/home.jpg">
        <div align="center"><img src="images/space.gif" width="20" height="75">
        
        <br>
          <table width="970" border="0" cellspacing="20" cellpadding="12">
            <tr>
              <td width="33%" align="left" valign="top" class="content_text9"><div align="left">
                <?php 
					$home_query = mysqli_query($conn, "SELECT * FROM home_content WHERE id='1' and status='1'");
					$home = mysqli_fetch_assoc($home_query);
					$find = array("../../","<p>","</p>");
					echo str_replace($find," ", $home['content']);?>
              </div></td>
              <td width="33%" al1gn="left" valign="top" class="content_text9"><div align="left">
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
      */?>
      <tr>
        <td align="left" valign="top"><?php include("btm.php");?>          <br></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

<style>
.home-block {
  display:inline-block; margin:0 5px; height:305px; width:305px;  border-radius:10px;
  font-family: Arial; color:white;
}
.home-block-1 {
  background:#41b3a3;
}
.home-block-2 {
  background:#E27D5F;
}
.home-block-3 {
  background:#C38D9D;
}
.home-block-title {
  font-size:32px;
  font-weight:bold;
  padding-bottom:5px;
  text-shadow: 2px 3px 2px rgba(0,0,0,.5);
}
.block-body{
  padding:20px;
  height:200px;
  overflow:hidden; 
  vertical-align:top;
}
.home-block-more {
  background: #000;
  width:100px;
  color:white;
  text-align:center;
  border-radius:10px;
  padding:12px;
  margin:10px;
  transition: background .5s;
}
.block-href {
  text-decoration:none;
  position: relative;
  left:12px;
}
.block-href:hover {
  background: #666;
}
</style>
