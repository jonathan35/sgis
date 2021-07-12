<?php require_once("Connections/pamconnection.php");
$curr_date=date("Y-m-d"); 
$news_query=mysqli_query($conn, "select * from hartz_events where status=1 and date >= '$curr_date' order by news_date desc limit 3");
$news=mysqli_fetch_assoc($news_query);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #55A0FF}
-->
</style>
</head>
<link href="css/wahba.css" rel="stylesheet" type="text/css">
<body>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" background="images/bg_right.gif"><img src="images/right_title_01.jpg" width="200" height="27"></td>
      </tr>
      <tr>
        <td valign="top" background="images/bg_right.gif">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
            <?php if($news!=''){?> 
			 <tr>
              <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                  <?php do{ 
		if($news['news_date']!=0000-00-00)
		{
			$day=substr($news['news_date'], 8, 2);
			$month=substr($news['news_date'], 5, 2);
		}		 			  
		?>
                  <tr>
                    <td width="30" height="30" background="images/calender_icon.gif" class="content_text" align="center"><?php echo date("M", mktime(0,0,0,substr($news['news_date'], 5, 2)));?><br>
                        <?php echo $day?></td>
                    <td class="content_text">&nbsp;&nbsp; <a href="news.php?newsid=<?php echo $news[news_id];?>" ><?php echo $news['news_title'];?></a> <br>
                        <?php //echo $news['news_date'].'<br><a href="events.php?newsid='.$news['news_id'].'">'.$news['news_title'].'</a>'?></td>
                  </tr>
                  <tr>
                    <td height="0" align="center" background="images/line_dotted.gif" class="content_text"><img src="images/space.gif" width="20" height="1"></td>
                    <td background="images/line_dotted.gif" class="title7"><span class="content_text"><img src="images/space.gif" width="100" height="1"></span></td>
                  </tr>
                  <?php }while($news=mysqli_fetch_assoc($news_query));?>
              </table></td>
            </tr>
            <?php }else{?>
			<tr>
              <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                   <tr>
                    <td width="10" height="30" class="content_text" align="center">&nbsp;</td>
                    <td align="center" class="content_text">NO LATEST EVENTS HAVE BEEN POSTED.</td>
                  </tr>
              </table></td>
            </tr>
            <?php }?>
            <tr>
              <td valign="top"><div align="right"><a href="news.php"><img src="images/more.gif" width="50" height="18" border="0" /></a></div></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="top" background="images/bg_right_02.gif"><img src="images/space.gif" width="200" height="8"></td>
      </tr>
      <tr>
        <td valign="top"><img src="images/space.gif" width="200" height="1"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
