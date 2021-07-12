<?
require_once('Connections/pamconnection.php');  
session_start();

if (empty($_COOKIE['first_access'])){
	
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

		if($_GET['page'] == 'true'){//TINY page that is not link to any section.
			$pre_url = 'false'; 
		}elseif($rootcat_check_set['section_type']==2){
			$pre_url = $rootcat_check_set['url_file'];
		}else{
			$pre_url = 'false';
		}
}else{
	$pre_url = 'false';	
}
	$dcui_title_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=30");
	$dcui_title_set=mysqli_fetch_assoc($dcui_title_query);


?>	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $dcui_title_set['record'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">

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
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle"><div align="center">
      <?php include("top.php");?>
    </div></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top" background="images/bg_inside.jpg"><div align="center">
      <table width="960"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <?
	$switch_of_c1_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=4");
	$switch_of_c1_set=mysqli_fetch_assoc($switch_of_c1_query);
	$width_of_c1_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=5");
	$width_of_c1_set=mysqli_fetch_assoc($width_of_c1_query);
	
	$switch_of_c2_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=6");
	$switch_of_c2_set=mysqli_fetch_assoc($switch_of_c2_query);
	$width_of_c2_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=7");
	$width_of_c2_set=mysqli_fetch_assoc($width_of_c2_query);
	
	$switch_of_c3_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=2");
	$switch_of_c3_set=mysqli_fetch_assoc($switch_of_c3_query);
	$width_of_c3_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=3");
	$width_of_c3_set=mysqli_fetch_assoc($width_of_c3_query);
	
	
			  ?>
              <tr>
                <?php if($switch_of_c1_set['record']=='1'){?>
                <td  style="background:url(images/nav_02bg2.jpg) no-repeat;"  width="<?php echo $width_of_c1_set['record'];?>" align="left" valign="top"><img src="images/space.gif" width="180" height="40"><br>
                  <table width="100%" border="0" cellspacing="10" cellpadding="0">
                    <tr>
                      <td height="240" align="left" valign="top">                        <?php include("pre_design_header.php")?>
                        <br>
                        <?php include("nav02.php");?></td>
                    </tr>
                  </table>
                  </td>
                <?php }?>
                <?php if($switch_of_c2_set['record']=='1'){?>
                <td width="<?php echo $width_of_c2_set['record'];?>" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80%" align="center" valign="top">
				<?php 

				  if($pre_url=='false'){
						if($_GET['form']=='detail1'){
							include("bookingDetail1.php");  
						}elseif($_GET['form']=='detail2'){
							include("bookingDetail2.php");  
							
						}elseif($_GET['enquiry']=='book1'){
							include("bookingRoomA.php");  
						}elseif($_GET['enquiry']=='book2'){
							include("bookingRoomHm.php");  
						}elseif($_GET['enquiry']=='book3'){
							include("bookingRoom.php");  
							
						}elseif($_GET['enquiry']=='enquiry1'){
							include("enquiryFormA.php");  
						}elseif($_GET['enquiry']=='enquiry2'){
							include("enquiryForm.php");  
						}else{
							include("result_content.php");
						}
						
				  }else{
					  
					  include($pre_url);
				  }
				  ?>                      </td>
                    </tr>
                  </table>
                    <?php //echo $switch_of_c3_set['record']."zzz";?> </td>
                <?php } ?>
                <?php if($switch_of_c3_set['record']=='1'){?>
                <td width="<?php echo $width_of_c3_set['record'];?>" align="right" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0" background="">
                    <tr>
                      <td align="right" valign="top"><div align="left">
                          <?php include("nav_right.php");?>
                      </div></td>
                    </tr>
                </table></td>
                <?php }else{?>
                <?php }?>
              </tr>
          </table></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle"><div align="center">
      <?php include("btm.php");?>
    </div></td>
  </tr>
</table>
</body>
</html>
