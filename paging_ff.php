
<?

	$paging_query = mysqli_query($conn, "select * from mydf_product where maincat_id like '%|".$section_id."|%' and status=1 order by position asc, product_name asc");
	$paging = mysqli_fetch_assoc($paging_query);
	

?>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 10px 10px 10px;">
                          <tr>
                            
                            <td align="right" class="content_text6"> Page 
                            
                            
                            
                              <?
							  if($paging!=''){
							 
							  
							  
						$count = 1;
						do{
							
						if(base64_decode($_GET['id'])==$paging['id']){  
							$font_size = 'font-size:16px;';
							$bgclr = 'background-color:#D7EEFF;';
						}else{
							$font_size = '';
							$bgclr = '';
						}
						
echo "<a href=\"result.php?root=".$_GET['root']."&main=".$_GET['main']."&sub=".$_GET['sub']."&id=".base64_encode($paging['id'])."#result\" title=\"".$paging['product_name']."\"><span style=\"border:solid 1px #CCC; padding:2px 6px 2px 6px; width:2px; margin:2px;".$font_size."".$bgclr."\">".$count."</span></a>";
						
						$count++;
						}while($paging = mysqli_fetch_assoc($paging_query));}?>
                              <!--&nbsp;&nbsp;<a href="#top">Top</a> -->
                              </td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                            </tr>
                          
                          </table>