		<?
require_once('Connections/pamconnection.php'); 


	$news_query = mysqli_query($conn, "select * from events_02 where status=1 order by date desc limit 1");
	$news_set = mysqli_fetch_array($news_query);
	
	$section_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE url_file='news.php' and status=1 order by maincat_id desc limit 1 ");
	$section_panel = mysqli_fetch_assoc($section_query);
	
?>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td align="left" valign="top">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
              <?
			$selected_query=mysqli_query($conn, "select * from home_section where id=2");
			$selected=mysqli_fetch_assoc($selected_query);
			?>

              <?php echo str_replace("../../photo/","photo/",$selected['description']); ?>
              </td>
            </tr>
          </table>
          <div align="left">
            <?php do{?>
            <span class="title1"><br>
            <?php echo $news_set['date'];?></span><br>
          <span class="title1">
      
          
          <a href="result.php?root=<?php echo base64_encode($section_panel['maincat_id']);?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&detail=<?php echo base64_encode($news_set['id']);?>"><?php echo $news_set['name'];?>
		  <strong>
        <br />
		<?php   		 
		$content02 = $news_set['briefing']." ";
		echo substr( $content02, 0,strrpos( substr( $content02, 0, 100), ' ' ));
		if(strlen($content02)>100)echo "..";		  
		  ?></a>
          
          <br>
          
<?php }while($news_set = mysqli_fetch_array($news_query));?>
          
          <br>
          </span><span class="title1"><a href="result.php?root=<?php echo base64_encode($section_panel['maincat_id']);?>#result">View More</a></span> <span class="content_text7">&#9658;</span><br />
        </div></td>
      </tr>
     </table>
