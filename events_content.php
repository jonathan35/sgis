<?php require_once('Connections/pamconnection.php'); 

$abc=base64_decode($_GET['id']);
if($abc!="")
{
	$query1=mysqli_query($conn, "select * from events_02 where status=1 and id='$abc'");
	$set=mysqli_fetch_assoc($query1);}

$query="select * from events_02 where status=1 and id!='$abc' order by date desc";
$currentPage = $_SERVER["PHP_SELF"];	
$maxRows_Rs1 = 5;
$pageNum_Rs1 = 0;
if(!empty($_GET['pageNum_Rs1'])) {
  $pageNum_Rs1 = $_GET['pageNum_Rs1'];
}
$startRow_Rs1 = $pageNum_Rs1 * $maxRows_Rs1;
$colname_Rs1 = "";
mysqli_select_db($conn, $database_pamconnection);

$query_limit_Rs1 = sprintf("%s LIMIT %d, %d", $query, $startRow_Rs1, $maxRows_Rs1);
$Rs1 = mysqli_query($conn, $query_limit_Rs1) or die(mysqli_error());
$row_Rs1 = mysqli_fetch_assoc($Rs1);

if(!empty($_GET['totalRows_Rs1'])) {
  $totalRows_Rs1 = $_GET['totalRows_Rs1'];
} else {
  $all_Rs1 = mysqli_query($conn, $query);
  $totalRows_Rs1 = mysqli_num_rows($all_Rs1);  
}
$totalPages_Rs1 = ceil($totalRows_Rs1/$maxRows_Rs1)-1; 

$queryString_Rs1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
	if (stristr($param, "pageNum_Rs1") == false && 
		stristr($param, "totalRows_Rs1") == false){
	  array_push($newParams, $param);
	}
  }
  if (count($newParams) != 0) {
	$queryString_Rs1 = "&" . htmlentities(implode("&", $newParams));
  }
}	
?>

