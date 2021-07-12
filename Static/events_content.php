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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<link href="css.css" rel="stylesheet" type="text/css">
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <?php if($_GET['pageNum_Rs1']==""){?>
    <?php if($abc!=""){?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr valign="top"> 
        <td width="25%"><a href="javascript:;"><?php if($set['image1']!=''){?><img src="cms/news/<?php echo $set['image1'];?>" width="80" height="60" border="0" onclick="MM_openBrWindow('enlarge_news.php?id=<?php echo base64_encode($set['id'])?>','','width=480,height=360')" /></a><?php } else echo  '<img src="images/default_pic.jpg" width="80" height="60">'?></td>
        <td width="75%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="news">
                <td width="85%"><?php echo $set['name'];?>&nbsp;</td>
                <td width="15%"><?php echo $set['date'];?>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="news_text">
                <td width="80%" align="justify"><?php echo $set['description'];?><?php if ($set==''){?><?php echo 'No item posted at the moment'?><?php }?></td>
                <td width="5%">&nbsp;</td>
                <td width="15%">
                
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                  	<?php if($set['pdf_file']!=''){?>
                    <td align="center"><a href="cms/news/<?php echo $set['pdf_file']?>"><img src="images/icon_pdf.gif" width="18" height="18" border="0"></a></td>
                    <?php }?>
                    <?php if($set['weblink']!='' && $set['weblink']!='http://www.'){?>
                    <td align="center"><a href="<?php echo $set['weblink']?>" target="_blank" class="content"><img src="images/icon_link.gif" width="18" height="18" border="0"></a></td>
                    <?php }?>
                    </tr>
                  </table>
                  
                  </td>
              </tr>
              </table></td>
          </tr>
          </table></td>
        </tr>

    </table>
    <?php }}?>
    
    
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    </tr>
  </table>

    <?php if($row_Rs1!=''){ do{?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr valign="top"> 
        <td width="25%"><a href="javascript:;"><?php if($row_Rs1['image1']!=''){?><img src="cms/news/<?php echo $row_Rs1['image1'];?>" width="80" height="60" border="0" onclick="MM_openBrWindow('enlarge_news.php?id=<?php echo base64_encode($row_Rs1['id'])?>','','width=480,height=360')" /></a><?php } else echo '<img src="images/default_pic.jpg" width="80" height="60" border="0">'?></td>
        <td width="75%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="news">
                <td width="85%"><?php echo $row_Rs1['name'];?>&nbsp;</td>
                <td width="15%"><?php echo $row_Rs1['date'];?>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="news_text">
                <td width="80%" align="justify"><?php echo $row_Rs1['description'];?><?php if ($row_Rs1==''){?><?php echo 'No item posted at the moment'?><?php }?></td>
                <td width="5%">&nbsp;</td>
                <td width="15%">
                
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                  	<?php if($row_Rs1['pdf_file']!=''){?>
                    <td align="center"><a href="cms/news/<?php echo $row_Rs1['pdf_file']?>"><img src="images/icon_pdf.gif" width="18" height="18" border="0"></a></td>
                    <?php }?>
                    <?php if($row_Rs1['weblink']!='' && $row_Rs1['weblink']!='http://www.'){?>
                    <td align="center"><a href="<?php echo $row_Rs1['weblink']?>" target="_blank" class="content"><img src="images/icon_link.gif" width="18" height="18" border="0"></a></td>
                    <?php }?>
                    </tr>
                  </table>
                  
                  
                  </td>
              </tr>
              </table></td>
          </tr>
          </table></td>
        </tr>
                <tr><td>&nbsp;</td></tr>
    </table>
    <?php }while($row_Rs1 = mysqli_fetch_assoc($Rs1));} else echo 'No item posted at the moment'?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr class="title5">
        <td width="50%"><?php if ($totalRows_Rs1 > 0 ) {?>
                  <?php echo ($startRow_Rs1 + 1) ?> to <?php echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1); echo '&nbsp;';?> of <?php echo $totalRows_Rs1; }?> </td>
        <td width="50%" align="right"><?php if ($totalRows_Rs1 > 0 ) {
					$initialpage=0; 
					$totalpg=$totalPages_Rs1+1;?>
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
              <?php } ?>
              </td>
        </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
