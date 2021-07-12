<?php require_once("Connections/pamconnection.php");  
		$product_query=mysqli_query($conn, "SELECT * FROM product_section WHERE status=1 ORDER BY rand()");
		$product_set=mysqli_fetch_assoc($product_query);
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
		  	$padding = "padding:6px 15px 6px 14px";
		  else 
		  	$padding = "padding:6px 3px 6px 1px";
		  ?>
          
          
          
           	<div style="float:left;">
			<?php 
			$limit_count = 1;
			do{
				if($product_set['image1']!=''&& file_exists($product_set['image1'])&&$limit_count<=6){ 
				?>
                <div style="float:left; width:32%; <?=$padding?>" align="center">
                <a href="result.php?root=MTc3&detail=<?=base64_encode($product_set['id'])?>" target="_self">
                <img src="<?=$product_set['image1']?>" width="87" height="66" style="border:0px solid #CCC;" />                </a>                </div>
            <?php $limit_count++;}
			}while($product_set=mysqli_fetch_assoc($product_query));?>
            </div>          </td>
        </tr>
      </table></td>
    </tr>
  </table></td>
</tr>
</table>