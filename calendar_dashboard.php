		<?
require_once('Connections/pamconnection.php'); 


	$calender_query = mysqli_query($conn, "select * from calendar_mssgs where 
								  y>'".date("Y")."' or
								  (y='".date("Y")."' and m>'".date("m")."') or
								  (y='".date("Y")."' and m='".date("m")."' and d>='".date("d")."')
								  order by y asc, m asc, d asc, id desc limit 8");
	$calender_set = mysqli_fetch_array($calender_query);
	
	$right_panel_query=mysqli_query($conn, "SELECT * FROM side_panel WHERE status=1 and left_or_right=2 order by position asc, id desc ");
	$right_panel = mysqli_fetch_assoc($right_panel_query);



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
            <?php echo $calender_set['d']."/".$calender_set['m']."/".$calender_set['y'];?></span><br>
          <span class="title1">
         <!-- <a href="javascript:openPosting(<?php //echo $calender_set['id']?>)" > -->
          <a href="javascript:;" onClick="MM_openBrWindow('eventdisplay.php?id=<?php echo $calender_set['id']?>','','resizable=yes,width=320,height=360')">
		  <strong><?php echo $calender_set['title']?></strong></a>
          
          <br>
          
<?php }while($calender_set = mysqli_fetch_array($calender_query));?>
          
          <br>
          </span><span class="title1"><a href="result.php?root=Mg==#result">View More</a></strong></span> <span class="content_text7">&#9658;</span><br />
        </div></td>
      </tr>
     </table>
