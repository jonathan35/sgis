<?
require_once('Connections/pamconnection.php'); 


if($_GET['sub']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
}elseif($_GET['main']){
	$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
}

if($category_id!=''){
	$query="select * from file_upload02 where status=1 and id!='$news_id' and category like '%|".$category_id."|%' order by file_id desc";
}else{
	$query="select * from file_upload02 where status=1 order by file_id desc";
}


	$maxRows_Rs1 = 16;
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
			stristr($param, "totalRows_Rs1") == false) {
		  array_push($newParams, $param);
		}
	  }
	  if (count($newParams) != 0) {
		$queryString_Rs1 = "&" . htmlentities(implode("&", $newParams));
	  }
	}	
	
?>
<script type="text/javascript" src="js/sorttable.js"></script>
<link href="css.css" rel="stylesheet" type="text/css">
<a name="result"></a>

<table width="100%" border="0" cellspacing="20" cellpadding="0">
  <tr>
    <td><?php include("pre_design_header.php")?></td>
  </tr>
                              <tr>
                                <td align="left" valign="top"><div align="left">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" valign="top" bgcolor="#BCBCBC">
                                      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="sortable">
                                        <tr>
                                          <td width="7%" align="center" bgcolor="#CCCCCC" class="content_text6"><strong>No.</strong></td>
                                          <td width="41%" align="center" bgcolor="#CCCCCC" class="content_text6"><strong>Description</strong></td>
                                          <td width="24%" align="center" bgcolor="#CCCCCC" class="content_text6"><strong>Source / Type</strong></td>
                                          <td width="12%" align="center" bgcolor="#CCCCCC" class="content_text6"><strong>Date</strong></td>
                                          <td width="7%" align="center" bgcolor="#CCCCCC" class="content_text6"><strong> Video</strong></td>
                                          <td width="9%" align="center" bgcolor="#CCCCCC" class="content_text6"><strong>Hits</strong></td>
                                        </tr>
                                        
                                        
<?php 

$row_color_count = '1';
$count=1;
do{

if($row_color_count%2=='0'){ 
	$bgcolor='E8E8E8';
}else{
	$bgcolor='FFFFCC';
}
?>                                        
                                        <tr>
                                          <td align="center" valign="top" bgcolor="#FFFFFF"class="content_text">
                                         
                                        <span style="display:none;">
                                        <?php 
                                        $asdsad = $startRow_Rs1+$count;
                                        for($i=0 ; $i<$asdsad ; $i++){
                                        echo "a";
                                        }
                                        ?>
                                        </span>										 
										 <?php echo $startRow_Rs1+$count;?>
                                          
                                          </td>
                                          <td align="center" valign="top" bgcolor="#FFFFFF"class="content_text"><div align="left">
                                            <?php if($row_Rs1['title']!='') {echo $row_Rs1['title'];}else{echo '-';}?>
                                          </div></td>
                                          <td align="left" valign="top" bgcolor="#FFFFFF"class="content_text"><div align="left">
                                            <?php if($row_Rs1['subject']!='') {echo $row_Rs1['subject'];}else{echo '-';}?>
                                          </div></td>
                                          <td align="center" valign="top" bgcolor="#FFFFFF"class="content_text"><div align="center">
                                            <?php if($row_Rs1['date']!=0000-00-00) {echo $row_Rs1['date'];}else{echo '-';}?>
                                          </div></td>
                                          <td align="center" valign="top" bgcolor="#FFFFFF"class="content_text"><div align="center"><!--<a href="#" onClick="javascript:window.open('enlarge02.php?id=<?php //echo $row_Rs1['file_id']?>','_blank', 'width=350,height=150,location=no,resizable=no,status=no,scrollbar=yes')"><img src="images/icon_download.png" width="22" height="22" border="0"></a> -->
                                      <?php if($row_Rs1['video_link']!=''){?>    
                                          <a href="#" onClick="javascript:window.open('video.php?v=<?php echo base64_encode($row_Rs1['file_id'])?>','_blank', 'width=680,height=420,location=no,resizable=no,status=no,scrollbar=yes')"><img src="images/video.png" border="0"></a>
                                          <?php }else{?>
                                          <img src="images/video.png" border="0" style="opacity:0.3;">
                                          <?php }?>
                                          
                                          
                                          
                                          
                                          </div></td>
                                          <td align="center" valign="top" bgcolor="#FFFFFF"class="content_text">
                                        <span style="display:none;">
                                        <?php 
                                        for($i=0 ; $i<$row_Rs1['hit_rates'] ; $i++){
                                        echo "a";
                                        }
                                        ?>
                                        </span>	                                          
                                         <?php echo $row_Rs1['hit_rates']?>
                                          </td>
                                        </tr>
                                        
<?php $row_color_count++;$count++;}while($row_Rs1 = mysqli_fetch_assoc($Rs1));?>                                        
                                        
                                      </table></td>
                                    </tr>
                                  </table>
                                  <table width="100%" border="0" cellspacing="6" cellpadding="0">
                                    <tr>
                                      <td background="images/line_h.gif"><img src="images/space.gif" width="200" height="3"></td>
                                    </tr>
                                  </table>
                                </div></td>
                              </tr>
                              <tr>
                <td class="content_text" scope="col"><?php include("paging.php");?></td>
              </tr>
</table>


