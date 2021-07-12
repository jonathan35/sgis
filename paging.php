<table width="100%" cellpadding="4" cellspacing="2">
        <tr>
          <td width="33%" class="content_text6" align="left">
			<?php if ($totalRows_Rs1 > 0 ) {?>
			Showing <?php echo ($startRow_Rs1 + 1) ?> to <?php echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1); echo '&nbsp;<span class="sort">'.$mname.'</span>';?> of <?php echo $totalRows_Rs1; }?> </td>
			<td align="right" width="67%" class="content_text6">
                      <?php if ($totalRows_Rs1 > 0 ) {
			$initialpage=0; 
			$totalpg=$totalPages_Rs1+1;?>
              <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, max(0, $pageNum_Rs1 - 1), $queryString_Rs1); ?>#result">Previous</a>
              <?php do{ 
			   if($_GET['pageNum_Rs1']==$initialpage){  
							$font_size = 'font-size:16px;';
							$bgclr = 'background-color:#D7EEFF;';
						}else{
							$font_size = '';
							$bgclr = '';
						}
			  
			$initialpage++;
			if($pageNum_Rs1==($initialpage-1)) {
			echo '<span style="border:solid 1px #CCC; padding:2px 6px 2px 6px; width:2px; margin:12px 0 20px 0'.' '.$font_size.$bgclr.'" >'.$initialpage.'</span>';
			
			
			} else {?>
              <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, $initialpage-1, $queryString_Rs1); ?>#result"><?php echo '<span style="border:solid 1px #CCC; padding:2px 6px 2px 6px; width:2px; margin:12px 0 20px 0;'.' '.$font_size.$bgclr.'" >'.$initialpage.'</span>'?></a>
              <?php } 
			}while($initialpage!=$totalpg);?>
              <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, min($totalPages_Rs1, $pageNum_Rs1 + 1), $queryString_Rs1); ?>#result">Next</a>
            <?php } ?> 
                              
                              
                              </td>
        </tr>
    </table>