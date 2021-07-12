<?php require_once('Connections/pamconnection.php'); 

	
	$news_id=base64_decode($_GET['news']);

	$query1=mysqli_query($conn, "select * from product_section where status=1 and id='$news_id'");
	$set=mysqli_fetch_assoc($query1);

if($_GET['sub']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
}elseif($_GET['main']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
}

if($category_id!=''){
	$query="select * from product_section where status=1 and id!='$news_id' and category like '%|".$category_id."|%' order by name asc";
}else{
	$query="select * from product_section where status=1 and id!='$news_id' order by name asc";
}

$currentPage = $_SERVER["PHP_SELF"];	
$maxRows_Rs1 = 6;
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
    <?php if($row_Rs1!=''){ 
		$count=0;
		$count_no=$startRow_Rs1+1;
	do{?>
    <?php if($count==0){?><tr><?php }?>
    <td align="center" valign="top">
    <table width="170" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                              <td height="220" align="center" valign="top" background="images/bg_frame.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" valign="top"><img src="images/space.gif" width="20" height="5"><br>                                    <?php if($row_Rs1['image1']!=''&&file_exists($row_Rs1['image1'])){?>
                                  <a href="result.php?root=OA==&detail=<?php echo base64_encode($row_Rs1['id']);?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>"><img src="<?php echo $row_Rs1['image1'];?>" width="160" height="107" border="0" /></a><?php } else echo '<img src="images/default01.jpg" width="156" height="117">'?>
                                    
                                    
                                    
                                    </td>
                                </tr>
                                <tr>
                                  <td align="center" valign="top"><table width="100%" border="0" cellspacing="6" cellpadding="0">
                                    <tr>
                                      <td align="left" valign="top"><span class="navigation"><strong><a href="result.php?root=OA==&detail=<?php echo base64_encode($row_Rs1['id']);?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>"><?php $content01 = $row_Rs1['name']." ";
					echo substr( $content01, 0,strrpos( substr($content01, 0, 30), ' ' ));
					if(strlen($content01)>30)echo "..";?>wew</a></strong></span></td>
                                      </tr>
                                    <tr>
                                      <td align="left" valign="top"><span class="content_text5"><?php $content02 = $row_Rs1['briefing']." ";
					echo substr( $content02, 0,strrpos( substr($content02, 0, 120), ' ' ));
					if(strlen($content02)>120)echo "..";?></span></td>
                                    </tr>                                      
                                    </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                          </td>
         
<?php if($count==2){?></tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
<?php $count=0;}else{$count++;}}while($row_Rs1 = mysqli_fetch_assoc($Rs1));} else echo 'No item posted at the moment'?>
    <tr>
    <td align="center">&nbsp;</td>
  </tr>




</table>
