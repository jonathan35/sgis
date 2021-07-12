<link href="css.css" rel="stylesheet" type="text/css">
<?php require_once("Connections/pamconnection.php");  
		$product_query=mysqli_query($conn, "SELECT * FROM events_02 WHERE status=1 ORDER BY date desc limit 3 ");
		$product_set=mysqli_fetch_assoc($product_query);
?>
<link href="css.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" >
        <tr>
          <td align="center"><img src="images/space.gif" width="20" height="5" /></td>
        </tr>
        <tr>
          <td>
           	<div style="float:left;">
			<?php 
			do{
				?>
			<div style="float:left; width:99%;" align="left" class="title1">
            
                <a href="result.php?root=NQ==&main=<?=strrpos( substr( $product_set['category'], 0, 100), '|' )?>&sub=<?php ?>&detail=<?=base64_encode($product_set['id'])?>" target="_self">
                <strong><?=$product_set['name']?></strong>                </a>                </div>
                <div style="float:left; width:99%;" align="left" class="content_text6">
                <?
				$retrieved_date = $product_set['date'];
				echo $new_date_format = date('d M Y', strtotime($retrieved_date));
				?>
                </div>
                <div style="float:left; width:99%;" align="left" class="title1">
                <?
				$content02 = $product_set['briefing']." ";
		echo substr( $content02, 0,strrpos( substr( $content02, 0, 35), ' ' ));
		if(strlen($content02)>35)echo "..";?>
                
                </div>
                <div><img src="images/space.gif" width="20" height="10" /></div>
                
            <?php 
			}while($product_set=mysqli_fetch_assoc($product_query));?>
      
            </div>
          </td>
        </tr>
      </table></td>
    </tr>
  </table></td>
</tr>
</table>