<?

$get_section = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
if($get_section!="")
{	
	$rootcat_query = mysqli_query($conn, "select * from murum_section where maincat_id='".$get_section."'");
	$rootcat_set = mysqli_fetch_assoc($rootcat_query);
}


$get_scat = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
if($get_scat!="")
{	
	$subcat_query = mysqli_query($conn, "select * from murum_section where maincat_id='".$get_scat."'");
	$subcat_set = mysqli_fetch_assoc($subcat_query);
}

$get_sscat = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
if($get_sscat!="")
{	
	$subsubcat_query = mysqli_query($conn, "select * from murum_section where maincat_id='".$get_sscat."'");
	$subsubcat_set = mysqli_fetch_assoc($subsubcat_query);
}

$get_id = mysqli_real_escape_string($conn, base64_decode($_GET['id']));
if($get_id!="")
{	
	$prod_query = mysqli_query($conn, "select * from mydf_product where id='".$get_id."' ");
	$prod_set = mysqli_fetch_assoc($prod_query);
}

$get_detail = mysqli_real_escape_string($conn, base64_decode($_GET['detail']));
if($rootcat_set['url_file']='product.php'&&$get_detail!="")
{	
	$prod_sec_query = mysqli_query($conn, "select * from product_section where id='".$get_detail."' ");
	$prod_sec = mysqli_fetch_assoc($prod_sec_query);
}



?>
<link href="css.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--<tr>
    <td align="left" class="content_price02"><strong><?php echo $rootcat_set['maincat_name'];?></strong> 
    </td>
  </tr> -->
  <?php if($subcat_set['maincat_name']!='' || $subsubcat_set['maincat_name']!='' || $prod_set['product_name']!='' || $rootcat_set['maincat_name']!=''){?>
  <!--<tr>
    <td background="images/line_h.gif" style="background-repeat:repeat-x">&nbsp;</td>
  </tr>-->
  
  <tr>
    <td align="left" class="heading3">
	<div style="float:left; position:relative; width:100%;" align="left">
   <?php if(!empty($subcat_set['maincat_name'])){?>
   <a href="result.php?root=<?php echo $_GET['root']?>&main=<?php echo $_GET['main']?>" target="_parent"><?php if($subcat_set['maincat_name']!=''){echo $subcat_set['maincat_name']."&nbsp;<img src=\"images/pointer03.gif\" style=\"vertical-align:middle;\" border=\"0\" />&nbsp;&nbsp;";}?>
   </a>
   <?php }else{?>
   <a href="result.php?root=<?php echo $_GET['root']?>" target="_parent"><?php echo $rootcat_set['maincat_name']."&nbsp;&nbsp;<img src=\"images/pointer03.gif\" style=\"vertical-align:middle;\" border=\"0\" />&nbsp;&nbsp;";?></a>
   <?php }?>
    
    <?php if($subsubcat_set['maincat_name']!=''){echo $subsubcat_set['maincat_name']."&nbsp;&nbsp;<img src=\"images/pointer03.gif\" style=\"vertical-align:middle;\" />&nbsp;&nbsp;";}?>
	<br />
<?php if($prod_set['product_name']!=''){ echo $prod_set['product_name']; }?>
   </div>
    
    <div style="float:right; position:relative; width:15%; " align="right">

		<?php if($prod_sec['brand_logo']!=''&&file_exists($prod_sec['brand_logo'])){?>
            <img src="<?=$prod_sec['brand_logo']?>" height="40" />
		<?php }elseif($subsubcat_set['brand_logo']!=''&&file_exists("photo/".$subsubcat_set['brand_logo'])){?>
            <img src="<?="photo/".$subsubcat_set['brand_logo']?>" height="40" />
        <?php }elseif($subcat_set['brand_logo']!=''&&file_exists("photo/".$subcat_set['brand_logo'])){?>
            <img src="<?="photo/".$subcat_set['brand_logo']?>" height="40" />
        <?php }elseif($rootcat_set['brand_logo']!=''&&file_exists("photo/".$rootcat_set['brand_logo'])){?>
            <img src="<?="photo/".$rootcat_set['brand_logo']?>" height="40" />
        <?php }?>
    </div>    </td>
  </tr>  
  <?php }?>
  <!-- --> 
</table>

