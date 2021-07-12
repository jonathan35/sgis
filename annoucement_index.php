<?
require_once('Connections/pamconnection.php');
$query=mysqli_query($conn, "select * from events_02 where status=1 order by date desc limit 5");
$set=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<link href="css.css" rel="stylesheet" type="text/css">
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <?php if($set!=''){?>
	  <?php do{?>  
      <tr valign="top">
        <td class="news_text" align="left"><?php echo $set['date']?></td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="news_text" align="left"><a href="events_content.php?id=<?php echo base64_encode($set['id'])?>"><?php echo substr($set['name'],0,50).'..';?></a></td>
              </tr>
            <tr>
              </tr>
          </table></td>
      </tr>
      <tr valign="top">
        <td class="news_text" colspan="2" align="left"><?php echo substr($set['description'],0,150).'..';?></td>
      </tr>
       <?php }while($set=mysqli_fetch_assoc($query));} else echo 'No item posted at the moment'?>
    </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="right" class="news_more"><a href="events_content.php">more</a></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
