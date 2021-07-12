<?php 
require_once('../../Connections/pamconnection.php'); 

$query2=mysqli_query($conn, "select * from events_02_bk");
$set2=mysqli_fetch_assoc($query2);

$query1=mysqli_query($conn, "select * from events_02");
$set1=mysqli_fetch_assoc($query1);

$test1=mysqli_query($conn, "select id from events_02 where id='".$set2['id']."'");
$set=mysqli_fetch_assoc($test1);

if($_POST['submit']=='Submit')
	{
	if(mysqli_query($conn, "insert into events_02 (id, name, image1, pdf_file, weblink, type, description, date) 
values ('".$set2['id']."', '".$set2['name']."', '".$set2['image1']."', '".$set2['pdf_file']."', '".$set2['weblink']."', '$newstype', '".$set2['description']."', '".$set2['date']."')"))
	$save='<font color=#336600>Successful</font>';
	else
	$save='<font color=#CC3300>Failed</font>';
}
?>
<form name="form1" method="post" action="manageNews3.php">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td colspan="3"><?php echo $save?>&nbsp;</td></tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10%%">&nbsp;</td>
        <td width="50%">News</td>
        <td width="40%">Title</td>
      </tr>
      <?php if($set2!=''){ do{?>
      <tr valign="top">
        <td><input type="checkbox" value="<?php echo $set2['id']; ?>" name="idList[]"></td>
        <td><img src="<?php echo $set2['image1']; ?>" width="80" height="60" border="0"></td>
        <td><?php echo $set2['name']?></td>
      </tr>
      <tr><td colspan="3">&nbsp;</td></tr>
      <?php } while ($set2=mysqli_fetch_assoc($query2));}?>
    </table></td>
  </tr>
  <tr>
    <td align="right">
        <input type="submit" name="Save" id="button" value="Submit">
    </td>
  </tr>
  </table>
</form>