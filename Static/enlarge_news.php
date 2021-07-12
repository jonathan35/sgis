<?php require_once('Connections/pamconnection.php'); 
$abc=base64_decode($_GET['id']);
if($abc!="")
{
$selected_query=mysqli_query($conn, "select * from events_02 where status=1 and id='$abc'");
$selected=mysqli_fetch_assoc($selected_query);
}
?>
<link href="css.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" align="center">
  <tr>
  <td align="right"><a href="#" class="title5" onClick="window.close();">close [x]</a></td></tr> 	
  <tr>
    <td align="center"><img src="cms/news/<?php echo $selected['image1'];?>" width="480" height="360" /></td>
  </tr>
</table>

