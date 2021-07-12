<?php require_once('Connections/pamconnection.php');
$id=mysqli_real_escape_string($conn, base64_decode($_GET['id']));
$selected_photo= mysqli_fetch_assoc(mysqli_query($conn, "select * from washington_gallery where status=1 and id='".$id."' "));
?>
<link href="css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-image: url(images/right_description.jpg);
}
-->
</style><body bgcolor="#ffffff">
<table width="410" height="0" border="0" align="center" cellpadding="2" cellspacing="2">
                <tr valign="top">
                  <td width="181" class="title5">
                 <?php $album= mysqli_fetch_assoc(mysqli_query($conn, "select * from album where album_id='".$selected_photo['album_id']."' "));
				 ?> <?php echo $album['album_name'];?>
				 
                  <br>
                  <div align="center"><img src="<?php echo $selected_photo['photo1'];?>" alt="" width="450" height="300" border="6"  class="photo_border" /></div></td>
  </tr>
                     <tr>
              <td align="right" colspan="4" class="content_text2"><a href="#" onClick="window.close()"><strong>Close [ X ]</strong></a></td>
  </tr>
                <tr valign="top">
                  <td align="left" class="content_text"><span class="title5">
				  <?php echo $selected_photo['product_name']?><br>
                  </span><?php if($selected_photo['description']!=""){
				  echo $selected_photo['description'];
					}?></td>
  </tr>
              </table>
</body>