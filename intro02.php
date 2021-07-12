<?php require_once("Connections/pamconnection.php");  
		$out_network_query=mysqli_query($conn, "SELECT * FROM banner_announcement WHERE status=1 ORDER BY position asc, banner_id DESC");
		$out_network_set=mysqli_fetch_assoc($out_network_query);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="350" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="350" height="170" background="images/frame_small.gif">
          <?
		  if( $browser=="ie") 
		  	$padding = "padding:16px 8px 16px 8px;";
		  else 
		  	$padding = "padding:16px 2px 16px 2px;";
		  ?>
          
          
          <div style="float:left;">
              <?php do{
				if($out_network_set['banner_file']!=''&& file_exists($out_network_set['banner_file'])){ 
				?>
              <div style="float:left; width:32%; <?=$padding?>" align="center">
                <?php if($out_network_set['hyperlink_url']!=''){?>
                <a href="<?=$out_network_set['hyperlink_url']?>" target="_self">
                  <?php }?>
                <img src="<?=$out_network_set['banner_file']?>" width="100" height="46" border="0" style="border:0px solid #CCC;" />
                <?php if($out_network_set['hyperlink_url']!=''){?>
                  </a>
                <?php }?>
              </div>
            <?php }
			}while($out_network_set=mysqli_fetch_assoc($out_network_query));?>
          </div></td>
        </tr>
      </table></td>
    </tr>
  </table></td>
</tr>
</table>