<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<link href="css.css" rel="stylesheet" type="text/css">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <?php if($_GET['pageNum_Rs1']==""){?>
    <?php if($abc!=""){?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr valign="top"> 
        <td width="34%">
        
        <table border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td background="images/frame.gif"><table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td align="left" valign="top"><img src="images/space.gif" width="6" height="4"></td>
                                          <td align="left" valign="top"><img src="images/space.gif" width="168" height="4"></td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="top"><img src="images/space.gif" width="6" height="113"></td>
                                          <td align="left" valign="top">
                                          <a href="javascript:;"><?php if($set['image1']!=''){?><img src="cms/news/<?php echo $set['image1'];?>" width="160" height="107" border="0" onclick="MM_openBrWindow('enlarge_news.php?id=<?php echo base64_encode($set['id'])?>&no=1','','width=500,height=400')" /></a><?php } else echo  '<img src="images/default_image_small.jpg" width="160" height="107" border="0">'?>
                                          
                                          
                                          </td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                </table>
        
        </td>
        <td width="66%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="content_text6"><?php echo $set['date'];?></td>
            </tr>        
        
          <tr>
            <td class="title5"><?php echo $set['name'];?></td>
            </tr>
          <tr>        
        

          <tr>
            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="content_text">
                <td width="80%" align="justify">
				<?php echo substr($row_Rs1['description'],0,300); 
				if(substr($row_Rs1['description'],300,1)==' '){echo "..";
				}else{echo substr($row_Rs1['description'],300,1);
					if(substr($row_Rs1['description'],301,1)==' '){echo "..";
					}else{echo substr($row_Rs1['description'],301,1);
						if(substr($row_Rs1['description'],302,1)==' '){echo "..";
						}else{echo substr($row_Rs1['description'],302,1);
							if(substr($row_Rs1['description'],303,1)==' '){echo "..";
							}else{echo substr($row_Rs1['description'],303,1);
								if(substr($row_Rs1['description'],304,1)==' '){echo "..";
								}else{echo substr($row_Rs1['description'],304,1);
									if(substr($row_Rs1['description'],305,1)==' '){echo "..";
									}else{echo substr($row_Rs1['description'],305,1);
										if(substr($row_Rs1['description'],306,1)==' '){echo "..";
										}else{echo substr($row_Rs1['description'],306,1);
											if(substr($row_Rs1['description'],307,1)==' '){echo "..";
											}else{echo substr($row_Rs1['description'],307,1);
												if(substr($row_Rs1['description'],308,1)==' '){echo "..";
												}else{echo substr($row_Rs1['description'],308,1);
													if(substr($row_Rs1['description'],309,1)==' '){echo "..";
													}else{echo substr($row_Rs1['description'],309,1);
														if(substr($row_Rs1['description'],310,1)==' '){echo "..";
														}else{echo substr($row_Rs1['description'],310,1);
														
						}}}}}}}}}}}				
				?><?php if ($set==''){?><?php echo 'No item posted at the moment'?><?php }?></td>
              </tr>
              </table></td>
          </tr>
        <tr>
        	<td align="right">
            
<table border="0" cellpadding="0" cellspacing="0" align="right">
                  <tr>
                  	<td align="right"><span class="content_text7"><strong>
                    <a href="news_content.php?news=<?php echo base64_encode($set['id']);?>">More</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                  
                  	<?php if($set['pdf_file']!=''){?>
                    <td align="right"><span class="content_text7"><strong>
                    <a href="cms/news/<?php echo $set['pdf_file']?>" target="_blank">PDF</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    <?php if($set['weblink']!='' && $set['weblink']!='http://www.'){?>
                    <td align="right">
                    <span class="content_text7"><strong>
                    <a href="<?php echo $set['weblink']?>" target="_blank" class="content">Link</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;                    </td>
                    <?php }?>
                    </tr>
                  </table>            
            </td>
        </tr>          
          
          
          </table></td>
        </tr>


    </table>
    <?php }}?>
    
    
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/space.gif" width="100" height="6" /></td>
    </tr>
  </table>

    <?php if($row_Rs1!=''){ do{?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    	<tr><td colspan="2" align="center"><img src="images/line_h.gif"><br>
    	    <img src="images/space.gif" width="100" height="6" /><br></td></tr>
      <tr valign="top"> 
        <td width="34%">
        
        <table border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td background="images/frame.gif"><table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td align="left" valign="top"><img src="images/space.gif" width="6" height="4"></td>
                                          <td align="left" valign="top"><img src="images/space.gif" width="168" height="4"></td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="top"><img src="images/space.gif" width="6" height="113"></td>
                                          <td align="left" valign="top">
                                          <a href="javascript:;"><?php if($row_Rs1['image1']!=''){?><img src="cms/news/<?php echo $row_Rs1['image1'];?>" width="160" height="107" border="0" onclick="MM_openBrWindow('enlarge_news.php?id=<?php echo base64_encode($row_Rs1['id'])?>&no=1','','width=500,height=400')" /></a><?php } else echo '<img src="images/default_image_small.jpg" width="160" height="107" border="0">'?>
                                          
                                          
                                          
                                          
                                          </td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                </table>        
        
        
        
        
        </td>
        <td width="66%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="content_text6"><?php echo $row_Rs1['date'];?></td>
            </tr>        
        
          <tr>
            <td class="title5"><?php echo $row_Rs1['name'];?></td>
            </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="content_text">
                <td width="80%" align="justify">
				<?php echo substr($row_Rs1['description'],0,300); 
				if(substr($row_Rs1['description'],300,1)==' '){echo "..";
				}else{echo substr($row_Rs1['description'],300,1);
					if(substr($row_Rs1['description'],301,1)==' '){echo "..";
					}else{echo substr($row_Rs1['description'],301,1);
						if(substr($row_Rs1['description'],302,1)==' '){echo "..";
						}else{echo substr($row_Rs1['description'],302,1);
							if(substr($row_Rs1['description'],303,1)==' '){echo "..";
							}else{echo substr($row_Rs1['description'],303,1);
								if(substr($row_Rs1['description'],304,1)==' '){echo "..";
								}else{echo substr($row_Rs1['description'],304,1);
									if(substr($row_Rs1['description'],305,1)==' '){echo "..";
									}else{echo substr($row_Rs1['description'],305,1);
										if(substr($row_Rs1['description'],306,1)==' '){echo "..";
										}else{echo substr($row_Rs1['description'],306,1);
											if(substr($row_Rs1['description'],307,1)==' '){echo "..";
											}else{echo substr($row_Rs1['description'],307,1);
												if(substr($row_Rs1['description'],308,1)==' '){echo "..";
												}else{echo substr($row_Rs1['description'],308,1);
													if(substr($row_Rs1['description'],309,1)==' '){echo "..";
													}else{echo substr($row_Rs1['description'],309,1);
														if(substr($row_Rs1['description'],310,1)==' '){echo "..";
														}else{echo substr($row_Rs1['description'],310,1);
														
						}}}}}}}}}}}
				?>
				<?php if ($row_Rs1==''){?><?php echo 'No item posted at the moment'?><?php }?></td>

              </tr>
              </table></td>
          </tr>
          
        <tr>
        	<td align="right">
            
<table border="0" cellpadding="0" cellspacing="0" align="right">
                  <tr>
                  	<td align="right"><span class="content_text7"><strong>
                    <a href="news_content.php?news=<?php echo base64_encode($row_Rs1['id']);?>">More</a>
                    </strong></span><strong><span class="content_text">&#9658;</span></strong>&nbsp;&nbsp;</td>
                  	<?php if($row_Rs1['pdf_file']!=''){?>
                    <td align="right"><span class="content_text7"><strong>
                    <a href="cms/news/<?php echo $row_Rs1['pdf_file']?>" target="_blank">PDF</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    <?php if($row_Rs1['weblink']!='' && $row_Rs1['weblink']!='http://www.'){?>
                    <td align="right"><span class="content_text7"><strong>
                    <a href="<?php echo $row_Rs1['weblink']?>" target="_blank" class="content">Link</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    </tr>
                  </table>            
            </td>
        </tr>          
          
          </table></td>
        </tr>
                <tr><td><img src="images/space.gif" width="100" height="6" /></td>
                </tr>
    </table>
    <?php }while($row_Rs1 = mysqli_fetch_assoc($Rs1));} else echo 'No item posted at the moment'?>
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" align="center"><img src="images/line_h.gif"><br>
        <img src="images/space.gif" width="100" height="6" /><br></td></tr>
    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr class="content_text6" style="font-weight:bold;">
        <td width="49%"><?php if ($totalRows_Rs1 > 0 ) {?>
                  <?php echo ($startRow_Rs1 + 1) ?> to <?php echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1); echo '&nbsp;';?> of <?php echo $totalRows_Rs1; }?> </td>
        <td width="41%" align="right"><?php if ($totalRows_Rs1 > 0 ) {
					$initialpage=0; 
					$totalpg=$totalPages_Rs1+1;?>&#9668;&nbsp;
      <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, max(0, $pageNum_Rs1 - 1), $queryString_Rs1); ?>">Previous</a>
                  <?php do{ 
					$initialpage++;
					if($pageNum_Rs1==($initialpage-1)) {
					echo '&nbsp;<span class="title5"><font color=#FF0000>'.$initialpage.'</font></span>&nbsp;|';
					} else {?>
&nbsp;<a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, $initialpage-1, $queryString_Rs1); ?>"><?php echo $initialpage?></a>
              <?php } 
					}while($initialpage!=$totalpg);?>
              <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, min($totalPages_Rs1, $pageNum_Rs1 + 1), $queryString_Rs1); ?>">Next</a>
              &nbsp;&#9658;
	      <?php } ?>
              </td>
              <td width="10%" align="right"><a href="#">Top</a> &#9650;
              </td>
        </tr>
    </table></td>
  </tr>
</table>
