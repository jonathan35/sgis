<?php require_once('Connections/pamconnection.php'); 

	
	$news_id=base64_decode($_GET['news']);

	$query1=mysqli_query($conn, "select * from events_02 where status=1 and id='$news_id'");
	$set=mysqli_fetch_assoc($query1);

if($_GET['sub']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
}elseif($_GET['main']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
}

if($category_id!=''){
	$query="select * from events_02 where status=1 and category like '%|".$category_id."|%' order by date desc";
}else{
	$query="select * from events_02 where status=1 order by date desc";
}

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
<table width="100%" border="0" cellpadding="0" cellspacing="10">
  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>
    <?php if($_GET['pageNum_Rs1']==""){?>
    <?php if($news_id!=""){?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr valign="top"> 
        <td width="13%">
        
        <table border="0" cellpadding="10" cellspacing="0">
<tr>
                                    <td width="160" align="center" valign="middle" background="images/frame.gif"><div align="center">
                                      <table width="160" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center" valign="middle"><div align="center"><a href="javascript:;">
                                              <?php if($set['image1']!=''&&file_exists($set['image1'])){?>
                                              <img src="<?php echo $set['image1'];?>" width="150" height="113" border="0" onclick="MM_openBrWindow('enlarge_news.php?id=<?php echo base64_encode($set['id'])?>&amp;no=1','','width=520,height=410')" /></a>
                                                  <?php } else echo  '<img src="images/default_image_small.jpg" width="150" height="113" border="0">'?>
                                          </div></td>
                                        </tr>
                                      </table>
                                    </div></td>
</tr>
                                </table>        </td>
        <td width="1%"><img src="images/space.gif" width="20" height="20" /></td>
        <td width="86%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" class="title3"><div align="left"><?php echo $set['date'];?></div></td>
            </tr>        
        
          <tr>
            <td align="left" class="content_text"><div align="left"><?php echo $set['name'];?></div></td>
            </tr>
          <tr>        
          <tr>
            <td align="left"><div align="left">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="content_text">
                  <td width="80%" align="justify">
                    <?php 

				$content02 = $set['briefing']." ";
					echo substr( $content02, 0,strrpos( substr( $content02, 0, 300), ' ' ));
					if(strlen($content02)>300)echo "..";
				?>
                    <?php if ($set==''){?><?php echo 'No item posted at the moment'?><?php }?></td>
                  </tr>
              </table>
            </div></td>
          </tr>
        <tr>
        	<td align="right">
            
<table border="0" cellpadding="0" cellspacing="0" align="right">
                  <tr>
                  	<td align="right"><span class="content_text3"><strong>
                    <a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&detail=<?php echo base64_encode($set['id']);?>">More</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                  
                  	<?php if($set['pdf_file']!=''){?>
                    <td align="right"><span class="content_text3"><strong>
                    <a href="<?php echo $set['pdf_file']?>" target="_blank">PDF</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    <?php if($set['weblink']!='' && $set['weblink']!='http://www.'){?>
                    <td align="right">
                    <span class="content_text3"><strong>
                    <a href="<?php echo $set['weblink']?>" target="_blank" class="content">Link</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;                    </td>
                    <?php }?>
                    </tr>
                  </table>            </td>
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
    	<tr><td colspan="3" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <td><img src="images/space.gif" width="200" height="3" /></td>
  	    </tr>
  	  </table>
    	    <img src="images/space.gif" width="100" height="6" /></td></tr>
      <tr valign="top"> 
        <td><table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="170" align="center" valign="middle" background="images/frame.gif"><div align="center">
                <table border="0" cellpadding="0" cellspacing="10">
                  <tr>
                    <td align="center" valign="middle"><div align="center"><a href="javascript:;">
                        <?php if($row_Rs1['image1']!=''&&file_exists($row_Rs1['image1'])){?>
                        <img src="<?php echo $row_Rs1['image1'];?>" width="150" height="113" border="0" onclick="MM_openBrWindow('enlarge_news.php?id=<?php echo base64_encode($row_Rs1['id'])?>&amp;no=1','','width=520,height=410')" /></a>
                            <?php } else echo '<img src="images/default_image_small.jpg" width="160" height="107" border="0">'?>
                    </div></td>
                  </tr>
                </table>
            </div></td>
          </tr>
        </table></td>
        <td width="1%"><img src="images/space.gif" width="20" height="20" /></td>
        <td width="86%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" class="title3"><div align="left"><?php echo $row_Rs1['date'];?></div></td>
            </tr>        
        
          <tr>
            <td align="left" class="content_text"><div align="left"><a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&detail=<?php echo base64_encode($row_Rs1['id']);?>"><strong> <?php echo $row_Rs1['name'];?></strong></a></div></td>
            </tr>
          <tr>
            <td align="left"><div align="left">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="content_text">
                  <td width="80%" align="justify">
                    <?php 
				$content01 = $row_Rs1['briefing']." ";
					echo substr( $content01, 0,strrpos( substr( $content01, 0, 300), ' ' ));
					if(strlen($content01)>300)echo "..";
				?>
                    <?php if ($row_Rs1==''){?><?php echo 'No item posted at the moment'?><?php }?></td>
                  </tr>
              </table>
            </div></td>
          </tr>
          
        <tr>
        	<td align="right">
            
<table border="0" cellpadding="0" cellspacing="0" align="right">
                  <tr>
                  	<td align="right"><span class="content_text3"><strong>
                    <a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&detail=<?php echo base64_encode($row_Rs1['id']);?>">More</a>
                    </strong></span><strong><span class="content_text">&#9658;</span></strong>&nbsp;&nbsp;</td>
                  	<?php if($row_Rs1['pdf_file']!=''){?>
                    <td align="right"><span class="content_text3"><strong>
                    <a href="<?php echo $row_Rs1['pdf_file']?>" target="_blank">PDF</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    <?php if($row_Rs1['weblink']!='' && $row_Rs1['weblink']!='http://www.'){?>
                    <td align="right"><span class="content_text3"><strong>
                    <a href="<?php echo $row_Rs1['weblink']?>" target="_blank" class="content">Link</a>
                    </strong></span><span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    </tr>
                  </table>            </td>
        </tr>          
          
          </table></td>
        </tr>
                <tr><td width="13%"><img src="images/space.gif" width="100" height="6" /></td>
                </tr>
    </table>
    <img src="images/space.gif" width="20" height="3" /><br />
    <?php }while($row_Rs1 = mysqli_fetch_assoc($Rs1));} ?>
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">

    </table>
        <img src="images/space.gif" width="100" height="6" /></td></tr>
    </table>
    <?php include("paging.php");?>
    </td>
  </tr>
</table>
