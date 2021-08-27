<?php require_once('Connections/pamconnection.php'); 

	
	//$news_id=base64_decode($_GET['prod']);

	//$query1=mysqli_query($conn, "select * from product_section where status=1 and id='$news_id'");
	//$set=mysqli_fetch_assoc($query1);

if($_GET['sub']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
}elseif($_GET['main']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
}elseif($_GET['root']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
}

if($category_id!=''){
	$query="select * from product_section where status=1 and category like '%|".$category_id."|%' order by position asc, name asc, id desc";
}else{
	$query="select * from product_section where status=1 order by position asc, name asc, id desc";
}

$currentPage = $_SERVER["PHP_SELF"];	
$maxRows_Rs1 = 12;
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

<table width="96%" border="0" cellpadding="0" cellspacing="10">
 <tr>
    <td align="left"><div align="left"><span class="heading4"><br />
    Products</span><br />
    </div></td>
 </tr> 
  
   
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php if($row_Rs1!=''){ 
		//$count=0;
		//$count_no=$startRow_Rs1+1;
		$mainCat_query = mysqli_query($conn, "select * from murum_section where status='1' and length(position)=2");
		$main_set = mysqli_fetch_assoc($mainCat_query);
		
		do{?>
    		<?php //if($count==0){?><?php //}?>
            <?php 
			$category = explode("|",$row_Rs1['category']);
			$mainCat_query = mysqli_query($conn, "select * from murum_section where status='1' and length(position)=2 and maincat_id = '".$category['2']."'");
			$main_set = mysqli_fetch_assoc($mainCat_query);
			
			if(empty($_SESSION['subCat'])){
						
				$subCat = $main_set['maincat_name'];
				$_SESSION['subCat'] = $category['2'];	
				
			}elseif($category['2'] == $_SESSION['subCat']){
				
				$subCat = '';
				
			}elseif($category['2'] != $_SESSION['subCat']){
				
				$subCat = $main_set['maincat_name'];
				$_SESSION['subCat'] = $category['2'];
						
			}
				
             if(!empty($subCat)){?>
                  <tr <?php echo $tr;?>>
                      <td colspan="11" align="left" valign="top" class="content_price02"><span class="heading3">
                        <?php /*
	if($category_id!=''){
		
		$cate_query = mysqli_query($conn, "select * from murum_section where status=1 and maincat_id='".$category_id."'");
		$cate_set = mysqli_fetch_assoc($cate_query);
		echo $cate_set['maincat_name'];
		
	}
	
	*/
	?>
                      </span>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                          <td bgcolor="#C1C1C1" class="heading3"><div align="right"><strong>
                            <?php if(!empty($subCat)) echo $subCat;?>
                          </strong></div></td>
                        </tr>
                      </table></td>
        </tr>
		   <?php }?>
            <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                      <td height="0" align="center" valign="top" bgcolor="#F4F4F4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="80%" align="left" valign="top"><table width="100%" border="0" cellspacing="10" cellpadding="0">
                            <tr>
                              <td align="left" valign="top">
                              	<div align="left"><span class="content_text"><strong>
                           	    <a href="result.php?root=<?php echo $_GET['root']?>&amp;detail=<?php echo base64_encode($row_Rs1['id']);?>&amp;main=<?php echo $_GET['main']?>&amp;sub=<?php echo $_GET['sub']?>">
                           	    <?php $content01 = $row_Rs1['name']." ";
									echo substr( $content01, 0,strrpos( substr($content01, 0, 2000), ' ' ));
									if(strlen($content01)>2000)echo "...";?>
                           	    </a></strong></span> </div></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><div align="left"><span class="content_text">
                                <?php $content02 = $row_Rs1['briefing']." ";
									echo substr( $content02, 0,strrpos( substr($content02, 0, 2000), ' ' ));
									if(strlen($content02)>2000)echo "...";?>
                              </span></div></td>
                            </tr>
                          </table>
                            <div align="left"></div></td>
                          <td width="17%" align="center" valign="top">
                          	<img src="images/space.gif" width="170" height="5"><br>                                    
							<?php if($row_Rs1['image1']!=''&&file_exists($row_Rs1['image1'])){?>
                                  <a href="result.php?root=<?php echo $_GET['root']?>&detail=<?php echo base64_encode($row_Rs1['id']);?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>"><img src="<?php echo $row_Rs1['image1'];?>" width="200" height="150" border="0" /></a>
						  <?php } else echo '<img src="images/default01.jpg" width="200" height="150">'?><?php //echo $row_Rs1['id'];?>                         </td>
                        </tr>
                      </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="#E1E1E1"><div align="center"><img src="images/space.gif" width="500" height="2" /></div></td>
                          </tr>
                        </table>                      </td>
                    </tr>
                </table>              </td>
         	</tr>
<?php //if($count==2){?>
<?php //$count=0;}else{$count++;} 
		}while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	}else echo 'No item posted at the moment'?>
</table>

    
    
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td background="images/line_h.gif"><img src="images/space.gif" width="200" height="10" /></td>
      </tr>
    </table>
        <img src="images/space.gif" width="100" height="6" /></td></tr>
    </table>
    <?php include("paging.php");?>    </td>
  </tr>
</table>
