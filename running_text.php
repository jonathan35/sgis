<?php require_once('Connections/pamconnection.php');
$running_text_query=mysqli_query($conn, "select * from runing_text where status=1 order by position asc");
$running_text=mysqli_fetch_array($running_text_query);

?>
<link href="css.css" rel="stylesheet" type="text/css">
<table border="0" cellspacing="0" cellpadding="0" width="730">
  <tr>
    <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="98%" align="right" valign="top" class="running_text"><div class="running_text">
          <marquee behavior="scroll" direction="left" scrollamount="4">
          <div align="right">
            <?php do{ 
		echo $running_text['album_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		}while($running_text=mysqli_fetch_array($running_text_query));?>
          </div>
          </marquee>
        </div></td>
        <td width="2%" align="right" valign="top" class="running_text"><img src="images/space.gif" width="20" height="10" /></td>
      </tr>
    </table></td>
  </tr>
</table>
