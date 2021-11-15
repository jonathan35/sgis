<?

if($_GET['root']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
	$sec_query=mysqli_query($conn, "select * from murum_section where maincat_id='".$section_id."' ");
	$sec_set=mysqli_fetch_assoc($sec_query);
	
	
}/*elseif($_GET['main']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
}elseif($_GET['sub']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
}*/

if($_GET['id']!=''){
	$result_id = mysqli_real_escape_string($conn, base64_decode($_GET['id']));
}

if($result_id !=''){
	$ff_query=mysqli_query($conn, "select * from mydf_product where id='".$result_id."' ");
	$ff_set=mysqli_fetch_assoc($ff_query);
}else{
	$ff_query=mysqli_query($conn, "select * from mydf_product where maincat_id like '%|".$section_id."|%' and status=1 order by position asc, product_name asc limit 1");
	$ff_set=mysqli_fetch_assoc($ff_query);
	
}

?>

<link href="css.css" rel="stylesheet" type="text/css">

<table width="90%" border="0" cellpadding="0" cellspacing="0">
  
<!--
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top" background="images/bg_content_top.j" class="content_text"><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><span class="content_price02"><strong><img src="images/space.gif" width="20" height="8" /><br />
          <?php //echo $sec_set["maincat_name"];?><br />
          </strong></span>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td background="images/line_h.gif"><img src="images/line_h.gif" width="515" height="3" /></td>
            </tr>
          </table>
          <img src="images/space.gif" width="20" height="8" /><br /></td>
      </tr>
    </table> </td>
  </tr>
  <tr valign="top">
    <td align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin:0 10px 0 10px;">
      <tr valign="top">
        <td align="left" valign="top" class="content_text"><?php /*if($ff_set!=''){
								echo "<span class=\"heading3\">".$ff_set['product_name']."</span>";
								}
								
								
								?></td>
      </tr>
      <tr valign="top">
        <td align="left" valign="top" class="content_text"><?php if($ff_set!=''){?>
          <img src="images/space.gif" width="320" height="3" />
          <?php }*/?></td>
      </tr>-->
      <tr valign="top">
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
              <tr valign="top">
                <td align="left" valign="top" class="content_text"><br />
                <?php 
                
                if($ff_set!=''){
                  echo str_replace("../../photo/","photo/",$ff_set['description']);
                }
                
                if($_GET['root'] == 'MTYx'){?>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.3994451822537!2d110.35631991475424!3d1.5280797988856323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31fba70c4d253cab%3A0x44fe0734b9503979!2sSaytech%20General%20Inspection%20Services!5e0!3m2!1sen!2smy!4v1635994474820!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <?php }?>
                </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="83%" class="content_text7" align="right"><strong>
              <?php if($ff_set['pdfcaption']!='' && $ff_set['attachment_file']!=''){?>
              <a href="<?php echo $ff_set['attachment_file']?>" target="_blank"> <?php echo $ff_set['pdfcaption'];?></a> <span class="content_text">&#9658;</span>
              <?php }?>
            </strong></td>
            <td width="17%" class="content_text7" align="center"><strong>
              <?php if($ff_set['hyper_link']!=''&&$ff_set['hyper_link']!='http://www.'){?>
              <a href="<?php echo $ff_set['hyper_link']?>" target="_blank">Link</a> <span class="content_text">&#9658;</span>
              <?php }?>
            </strong></td>
          </tr>
        </table></td>
      </tr>
    
  <tr>
    <td><?php include("paging_ff.php");?></td>
  </tr>
</table>
