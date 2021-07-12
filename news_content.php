<?php require_once('Connections/pamconnection.php'); 
$abc=base64_decode($_GET['news']);
if($abc!="")
{
$selected_query=mysqli_query($conn, "select * from events_02 where status=1 and id='".$abc."'");
$selected=mysqli_fetch_assoc($selected_query);
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Malaysia DanceSport Federation</title>
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
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>

</head>

<body onLoad="MM_preloadImages('images/more_b.gif')">
<table width="920"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="bottom"><img src="images/01.gif" width="10" height="10"></td>
    <td align="center" valign="bottom" background="images/02.gif"><img src="images/02.gif" width="800" height="10"></td>
    <td valign="bottom"><img src="images/03.gif" width="10" height="10"></td>
  </tr>
  <tr>
    <td valign="top" background="images/04.gif"><img src="images/04.gif" width="10" height="100"></td>
    <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100%" align="center" valign="middle"><table width="920"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="middle"><div align="center">
                <?php include("top.php");?>
              </div></td>
            </tr>
          </table>            </td>
        </tr>
    </table>
      <table  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><?php include("panel.php");?></td>
            </tr>
            
          </table>            </td>
          <td valign="top"><?php include("banner.php");?></td>
        </tr>
        <tr>
          <td colspan="2"><?php include("running_text.php");?></td>
        </tr>
        <tr>
          <td align="left" valign="top" background="images/bg_01.jpg"><?php include("nav.php");?></td>
          <td align="left" valign="top" background="images/bg_content.gif"><table width="750" height="100%"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top" background="images/bg_content.gif"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td valign="top"><img src="images/bg_content_top.gif" width="570" height="8"></td>
                </tr>
                <tr>
                  <td valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left" valign="top" background="images/bg_content_top.j" class="content_text"><table width="100%" border="0" cellspacing="12" cellpadding="0">
                        <tr>
                          <td align="left" valign="top"> <span class="heading3">HOME</span><span class="title5"> <strong class="content_text7">&#9658;</strong>&nbsp;&nbsp;&nbsp;</span></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="content_text"><table width="100%" border="0" cellspacing="12" cellpadding="0">
                        <tr>
                          <td align="right" valign="top">
                          
                          <?php if($selected['image1']!='' && file_exists($selected['image1'])){?>
                          <div align="center"><img src="<?php echo $selected['image1'];?>" width="530" height="350" border="0" onClick="MM_openBrWindow('enlarge_news.php?id=<?php echo base64_encode($selected['id'])?>&no=1','','width=500,height=400')" /></a></div><?php }?>  
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="363" align="left" valign="top"><div align="left"><span class="content_text6"><br>
                                <?php echo $selected['date'];?></span><br>
                                  <span class="title5"><?php echo $selected['name'];?></span><br>
                                  <br>
                                    <span class="content_text"><?php echo str_replace("../../photo/","photo/",$selected['description']); ?><br>
                                    <br></span>
                              </div></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">
                              <table width="24%" border="0" cellpadding="0" cellspacing="0" align="right">
                  <tr>
                  	
                  	<?php if($selected['pdf_file']!=''){?>
                    <td align="center"><span class="content_text7"><strong>
                    <a href="<?php echo $selected['pdf_file']?>" target="_blank">PDF</a>
                    </strong></span>&nbsp;<span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    <?php if($selected['weblink']!='' && $selected['weblink']!='http://www.'){?>
                    <td align="center"><span class="content_text7"><strong>
                    <a href="<?php echo $selected['weblink']?>" target="_blank" class="content">Link</a>
                    </strong></span>&nbsp;<span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    </tr>
                  </table>                              </td>
                            </tr>
                          </table>
                            <div align="right"></div></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top"><div align="right"><span class="content_text6"><strong>Top</strong> &#9650;</span><br>
                          </div></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>             </td>
              <td width="186" align="right" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" valign="top"><?php include("nav_right.php");?></td>
                </tr>
                  
                </table></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
    <td valign="top" background="images/05.gif"><img src="images/05.gif" width="10" height="100"></td>
  </tr>
  <tr>
    <td valign="top" background="images/04.gif"><img src="images/space.gif" width="10" height="20"></td>
    <td align="center" valign="top"><?php include("btm.php");?></td>
    <td valign="top" background="images/05.gif"><img src="images/space.gif" width="10" height="20"></td>
  </tr>
  <tr>
    <td valign="top"><img src="images/06.gif" width="10" height="10"></td>
    <td valign="top" background="images/07.gif"><div align="center"><img src="images/07.gif" width="920" height="10"></div></td>
    <td valign="top"><img src="images/08.gif" width="10" height="10"></td>
  </tr>
</table>
</body>
</html>
