<?php require_once('Connections/pamconnection.php'); 
$abc=base64_decode($_GET['id']);
if($abc!="")
{
$selected_query=mysqli_query($conn, "select * from events_02 where status=1 and id='$abc'");
$selected=mysqli_fetch_assoc($selected_query);
}
?>
<link href="css.css" rel="stylesheet" type="text/css">
<title>News</title><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {color:#043A77; font-size:17px; text-decoration:none; font-family: Arial, Helvetica, sans-serif;}
-->
</style><table width="100%" border="0" align="center">
  <tr>
  <td align="right"><span class="content_text6"><a href="#" onClick="window.close();">Close [X]</a></span></td>
  </tr> 	
  <tr>
    <td align="center">
    <?php if($_GET['no']==1){?>
        <img src="<?php echo $selected['image1'];?>" width="500" height="375" />
    <?php }elseif($_GET['no']=='2'){?>
        <img src="<?php echo $selected['image2'];?>" width="500" height="375" />
    <?php }elseif($_GET['no']=='3'){?>
        <img src="<?php echo $selected['image3'];?>" width="500" height="375" />
    <?php }?>
    </td>
  </tr>
</table>

