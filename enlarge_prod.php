<?php require_once('Connections/pamconnection.php'); 
$abc=base64_decode($_GET['id']);
if($abc!="")
{
$selected_query=mysqli_query($conn, "select * from product_section where status=1 and id='$abc'");
$selected=mysqli_fetch_assoc($selected_query);
}
?>
<link href="css.css" rel="stylesheet" type="text/css">
<title>MYDF</title><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style><table width="100%" border="0" align="center">
  <tr>
  <td align="right"><span class="content_text7"><a href="#" class="heading3" onClick="window.close();">Close</a></span><a href="#" class="heading3" onClick="window.close();"> <span class="title5">[x]</span></a></td>
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

