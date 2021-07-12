<link href="css.css" rel="stylesheet" type="text/css">
<?php 
require_once('pro/replacement.php');  

$news_qry = mysqli_query($conn, "select * from events_02 where status='1' order by date desc limit 3");
$news = mysqli_fetch_assoc($news_qry);

?>
<?php if($news!=''){ 
		do{?><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" valign="top">
                    <div align="left" class="content_textA5">
                       <a href="result.php?root=MjIy&detail=<?php echo base64_encode($news['id']);?>"><span class="content_textA5"><em><?php echo $news['date'];?></em></span><br />
                    <?php echo $replacements->truncate($news['name'],70)?></a></div>                    </td>
                </tr>
            </table>
<?php }while($news = mysqli_fetch_assoc($news_qry));
						
	}else{ ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
                    <td align="left" valign="top"><div align="left" class="content_textA5">Coming Soon!</span></div></td>
                </tr>
            </table>
<?php }?>